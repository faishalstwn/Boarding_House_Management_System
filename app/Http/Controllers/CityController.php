<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\interface\BoardingHouseRepositoryInterface;
use App\interface\CityRepositoryInterface;

class CityController extends Controller
{
       private BoardingHouseRepositoryInterface $boardingHouseRepository;
    private CityRepositoryInterface $cityRepository;

    public function __construct(
        BoardingHouseRepositoryInterface $boardingHouseRepository,
         CityRepositoryInterface $cityRepository
    ) {
        $this->boardingHouseRepository = $boardingHouseRepository;
        $this->cityRepository = $cityRepository;
    }

    public function show($slug){
        $city = $this->cityRepository->getCityBySlug($slug);
        $boardingHouses = $this->boardingHouseRepository->getBoardingHousesByCitySlug($slug);

        return view('pages.city.show', compact('city', 'boardingHouses'));  
    }
}

