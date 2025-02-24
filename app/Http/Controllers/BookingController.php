<?php

namespace App\Http\Controllers;

use App\Http\Requests\BookingShowRequest;
use App\Http\Requests\CustomerInformationStoreRequest;
use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\TransactionRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Transaction;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHousesRepository;
    private TransactionRepositoryInterface $transactionRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHousesRepository,
        TransactionRepositoryInterface $transactionRepository
    ) {
        $this->boardingHousesRepository = $boardingHousesRepository;
        $this->transactionRepository = $transactionRepository;
    }

    public function booking(Request $request, $slug)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());

        return redirect()->route('booking.information', $slug);
    }

    public function information($slug)
    {
        // Mengambil data transaksi dari session dengan default kosong
        $transaction = $this->transactionRepository->getTransactionDataFromSession() ?? [];

        // Pastikan key 'room_id' ada untuk menghindari error
        if (!isset($transaction['room_id'])) {
            return redirect()->route('booking.check')->with('error', 'Room ID tidak ditemukan.');
        }

        $roomId = $transaction['room_id'];

        // Ambil data kos dan kamar
        $boardingHouse = $this->boardingHousesRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHousesRepository->getBoardingHouseRoomById($roomId);

        return view('pages.booking.information', compact('transaction', 'boardingHouse', 'room'));
    }

    public function saveInformation(CustomerInformationStoreRequest $request, $slug)
    {
        $data = $request->validated();

        $this->transactionRepository->saveTransactionDataToSession($data);

        return redirect()->route('booking.checkout', $slug);
    }

    public function checkout($slug)
    {
        $transaction = $this->transactionRepository->getTransactionDataFromSession();

        // Ensure 'room_id' key exists to avoid undefined array key error
        if (!isset($transaction['room_id'])) {
            return redirect()->route('booking.check')->with('error', 'Room ID tidak ditemukan.');
        }

        $boardingHouse = $this->boardingHousesRepository->getBoardingHouseBySlug($slug);
        $room = $this->boardingHousesRepository->getBoardingHouseRoomById($transaction['room_id']);

        return view('pages.booking.checkout', compact('transaction', 'boardingHouse', 'room'));
    }

    public function payment(Request $request)
    {
        $this->transactionRepository->saveTransactionDataToSession($request->all());
        $transaction = $this->transactionRepository->saveTransaction($this->transactionRepository->getTransactionDataFromSession());
        // Set your Merchant Server Key
        \Midtrans\Config::$serverKey = config('midtrans.serverKey');
        // Set to Development/Sandbox Environment (default). Set to true for Production Environment (accept real transaction).
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
                'phone' => $transaction->phone_number,
            ],
        ];
        $paymentUrl = \Midtrans\Snap::createTransaction($params)->redirect_url;

        return redirect($paymentUrl);
    }

    public function success()
    {
        $boardingHouse = BoardingHouse::find(1); // Replace with actual logic to get the boarding house

        $transaction = Transaction::find(1); // Replace with actual logic to get the transaction

        return view('pages.booking.success', compact('transaction'));
    }

    public function check()
    {
        return view('pages.booking.check-booking');
    }

    public function show(BookingShowRequest $request)
    {
        $transaction = $this->transactionRepository->getTransactionByCodeEmailPhone($request->code, $request->email, $request->phone_number);

        if (!$transaction) {
            return redirect()->back()->with('error', 'Data Tidak Ditemukan');
        }

        return view('pages.booking.detail', compact('transaction'));
    }
}
