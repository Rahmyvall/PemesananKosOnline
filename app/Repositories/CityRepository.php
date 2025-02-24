<?php

namespace App\Repositories;

use App\Interfaces\CityRepositoryInterface;
use App\Models\City;

class CityRepository implements CityRepositoryInterface
{
    public function getCities()
    {
        return City::all(); // Sesuaikan dengan kebutuhan
    }
    public function getCityBySlug($slug)
    {
        return City::where('slug', $slug)->first();
    }
}
