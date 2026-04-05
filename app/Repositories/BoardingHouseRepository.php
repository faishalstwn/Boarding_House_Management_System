<?php

namespace App\Repositories;

use App\Interface\BoardingHouseRepositoryInterface;
use App\Models\BoardingHouse;
use App\Models\Room;
use Illuminate\Database\Eloquent\Builder;

class BoardingHouseRepository implements BoardingHouseRepositoryInterface
{
    public function getAllBoardingHouses($search = null, $city = null, $category = null)
    {
        $query = BoardingHouse::query();
        
        if ($search) {
            $query->where('name', 'like', "%{$search}%");
        }
        
        if ($city) {
            $query->whereHas('city', function ($q) use ($city) {
                $q->where('slug', $city);
            });
        }
        
        if ($category) {
            $query->whereHas('category', function ($q) use ($category) {
                $q->where('slug', $category);
            });
        }
        
        return $query->get();
    }

    public function getPopularBoardingHouses($limit = 5)
    {
        return BoardingHouse::withCount('transactions')
            ->orderBy('transactions_count', 'desc')
            ->take($limit)
            ->get();
    }

    public function getBoardingHousesByCitySlug($slug)
    {
        return BoardingHouse::whereHas('city', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->get();
    }

    public function getBoardingHousesByCategorySlug($slug)
    {
        return BoardingHouse::whereHas('category', function ($q) use ($slug) {
            $q->where('slug', $slug);
        })->get();
    }

    public function getBoardingHouseBySlug($slug)
    {
        return BoardingHouse::where('slug', $slug)->firstOrFail();
    }

    public function getBoardingHouseRoomById($id)
    {
        return Room::find($id);
    }   
}
