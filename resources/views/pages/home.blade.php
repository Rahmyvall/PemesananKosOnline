@extends('layouts.app')

@section('content')
    <div id="Background"
        class="absolute top-0 w-full h-[280px] rounded-bl-[75px] bg-[linear-gradient(180deg,#F2F9E6_0%,#D2EDE4_100%)]"></div>

    <div id="TopNav" class="relative flex items-center justify-between px-5 mt-[60px]">
        <div class="flex flex-col gap-1">
            <p>Good day,</p>
            <h1 class="font-bold text-xl leading-[30px]">Explore Beautiful Vip</h1>
        </div>
        <a href="{{ route('categories.index') }}"
            class="flex items-center justify-center w-12 h-12 overflow-hidden bg-white rounded-full shrink-0">
            <img src="{{ asset('assets/images/icons/notification.svg') }}" class="w-[28px] h-[28px]" alt="icon">
        </a>
    </div>

    <div id="Categories" class="swiper w-full overflow-x-hidden mt-[30px]">
        <div class="swiper-wrapper">
            @foreach ($categories as $category)
                <div class="swiper-slide !w-fit pb-[30px]">
                    <a href="{{ route('category.show', $category->slug) }}" class="card">
                        <div
                            class="flex flex-col items-center w-[120px] shrink-0 rounded-[40px] p-4 pb-5 gap-3 bg-white shadow-[0px_12px_30px_0px_#0000000D] text-center">
                            <div class="w-[70px] h-[70px] rounded-full flex shrink-0 overflow-hidden">
                                <img src="{{ asset('storage/' . $category->image) }}" class="object-cover w-full h-full"
                                    alt="thumbnail">
                            </div>
                            <div class="flex flex-col gap-[2px]">
                                <h3 class="font-semibold">{{ $category->name }}</h3>
                                <p class="text-sm text-ngekos-grey">{{ $category->boardingHouse->count() }} Kos</p>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

    <section id="Popular" class="flex flex-col gap-4">
        <div class="flex items-center justify-between px-5">
            <h2 class="font-bold">Popular Kos</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                </div>
            </a>
        </div>
        <div class="w-full overflow-x-hidden swiper">
            <div class="swiper-wrapper">
                @foreach ($popularBoardingHouses as $boardingHouse)
                    <div class="swiper-slide !w-fit">
                        <a href="{{ route('kos.show', $boardingHouse->slug) }}" class="card">
                            <div
                                class="flex flex-col w-[250px] shrink-0 rounded-[30px] border border-[#F1F2F6] p-4 pb-5 gap-[10px] hover:border-[#91BF77] transition-all duration-300">
                                <div class="flex w-full h-[150px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                                    <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                        class="object-cover w-full h-full" alt="thumbnail">
                                </div>
                                <div class="flex flex-col gap-3">
                                    <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                                        {{ $boardingHouse->name }}</h3>
                                    <hr class="border-[#F1F2F6]">
                                    <div class="flex items-center gap-[6px]">
                                        <img src="{{ asset('assets/images/icons/location.svg') }}"
                                            class="flex w-5 h-5 shrink-0" alt="icon">
                                        <p class="text-sm text-ngekos-grey">{{ $boardingHouse->city->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-[6px]">
                                        <img src="{{ asset('assets/images/icons/3dcube.svg') }}"
                                            class="flex w-5 h-5 shrink-0" alt="icon">
                                        <p class="text-sm text-ngekos-grey">In {{ $boardingHouse->category->name }}</p>
                                    </div>
                                    <div class="flex items-center gap-[6px]">
                                        <img src="{{ asset('assets/images/icons/profile-2user.svg') }}"
                                            class="flex w-5 h-5 shrink-0" alt="icon">
                                        <p class="text-sm text-ngekos-grey">5 People</p>
                                    </div>
                                    <hr class="border-[#F1F2F6]">
                                    <p class="text-lg font-semibold text-ngekos-orange">Rp
                                        {{ number_format($boardingHouse->price, 0, ',', '.') }}<span
                                            class="text-sm font-normal text-ngekos-grey">/bulan</span>
                                    </p>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <section id="Cities" class="flex flex-col p-5 gap-4 bg-[#F5F6F8] mt-[30px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold">Browse Cities</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                </div>
            </a>
        </div>
        <div class="grid grid-cols-2 gap-4">
            @foreach ($cities as $city)
                <a href="{{ route('city.show', $city->slug) }}" class="card">
                    <div
                        class="flex items-center rounded-[22px] p-[10px] gap-3 bg-white border border-white overflow-hidden hover:border-[#91BF77] transition-all duration-300">
                        <div
                            class="w-[55px] h-[55px] flex shrink-0 rounded-full border-4 border-white ring-1 ring-[#F1F2F6] overflow-hidden">
                            <img src="{{ asset('storage/' . $city->image) }}" class="object-cover w-full h-full"
                                alt="icon">
                        </div>
                        <div class="flex flex-col gap-[2px]">
                            <h3 class="font-semibold">{{ $city->name }}</h3>
                            <p class="text-sm text-ngekos-grey">{{ $city->boardingHouse->count() }} Kos</p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>

    <section id="Best" class="flex flex-col gap-4 px-5 mt-[30px]">
        <div class="flex items-center justify-between">
            <h2 class="font-bold">All Great Koskos</h2>
            <a href="#">
                <div class="flex items-center gap-2">
                    <span>See all</span>
                    <img src="{{ asset('assets/images/icons/arrow-right.svg') }}" class="flex w-6 h-6 shrink-0"
                        alt="icon">
                </div>
            </a>
        </div>
        <div class="flex flex-col gap-4">
            @foreach ($boardingHouses as $boardingHouse)
                <a href="{{ route('kos.show', $boardingHouse->slug) }}" class="card">
                    <div
                        class="flex rounded-[30px] border border-[#F1F2F6] p-4 gap-4 bg-white hover:border-[#91BF77] transition-all duration-300">
                        <div class="flex w-[120px] h-[183px] shrink-0 rounded-[30px] bg-[#D9D9D9] overflow-hidden">
                            <img src="{{ asset('storage/' . $boardingHouse->thumbnail) }}"
                                class="object-cover w-full h-full" alt="icon">
                        </div>
                        <div class="flex flex-col w-full gap-3">
                            <h3 class="font-semibold text-lg leading-[27px] line-clamp-2 min-h-[54px]">
                                {{ $boardingHouse->name }}</h3>
                            <hr class="border-[#F1F2F6]">
                            <div class="flex items-center gap-[6px]">
                                <img src="{{ asset('assets/images/icons/location.svg') }}" class="flex w-5 h-5 shrink-0"
                                    alt="icon">
                                <p class="text-sm text-ngekos-grey">{{ $boardingHouse->city->name }}</p>
                            </div>
                            <div class="flex items-center gap-[6px]">
                                <img src="{{ asset('assets/images/icons/profile-2user.svg') }}"
                                    class="flex w-5 h-5 shrink-0" alt="icon">
                                <p class="text-sm text-ngekos-grey">4 People</p>
                            </div>
                            <hr class="border-[#F1F2F6]">
                            <p class="text-lg font-semibold text-ngekos-orange">Rp
                                {{ number_format($boardingHouse->price, 0, ',', '.') }}<span
                                    class="text-sm font-normal text-ngekos-grey">/bulan</span></p>
                        </div>
                    </div>
                </a>
            @endforeach
        </div>
    </section>
    @include('includes.navigation')
@endsection
