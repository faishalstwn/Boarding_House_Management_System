<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingShowRequest;
use App\Http\Requests\CustomerInformationStoreRequest;
use App\Repositories\BoardingHouseRepository;
use App\Repositories\TransactionRepository;
use App\Interface\BoardingHouseRepositoryInterface;
use App\Interface\TransactionRepositoryInterface;
use Illuminate\Http\Request;

class BookingController extends Controller

{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private TransactionRepositoryInterface $transactionRepository;
     public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
         TransactionRepositoryInterface $transactionRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->transactionRepository = $transactionRepository;
    }

   public function booking(Request $request, $slug)
    {
       $this->transactionRepository->saveTransactionDataToSession($request->all());

       return redirect()->route('booking.information', $slug);
    }

    public function information($slug){
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room']);


        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }

    public function saveInformation(CustomerInformationStoreRequest $request, $slug) {

        $data = $request->validated();

        $this->transactionRepository->saveTransactionDataToSession($data);
        
        return redirect()->route('booking.checkout', $slug);

        
    }

    public function checkout($slug){
        $transaction = $this->transactionRepository->getTransactionDataFromSession();
         if (empty($transaction['room'])) {
        return redirect()->route('kos.rooms', $slug)->with('error', 'Session expired, silakan pilih kamar lagi.');
    }
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHouseRepository->getBoardingHouseRoomById($transaction['room']);


        return view('pages.booking.checkout', compact('transaction', 'boardingHouse', 'room'));
    }

    public function payment(Request $request){
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTransactionDataFromSession());

        // Set your Merchant Server Key
\Midtrans\Config::$serverKey = config('midtrans.serverKey');

\Midtrans\Config::$isProduction = config('midtrans.isProduction');
// Set sanitization on (default)
\Midtrans\Config::$isSanitized = config('midtrans.isSanitized');
// Set 3DS transaction for credit card to true
\Midtrans\Config::$is3ds = config('midtrans.is3ds');

$params = [
    'transaction_details' => [
        'order_id' => $transaction->code,
        'gross_amount' => $transaction->total_amount,
    ],
    'customer_details' => [
        'first_name' => $transaction->name,
        'email' => $transaction->email,
        'phone' => $transaction->phone,
    ],

    ];

    $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;
    return redirect($paymentUrl);
    }

    public function success(Request $request){
        $transaction = $this->transactionRepository->getTransactionByCode($request->order_id);

        return view('pages.booking.success', compact('transaction'));
    }
    public function check(Request $request)
    {
        return view('pages.booking.check-booking');   
}
    public function show(BookingShowRequest $request){
       $transaction = $this->transactionRepository->getTransactionByCodeEmailPhone($request->code, $request->email, $request->phone_number);
       if(!$transaction){
        return redirect()->back()->with('error', 'Data Transaksi Tidak Ditemukan');
       }
       return view('pages.booking.detail', compact('transaction'));
       }

}