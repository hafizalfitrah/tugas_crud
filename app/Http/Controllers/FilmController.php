<?php

namespace App\Http\Controllers;

use App\Models\Film;
use Illuminate\Http\Request;

class FilmController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $film = Film::all();
      
        return view('posts.index',compact('film'));
            
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'tahun' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
      
        Film::create($request->all());
        $film = new Film;
       
        return redirect()->route('posts.index');
                        
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $film = Film::findOrFail($id);
        return view('posts.show',compact('film'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $film     = Film::findOrFail($id);
        return view('posts.edit',compact('film'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',
            'tahun' => 'required',
            'gambar' => 'required',
            'deskripsi' => 'required',
        ]);
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $film = Film::find($id);
        $film->delete();

       
        return redirect()->route('posts.index');
                        
    }
}
