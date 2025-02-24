<?php

namespace App\Interfaces;

interface CityRepositoryInterface
{
    public function getCities(); // Pastikan metode ini ada

    public function getCityBySlug($slug);
}
