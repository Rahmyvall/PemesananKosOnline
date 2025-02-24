<?php

namespace App\Http\Controllers;

use App\Interfaces\BoardingHouseRepositoryInterface;
use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHousesRepository;
    private CategoryRepositoryInterface $categoriesRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHousesRepository,
        CategoryRepositoryInterface $categoriesRepository
    ) {
        $this->boardingHousesRepository = $boardingHousesRepository;
        $this->categoriesRepository = $categoriesRepository;
    }

    public function index()
    {
        // Ambil semua kategori dari database
        $categories = Category::all();

        // Kirim data kategori ke view
        return view('categories.index', compact('categories'));
    }
    public function show($slug)
    {
        $category = $this->categoriesRepository->getCategoriesBySlug($slug); // Pastikan ini hanya satu kategori
        $boardingHouses = $this->boardingHousesRepository->getBoardingHouseByCategorySlug($slug);

        return view('pages.category.show', compact('category', 'boardingHouses'));
    }
}
