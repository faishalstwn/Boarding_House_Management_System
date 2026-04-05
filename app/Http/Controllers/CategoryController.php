<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interface\BoardingHouseRepositoryInterface;
use App\interface\CategoryRepositoryInterface;
use App\Repositories\CategoryRepository;

class CategoryController extends Controller
{
    private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CategoryRepositoryInterface $categoryRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
         CategoryRepositoryInterface $categoryRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function show($slug){
        $category = $this->categoryRepository->getCategoryBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHousesByCategorySlug($slug);

        return view('pages.category.show', compact('category', 'boardingHouses'));
    }
}
