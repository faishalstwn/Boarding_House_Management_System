<?php

namespace App\Http\Controllers;

use App\interface\CityRepositoryInterface;
use Illuminate\Http\Request;
use App\interface\CategoryRepositoryInterface;
use App\interface\BoardingHouseRepositoryInterface;

class HomeController extends Controller
{
    private CityRepositoryInterface $cityRepository;
    private CategoryRepositoryInterface $categoryRepository;

    private BoardingHouseRepositoryInterface $boardingHouseRepository;

    public function __construct(
        CityRepositoryInterface $cityRepository,
        CategoryRepositoryInterface $categoryRepository,
        BoardingHouseRepositoryInterface $boardingHouseRepository
    ) {
        $this->cityRepository = $cityRepository;
        $this->categoryRepository = $categoryRepository;
        $this->boardingHouseRepository = $boardingHouseRepository;
    }

    public function index(){
     $popularBoardingHouse = $this->boardingHouseRepository->getPopularBoardingHouses();
     $categories = $this->categoryRepository->getAllCategories();
     $cities = $this->cityRepository->getAllCities();
     $boardingHouses = $this->boardingHouseRepository->getAllBoardingHouses();
        return view('pages.home', compact('categories', 'popularBoardingHouse', 'cities', 'boardingHouses'));
    }
}
