@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[230px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>
    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="{{ route('check-booking.show') }}"
            class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
            <img src="assets/images/icons/arrow-left.svg" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">My Booking Details</p>
        <div class="w-12 dummy-btn"></div>
    </div>
    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
        <div class="flex flex-col w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('storage/' . $transaction->boardingHouse->thumbnail) }}"
                        class="object-cover w-full h-full" alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <p class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $boardingHouse->name }}</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">Kota {{ $transaction->boardingHouse->city->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->boardingHouse->category->name }}</p>
                    </div>
                </div>
            </div>
            <hr class="border-[#F1F2F6]">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[156px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('storage/' . $transaction->room->images->first()->image) }}"
                        class="object-cover w-full h-full" alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <p class="font-semibold text-lg leading-[27px]">{{ $transaction->room->name }}</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->room->capacity }} orang</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $transaction->room->square_feet }} M^2</p>
                    </div>
                    <hr class="border-[#F1F2F6]">
                    <p class="text-lg font-semibold text-ngekos-orange">Rp
                        {{ number_format($transaction->room->price_per_month, 0, ',', '.') }}<span
                            class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
                </div>
            </div>
        </div>
    </div>
    <div
        class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="text-lg font-semibold">Customer</p>
            <img src="assets/images/icons/arrow-up.svg"
                class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/profile-2user.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Name</p>
                </div>
                <p class="font-semibold">{{ $transaction->name }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/sms.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Email</p>
                </div>
                <p class="font-semibold">{{ $transaction->email }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/call.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Phone</p>
                </div>
                <p class="font-semibold">{{ $transaction->phone_number }}</p>
            </div>
        </div>
    </div>
    <div
        class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="text-lg font-semibold">Booking</p>
            <img src="assets/images/icons/arrow-up.svg"
                class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Booking ID</p>
                </div>
                <p class="font-semibold">{{ $transaction->code }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/clock.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Duration</p>
                </div>
                <p class="font-semibold">{{ $transaction->duration }} Months</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Started At</p>
                </div>
                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($transaction->start_date)->isoFormat('D MMMM YYYY') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="assets/images/icons/calendar.svg" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Ended At</p>
                </div>
                <p class="font-semibold">
                    {{ \Carbon\Carbon::parse($transaction->start_date)->addMonths(intval($transaction->duration))->isoFormat('D MMMM YYYY') }}
                </p>
            </div>
        </div>
    </div>
    <div
        class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="text-lg font-semibold">Payment</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        @php
            $subtotal = $transaction->$room->price_per_month * $transaction->duration;
            $tax = $subtotal * 0.11;
            $insurance = $subtotal * 0.01;
            $total = $subtotal + $tax + $insurance;
            $downpayment = $total * 0.3;
        @endphp
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/card-tick.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Payment</p>
                </div>
                @if ($transaction->payment_method === 'full_payment')
                    <p class="font-semibold">Full Payment 100%</p>
                @else
                    <p class="font-semibold">Down Payment 100%</p>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/receipt-2.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Kos Price</p>
                </div>
                <p class="font-semibold"> {{ number_format($transaction->$room->$price_per_mont, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/receipt-2.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Sub Total</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/receipt-disscount.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">PPN 11%</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($tax, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/security-user.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Insurance</p>
                </div>
                <p class="font-semibold">Rp {{ number_format($insurance, 0, ',', '.') }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/receipt-text.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Grand total</p>
                </div>
                @if ($transaction->payment_method === 'full_payment')
                    <p class="font-semibold">{{ number_format($total, 0, ',', '.') }}</p>
                @else
                    <p class="font-semibold">{{ number_format($downPayment, 0, ',', '.') }}</p>
                @endif
            </div>
            @if ($transaction->payment_status === 'pending')
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/security-card.svg') }}" class="flex w-6 h-6 shrink-0"
                            alt="icon">
                        <p class="text-ngekos-grey">Status</p>
                    </div>
                    <p class="rounded-full p-[6px_12px] bg-ngekos-orange font-bold text-xs leading-[18px]">PENDING</p>
                </div>
            @else
                <div class="flex items-center justify-between">
                    <div class="flex items-center gap-3">
                        <img src="{{ asset('assets/images/icons/security-card.svg') }}" class="flex w-6 h-6 shrink-0"
                            alt="icon">
                        <p class="text-ngekos-grey">Status</p>
                    </div>
                    <p class="rounded-full p-[6px_12px] bg-[#91BF77] font-bold text-xs leading-[18px]">SUCCESSFUL</p>
                </div>
            @endif
        </div>
    </div>
    <div id="BottomButton" class="relative flex w-full h-[98px] shrink-0">
        <div class="fixed bottom-[30px] w-full max-w-[640px] px-5 z-10">
            <a href="#"
                class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">Contact
                Customer Service</a>
        </div>
    </div>
@endsection
