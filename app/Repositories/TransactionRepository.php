<?php

namespace App\Repositories;

use App\Interfaces\TransactionRepositoryInterface;
use App\Models\Room;
use App\Models\Transaction;
use Illuminate\Validation\ValidationException;

class TransactionRepository implements TransactionRepositoryInterface
{
    public function getTransactionDataFromSession()
    {
        return session()->get('transaction');
    }

    public function getTransactionByCodeEmailPhone($code, $email, $phone)
    {
        return Transaction::where('code', $code)
            ->where('email', $email)
            ->where('phone', $phone)
            ->first();
    }

    public function saveTransactionDataToSession($data)
    {
        $transaction = session()->get('transaction', []);
        $transaction = array_merge($transaction, $data ?? []);
        session()->put('transaction', $transaction);
    }

    public function saveTransaction($data)
    {
        if (empty($data['room_id'])) {
            throw ValidationException::withMessages(['room_id' => 'The room_id field is required.']);
        }

        $room = Room::find($data['room_id']);
        if (!$room) {
            throw ValidationException::withMessages(['room_id' => 'Invalid room_id.']);
        }

        $data = $this->prepareTransactionData($data, $room);
        $transaction = Transaction::create($data);
        session()->forget('transaction');
        return $transaction;
    }

    private function prepareTransactionData($data, $room)
    {
        $data['code'] = $this->generateTransactionCode();
        $data['payment_status'] = 'pending';
        $data['transaction_date'] = now();
        $data['total_amount'] = $this->calculateTotalAmount($room->price_per_month, $data['duration'], $data['payment_method'] ?? 'default_method');
        return $data;
    }

    private function generateTransactionCode()
    {
        return 'NGKBWA' . rand(100000, 99999);
    }

    private function calculateTotalAmount($pricePerMonth, $duration, $paymentMethod)
    {
        $subtotal = $pricePerMonth * $duration;
        $tax = $subtotal * 0.11;
        $insurance = $subtotal * 0.01;
        $total = $subtotal + $tax + $insurance;
        return $this->calculatePaymentAmount($total, $paymentMethod);
    }

    private function calculatePaymentAmount($total, $paymentMethod)
    {
        return $paymentMethod === 'full_payment' ? $total : $total * 0.3;
    }

    public function getTransactionByCode($code)
    {
        return Transaction::where('code', $code)->first();
    }
}
