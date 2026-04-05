<?php

namespace App\Repositories;

use App\Interface\TransactionRepositoryInterface;
use App\Models\Room;
use App\Models\Transaction;


class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession(): array
    {
        return session()->get('transaction', []);
    }

    public function saveTransactionDataToSession(array $transactionData): void
    {
        $transaction = session()->get('transaction', []);
       
        foreach($transactionData as $key => $value)
        {
            $transaction[$key] = $value;
        }
        session()->put('transaction', $transaction);
    }

    public function saveTransaction($data)
    {
        if (empty($data['room'])) {
        throw new \Exception('Session expired. Silakan ulangi booking dari awal.');
    }
        $room = Room::find($data['room']);

        $data = $this->prepareTransactionData($data, $room);

        $transaction = Transaction::create($data);

        session()->forget('transaction');

        return $transaction;
    }

    public function getTransactionByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }
     public function getTransactionByCodeEmailPhone($code, $email, $phone){
        return Transaction::where('code', $code)->where('email', $email)->where('phone_number', $phone)->first();
     }
    private function prepareTransactionData($data, $room)
    {
         $data['room_id'] = $data['room'];
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        $data['transaction_date'] = now();

        $total = $this->calculateTotalAmount($room->price_per_month, $data['duration']);
$data['total_amount'] = $this->calculatePaymentAmount($total, $data['payment_method']);
        return $data;
    }

    private function generateTransactionCode()
    {
        return 'NGKBWA' . rand(100000, 999999);
    }

    private function calculateTotalAmount($pricePerMonth, $duration)
{
    $pricePerMonth = (float) $pricePerMonth;
    $duration = (int) $duration;

    $subtotal = $pricePerMonth * $duration;
    $tax = $subtotal * 0.11;
    $insurance = $subtotal * 0.01;

    return $subtotal + $tax + $insurance;
}

    private function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod === 'full_payment' ? $total : $total * 0.3;
    }
}
