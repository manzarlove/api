<?php

namespace App\Models;

use App\Models\Film;
use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
    protected $guarded =[];

    public function films()
    {
    	return $this->hasMany(Film::class);
    }
}
