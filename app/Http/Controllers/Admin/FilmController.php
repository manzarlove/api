<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Country;
use App\Models\Film;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $films = Film::all();
        return view('admin.films.index', compact('films'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.films.create', compact('countries', 'genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
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



        return back()->with('message', 'Film Created Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $film = Film::find($id);
        $countries = Country::all();
        $genres = Genre::all();
        return view('admin.films.edit', compact('film', 'countries', 'genres'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
         $request->validate([
            'name'=>'required',
            'description'=>'required',
            'realease_date'=>'required',
            'price'=>'required',
            'country'=>'required|not_in:0',
            'genre'=>'required|not_in:0',
           
        ]);

         $film = Film::find($id);

         $film->name = $request->name;
         $film->genre_id = $request->genre;
         $film->country_id = $request->country;
         $film->description = $request->description;
         $film->release_date = $request->realease_date;
         $film->rating = $request->rating;
         $film->price = $request->price;
         $film->slug = str_slug($request->name);
         $film->save();
         return redirect()->route('films.index')->with('message', 'Film Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $film = Film::find($id);
        if($film->delete())
        {
            return back()->with('message', 'Films Deleted Successfully');
        }
    }
}
