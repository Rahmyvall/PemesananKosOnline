<?php

namespace App\Repositories;

use App\Interfaces\CategoryRepositoryInterface;
use App\Models\Category;

class CategoryRepository implements CategoryRepositoryInterface
{
    public function getCategories()
    {
        return Category::all(); // Sesuaikan dengan kebutuhan
    }

    public function getCategoriesBySlug($slug)
    {
        return Category::where('slug', $slug)->first();
    }
}
