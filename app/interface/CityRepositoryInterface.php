<?php

namespace App\interface;

interface CityRepositoryInterface
{
    public function getAllCities();

      public function getCityBySlug($slug);
}
