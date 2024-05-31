<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $genre = Genre::all();
      
        return view('posts.index',compact('genre'));
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
        ]);
      
        $genre = new Genre;
        $genre-> name = $request->name;
        $genre->save();
        
       
        return redirect()->route('posts.index')
                        ->with('success','genre created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('posts.show',compact('genre'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $genre = Genre::findOrFail($id);
        return view('posts.edit',compact('genre'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required',  
        ]);
      
        $genre = Genre::find($id);
        $genre->nama = $request->nama;
        $genre->update();
      
        return redirect()->route('posts.index')
                        ->with('success','genre updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $genre = Genre::find($id);
        $genre->delete();
       
        return redirect()->route('posts.index')
                        ->with('success','genre deleted successfully');
    }
}
