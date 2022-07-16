<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Advertisement;
use App\Models\Category;

class FrontAdsController extends Controller
{
    public function index()
    {
        // for category Echange
      

        // get all categories

        // for category Tournois
        $categories = Category::get();

        $categoryTournois = Category::CategoryTournois();
        $firstAdsForTournois = Advertisement::firstFourAdsInCauroselForTournois(
            $categoryTournois->id
        );
        $secondsAdsForTournois = Advertisement::secondFourAdsInCauroselForTournois(
            $categoryTournois->id
        );

        return view('index', compact(
            'firstAds', 
            'secondsAds', 
            'category',
            'categoryTournois',
            'firstAdsForTournois',
            'secondsAdsForTournois',
            'categories'
        ));

    }

}
