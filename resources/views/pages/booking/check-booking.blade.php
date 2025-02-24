@extends('layouts.app')

@section('content')
    <div id="Banner" class="w-full h-[200px] bg-cover bg-center"
        style="background-image: url('{{ asset('path/to/your/banner-image.jpg') }}');">
    </div>
    <div id="Background"
        class="absolute top-0 w-full h-[430px] rounded-b-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]">
    </div>
    <div class="relative flex flex-col gap-[30px] my-[60px] px-5">
        <h1 class="font-bold text-[30px] leading-[45px] text-center">Check Your<br>Booking Details</h1>
        <form action="{{ route('check-booking.show') }}"
            class="flex flex-col rounded-[30px] border border-[#F1F2F6] p-5 gap-6 bg-white" method="POST">
            @csrf
            <div class="flex flex-col gap-[6px]">
                <h1 class="text-lg font-semibold">Your Informations</h1>
                <p class="text-sm text-ngekos-grey">Fill the fields below with your valid data</p>
            </div>
            <div id="InputContainer" class="flex flex-col gap-[18px]">
                <div class="flex flex-col w-full gap-2">
                    <p class="font-semibold">Booking ID</p>
                    <label
                        class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                        <img src="{{ asset('assets/images/icons/note-favorite-grey.svg') }}" class="flex w-5 h-5 shrink-0"
                            alt="icon">
                        <input type="text" name="code" id=""
                            class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
                            placeholder="Write your booking id" value="{{ old('code') }}">
                        @error('code')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div class="flex flex-col w-full gap-2">
                    <p class="font-semibold">Email Address</p>
                    <label
                        class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                        <img src="{{ asset('assets/images/icons/sms.svg') }}" class="flex w-5 h-5 shrink-0" alt="icon">
                        <input type="email" name="email" id=""
                            class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
                            placeholder="Write your email" value="{{ old('email') }}">
                        @error('email')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <div class="flex flex-col w-full gap-2">
                    <p class="font-semibold">Phone No</p>
                    <label
                        class="flex items-center w-full rounded-full p-[14px_20px] gap-3 bg-white ring-1 ring-[#F1F2F6] focus-within:ring-[#91BF77] transition-all duration-300">
                        <img src="{{ asset('assets/images/icons/call.svg') }}" class="flex w-5 h-5 shrink-0" alt="icon">
                        <input type="tel" name="phone_number" id=""
                            class="w-full font-semibold outline-none appearance-none placeholder:text-ngekos-grey placeholder:font-normal"
                            placeholder="Write your phone" value="{{ old('phone_number') }}">
                        @error('phone_number')
                            <p class="text-sm text-red-500">{{ $message }}</p>
                        @enderror
                    </label>
                </div>
                <button type="submit"
                    class="flex w-full justify-center rounded-full p-[14px_20px] bg-ngekos-orange font-bold text-white">View
                    My Booking</button>
            </div>
        </form>
    </div>
@endsection
