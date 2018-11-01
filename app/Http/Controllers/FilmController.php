<?php

namespace App\Http\Controllers;

use App\Models\Country;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;

class FilmController extends Controller
{
	public function index()
    {
    	return Film::all();
    	//return view('films.index', compact('films'));
    }

    public function  show(Film $film)
    {
    	$film = Film::where('slug', $slug)->first();
    	return view('films.single', compact('film'));
    }

    public function create()
    {
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.films.create', compact('countries', 'genres'));
    }

    public function store(Request $request)
    {

    	$request->validate([
            'name'=>'required',
            'description'=>'required',
            'realease_date'=>'required',
            'price'=>'required',
            'country'=>'required|not_in:0',
            'genre'=>'required|not_in:0',
            'image'=>'required|mimes:jpeg,jpg,png,gif'
        ]);

    	$filename=  $request->image->getClientOriginalName();

        $extension = $request->image->extension($filename);
        if($extension=="jpg"||$extension=="jpeg"||$extension=="png"||$extension=="png")
        {
            if(!Storage::disk('public')->exists('films'))
            {
                Storage::disk('public')->makeDirectory('films');
            }

            $request->image->storeAs('public/films/', $filename);
            
        }

        $films = Film::create([
            'name'=>$request->name,
            'slug'=>str_slug($request->name),
            'description'=>$request->description,
            'release_date'=>$request->realease_date,
            'rating'=>$request->rating,
            'price'=>$request->price,
            'country_id'=>$request->country,
            'photo'=>$filename,

        ]);

        $films = $films->genres()->attach($request->genre);

         return response()->json($films, 201);   


        return back()->with('message', 'Film Created Successfully');
    }

    public function update(Request $request, Film $film)
    {
        $request->validate([
            'name'=>'required',
            'description'=>'required',
            'realease_date'=>'required',
            'price'=>'required',
            'country'=>'required|not_in:0',
            'genre'=>'required|not_in:0',
           
        ]);

         $film->name = $request->name;
         $film->genre_id = $request->genre;
         $film->country_id = $request->country;
         $film->description = $request->description;
         $film->release_date = $request->realease_date;
         $film->rating = $request->rating;
         $film->price = $request->price;
         $film->slug = str_slug($request->name);
         $film->save();

         return response()->json($film, 200);
         //return redirect()->route('films.index')->with('message', 'Film Updated Successfully');
    }

    public function delete(Film $film)
    {
        $film->delete();
        return response()->json(null, 204);
    }
}
