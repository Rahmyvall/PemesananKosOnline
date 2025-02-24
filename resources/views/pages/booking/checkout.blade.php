@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[230px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <a href="cust-info.html"
            class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
            <img src="{{ asset('assets/images/icons/arrow-left.svg') }}" class="w-[28px] h-[28px]" alt="icon">
        </a>
        <p class="font-semibold">Checkout Kos</p>
        <div class="w-12 dummy-btn"></div>
    </div>

    <div id="Header" class="relative flex items-center justify-between gap-2 px-5 mt-[18px]">
        <div class="flex flex-col w-full rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[132px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}" class="object-cover w-full h-full"
                        alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <p class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">{{ $boardingHouse->name }}</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/location.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">Kota {{ $boardingHouse->city->name }}</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $boardingHouse->category->name }}</p>
                    </div>
                </div>
            </div>
            <hr class="border-[#F1F2F6]">
            <div class="flex gap-4">
                <div class="flex w-[120px] h-[156px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                    <img src="{{ asset('storage/' . $room->images->first()->image) }}" class="object-cover w-full h-full"
                        alt="icon">
                </div>
                <div class="flex flex-col w-full gap-3">
                    <p class="font-semibold text-lg leading-[27px]">{{ $room->name }}</p>
                    <hr class="border-[#F1F2F6]">
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $room->capacity }} orang</p>
                    </div>
                    <div class="flex items-center gap-[6px]">
                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <p class="text-sm text-ngekos-grey">{{ $room->square_feet }} M^2</p>
                    </div>
                    <hr class="border-[#F1F2F6]">
                    <p class="text-lg font-semibold text-ngekos-orange">Rp
                        {{ number_format($room->price_per_month, 0, ',', '.') }}<span
                            class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
                </div>
            </div>
        </div>
    </div>

    <div
        class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="text-lg font-semibold">Customer</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/profile-2user.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                    <p class="text-ngekos-grey">Name</p>
                </div>
                <p class="font-semibold">{{ $transaction['name'] }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/sms.svg') }}" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Email</p>
                </div>
                <p class="font-semibold">{{ $transaction['email'] }}</p>
            </div>
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/call.svg') }}" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">Phone</p>
                </div>
                <p class="font-semibold">{{ $transaction['phone_number'] }}</p>
            </div>
        </div>
    </div>

    <div
        class="accordion group flex flex-col rounded-[30px] p-5 bg-[#F5F6F8] mx-5 mt-5 overflow-hidden has-[:checked]:!h-[68px] transition-all duration-300">
        <label class="relative flex items-center justify-between">
            <p class="text-lg font-semibold">Booking</p>
            <img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                alt="icon">
            <input type="checkbox" class="absolute hidden">
        </label>
        <div class="flex flex-col gap-4 pt-[22px]">
            <div class="flex items-center justify-between">
                <div class="flex items-center gap-3">
                    <img src="{{ asset('assets/images/icons/clock.svg') }}" class="flex w-6 h-6 shrink-0" alt="icon">
                    <p class="text-ngekos-grey">{{ $transaction['duration'] }} Month</p>
                </div>
                <p class="font-semibold">3 Months</p>
            </div>
            <div><img src="{{ asset('assets/images/icons/arrow-up.svg') }}"
                    class="w-[28px] h-[28px] flex shrink-0 group-has-[:checked]:rotate-180 transition-all duration-300"
                    alt="icon">
                <input type="checkbox" class="absolute hidden">
                </label>
                <div class="flex flex-col gap-4 pt-[22px]">
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/icons/clock.svg') }}" class="flex w-6 h-6 shrink-0"
                                alt="icon">
                            <p class="text-ngekos-grey">{{ $transaction['duration'] }} Month</p>
                        </div>
                        <p class="font-semibold">3 Months</p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/icons/calendar.svg') }}" class="flex w-6 h-6 shrink-0"
                                alt="icon">
                            <p class="text-ngekos-grey">Started At</p>
                        </div>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($transaction['start_date'])->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                    <div class="flex items-center justify-between">
                        <div class="flex items-center gap-3">
                            <img src="{{ asset('assets/images/icons/calendar.svg') }}" class="flex w-6 h-6 shrink-0"
                                alt="icon">
                            <p class="text-ngekos-grey">Ended At</p>
                        </div>
                        <p class="font-semibold">
                            {{ \Carbon\Carbon::parse($transaction['start_date'])->addMonths(intval($transaction['duration']))->isoFormat('D MMMM YYYY') }}
                        </p>
                    </div>
                </div>
            </div>
            <form action="{{ route('booking.payment', $boardingHouse->slug) }}"
                class="relative flex flex-col gap-6 pt-5 mt-5" method="POST">
                @csrf
                <div id="PaymentOptions" class="flex flex-col rounded-[30px] border border-[#F1F2F6] p-5 gap-4 mx-5">
                    <div id="TabButton-Container"
                        class="flex items-center justify-between border-b border-[#F1F2F6] gap-[18px]">
                        <label class="relative flex flex-col justify-between gap-4 tab-link group"
                            data-target-tab="#DownPayment-Tab">
                            <input type="radio" name="Payment" value="down"
                                class="absolute opacity-0 -z-10 top-1/2 left-1/2" checked>
                            <div class="flex items-center gap-3 mx-auto">
                                <div class="relative w-6 h-6">
                                    <img src="{{ asset('assets/images/icons/status-orange.svg') }}"
                                        class="absolute w-6 h-6 flex shrink-0 opacity-0 group-has-[:checked]:opacity-100 transition-all duration-300"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/status.svg') }}"
                                        class="absolute w-6 h-6 flex shrink-0 opacity-100 group-has-[:checked]:opacity-0 transition-all duration-300"
                                        alt="icon">
                                </div>
                                <p class="font-semibold">Down Payment</p>
                            </div>
                            <div
                                class="w-0 mx-auto group-has-[:checked]:ring-1 group-has-[:checked]:ring-[#91BF77] group-has-[:checked]:w-[90%] transition-all duration-300">
                            </div>
                        </label>
                        <div class="flex h-6 w-[1px] border border-[#F1F2F6] mb-auto"></div>
                        <label class="relative flex flex-col justify-between gap-4 tab-link group"
                            data-target-tab="#FullPayment-Tab">
                            <input type="radio" name="Payment" value="full"
                                class="absolute opacity-0 -z-10 top-1/2 left-1/2">
                            <div class="flex items-center gap-3 mx-auto">
                                <div class="relative w-6 h-6">
                                    <img src="{{ asset('assets/images/icons/diamonds-orange.svg') }}"
                                        class="absolute w-6 h-6 flex shrink-0 opacity-0 group-has-[:checked]:opacity-100 transition-all duration-300"
                                        alt="icon">
                                    <img src="{{ asset('assets/images/icons/diamonds.svg') }}"
                                        class="absolute w-6 h-6 flex shrink-0 group-has-[:checked]:opacity-0 transition-all duration-300"
                                        alt="icon">
                                </div>
                                <p class="font-semibold">Pay in Full</p>
                            </div>
                            <div
                                class="w-0 mx-auto group-has-[:checked]:ring-1 group-has-[:checked]:ring-[#91BF77] group-has-[:checked]:w-[90%] transition-all duration-300">
                            </div>
                        </label>
                    </div>
                    <div id="TabContent-Container">
                        @php
                            $subtotal = $room->price_per_month * $transaction['duration'];
                            $tax = $subtotal * 0.11;
                            $insurance = $subtotal * 0.01;
                            $total = $subtotal + $tax + $insurance;
                            $downpayment = $total * 0.3;
                        @endphp
                        <div id="DownPayment-Tab" class="flex flex-col gap-4 tab-content">
                            <p class="text-sm text-ngekos-grey">Anda perlu melunasi pembayaran secara cash setelah
                                melakukan
                                survey koskos</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/card-tick.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Payment</p>
                                </div>
                                <p class="font-semibold">Down Payment 30%</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-2.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Sub Total</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($subtotal, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-disscount.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">PPN 11%</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($tax, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/security-user.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Insurance</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($insurance, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-text.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Grand total (30%)</p>
                                </div>
                                <p id="downPaymentPrice" class="font-semibold">Rp
                                    {{ number_format($downpayment, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                        <div id="FullPayment-Tab" class="flex flex-col gap-4 tab-content">
                            <p class="text-sm text-ngekos-grey">Anda tidak perlu membayar biaya tambahan apapun ketika
                                survey koskos</p>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/card-tick.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Payment</p>
                                </div>
                                <p class="font-semibold">Full Payment 100%</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-2.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Sub Total</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($total, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-disscount.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">PPN 11%</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($tax, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/security-user.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Insurance</p>
                                </div>
                                <p class="font-semibold">Rp {{ number_format($insurance, 0, ',', '.') }}</p>
                            </div>
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-3">
                                    <img src="{{ asset('assets/images/icons/receipt-text.svg') }}"
                                        class="flex w-6 h-6 shrink-0" alt="icon">
                                    <p class="text-ngekos-grey">Grand total</p>
                                </div>
                                <p id="fullPaymentPrice" class="font-semibold">Rp
                                    {{ number_format($total, 0, ',', '.') }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div id="BottomNav" class="relative flex w-full h-[132px] shrink-0 bg-white">
                    <div class="fixed bottom-5 w-full max-w-[640px] px-5 z-10">
                        <div class="flex items-center justify-between rounded-[40px] py-4 px-6 bg-ngekos-black">
                            <div class="flex flex-col gap-[2px]">
                                <p id="price" class="font-bold text-xl leading-[30px] text-white">
                                    <!-- price dari js -->
                                </p>
                                <span class="text-sm text-white">Grand Total</span>
                            </div>
                            <button type="submit"
                                class="flex shrink-0 rounded-full py-[14px] px-5 bg-ngekos-orange font-bold text-white">Book
                                Now</button>
                        </div>
                    </div>
                </div>
            </form>
        @endsection
        @section('scripts')
            <script src="{{ asset('js/accodion.js') }}"></script>
            <script src="{{ asset('js/checkout.js') }}"></script>
        @endsection
