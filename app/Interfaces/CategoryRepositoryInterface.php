<?php

namespace App\Interfaces;

interface CategoryRepositoryInterface
{
    public function getCategories();

    public function getCategoriesBySlug($slug);
}
