<?php

namespace App\interface;

interface CategoryRepositoryInterface
{
    public function getAllCategories();

    public function getCategoryBySlug($slug);
}
