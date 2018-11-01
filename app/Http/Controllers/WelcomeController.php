<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
    	$films = Film::all();
    	return view('films.index', compact('films'));
    }

    public function  show($slug)
    {
    	$film = Film::where('slug', $slug)->first();
    	return view('films.single', compact('film'));
    }
}
