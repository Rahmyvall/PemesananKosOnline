<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use App\Models\City;
use Illuminate\Http\Request;

class CityController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHousesRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHousesRepository,
        CityRepositoryInterface $cityRepository
    ) {
        $this->boardingHousesRepository = $boardingHousesRepository;
        $this->cityRepository = $cityRepository;
    }

    public function index()
    {
        // Ambil semua kategori dari database
        $city = City::all();

        // Kirim data kategori ke view
        return view('city.index', compact('city'));
    }
    public function show($slug)
    {
        $city = $this->cityRepository->getCityBySlug($slug);

        if (!$city) {
            return redirect()->route('home')->with('error', 'Kota tidak ditemukan');
        }

        $boardingHouses = $this->boardingHousesRepository->getBoardingHouseByCitySlug($slug);

        return view('pages.city.show', compact('city', 'boardingHouses'));
    }
}
