<?php

namespace App\Models;

use App\Models\Film;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    protected $guarded =[];

    public function films()
    {
    	return $this->belongsToMany(Film::class);
    }
}
