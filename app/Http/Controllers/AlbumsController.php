<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Album;

class AlbumsController extends Controller
{
    public function index()
    {
        $albums = Album::with('photos')->get();
        
        return view('albums.index')->with('albums', $albums);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'name' => 'required',
                'description' => 'required',
                'cover-image' => 'required|image'
            ]);

        $fileNameWithExtension = $request->file('cover-image')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('cover-image')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' .$extension;
        $request->file('cover-image')->storeAs('public/album_covers', $fileNameToStore);

        $album = new Album();
        $album->name = $request->input('name');
        $album->description = $request->input('description');
        $album->cover_image = $fileNameToStore;
        $album->save();

        return redirect('/albums')->with('success', 'Album created successfully!');
    }

    public function show($id)
    {
        $albums = Album::with('photos')->find($id);

        return view('albums.show')->with('albums', $albums);
    }
}
