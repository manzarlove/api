<?php

namespace App\Models;

use App\Models\Country;
use App\Models\Genre;
use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
   protected $guarded = [];

   public function genres()
   {
   		return $this->belongsToMany(Genre::class);
   }

   public function country()
   {
   		return $this->belongsTo(Country::class);
   }
}
