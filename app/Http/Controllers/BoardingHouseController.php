<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Interfaces\CityRepositoryInterface;
use Illuminate\Http\Request;

class BoardingHouseController extends Controller
{

    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;
    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository,
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function show($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.boarding-house.show', compact('boardingHouse'));
    }
    public function results()
    {
        return view('boarding-house.results'); // Pastikan nama view sesuai dengan file di resources/views/
    }

    public function rooms($slug)
    {
        $boardingHouse = $this->boardingHouseRepository->getBoardingHouseBySlug($slug);
        return view('pages.boarding-house.rooms', compact('boardingHouse'));
    }

    public function find()
    {
        $categories = $this->categoryRepository->getCategories();
        $cities = $this->cityRepository->getCities();
        return view('pages.boarding-house.find', compact('categories', 'cities'));
    }

    public function findResults(Request $request)
    {
        $boardingHouse = $this->boardingHouseRepository->getAllBoardingHouses($request->search, $request->city, $request->category);
        return view('pages.boarding-house.index', compact('boardingHouse'));
    }
}
