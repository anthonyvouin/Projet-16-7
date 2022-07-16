<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Childcategory;
use Illuminate\Support\Facades\DB;
use App\Models\Country;
use App\Models\City;
use App\Models\State;
use App\Models\User;
use Cohensive\Embed\Facades\Embed;

class Advertisement extends Model
{
    use HasFactory;
    protected $guarded=[];

    public function displayVideoFromLink()
    {
        $embed = Embed::make($this->link)->parseUrl();
        if (!$embed) {
            return;
        }
        $embed->setAttribute(['width' => 500]);
        return $embed->getHtml();
    }



    public function childcategory()
    {
        return $this->hasOne(Childcategory::class, 'id','childcategory_id');
    }

    public function country()
    {
        return $this->belongsTo(Country::class);
    }
    

    public function state()
    {
        return $this->belongsTo(State::class);
    }


    public function city()
    {
        return $this->belongsTo(city::class);
    }


    public function user()
    {
        return $this->belongsTo(User::class);
    }
    // save annonce relations

    public function userads()
    {
        return $this->belongsToMany(User::class);
    }

    public function didUserSavedAd()
    {
        return DB::table('advertisement_user')
        ->where('user_id', auth()->user()->id)
            ->where('advertisement_id', $this->id)
            ->first();
    }


    //scope method for Echange
    public function scopeFirstFourAdsInCaurosel($query, $categoryId)
     {
         return $query->where('category_id', $categoryId)
            ->orderByDesc('id')->take(4)->get();
     }


     public function scopeSecondFourAdsInCaurosel($query, $categoryId)
     {
         $firstAds = $this->scopeFirstFourAdsInCaurosel($query, $categoryId);
        return $query->where('category_id', $categoryId)
        ->whereNotIn('id', $firstAds->pluck('id')->toArray())
        ->take(4)->get();
     }



    //scope method for Tournois
    public function scopeFirstFourAdsInCauroselForTournois($query, $categoryId)
    {
        return $query->where('category_id', $categoryId)
            ->orderByDesc('id')->take(4)->get();
    }


    public function scopeSecondFourAdsInCauroselForTournois($query, $categoryId)
    {
        $firstAds = $this->scopeFirstFourAdsInCaurosel($query, $categoryId);
        return $query->where('category_id', $categoryId)
            ->whereNotIn('id', $firstAds->pluck('id')->toArray())
            ->take(4)->get();
    }

}
