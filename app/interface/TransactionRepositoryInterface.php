<?php

namespace App\Interface;

Interface TransactionRepositoryInterface
{
    public function getTransactionDataFromSession(): array;
    

    public function saveTransactionDataToSession(array $transactionData): void;

    public function saveTransaction($data);

    public function getTransactionByCode($code);

    public function getTransactionByCodeEmailPhone($code, $email, $phone);
}