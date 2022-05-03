<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
use Illuminate\Support\Facades\Storage;
use App\Http\Controllers\AlbumsController;


class PhotosController extends Controller
{
    public function create(int $albumId)
    {

        return view('photos.create')->with('albumId', $albumId);
    }

    public function store(Request $request)
    {
        $this->validate($request,
            [
                'title' => 'required',
                'description' => 'required',
                'photo' => 'required|image'
            ]);

        $fileNameWithExtension = $request->file('photo')->getClientOriginalName();
        $fileName = pathinfo($fileNameWithExtension, PATHINFO_FILENAME);
        $extension = $request->file('photo')->getClientOriginalExtension();
        $fileNameToStore = $fileName . '_' . time() . '.' .$extension;
        $request->file('photo')->storeAs('public/albums/' . $request->input('album-id'), $fileNameToStore);

        $photo = new Photo();
        $photo->title = $request->input('title');
        $photo->description = $request->input('description');
        $photo->photo = $fileNameToStore;
        $photo->size = $request->file('photo')->getSize();
        $photo->album_id = $request->input('album-id');
        $photo->save();

        return redirect('/albums/' . $request->input('album-id'))->with('success', 'Photo uploaded successfully!');
    }

    public function show($id)
    {
        $photos = Photo::find($id);

        return view('photos.show')->with('photos', $photos);
    }

    public function destroy($id)
    {
        $photo = Photo::find($id);

        if(Storage::delete('public/albums/' . $photo->album_id . '/' . $photo->photo)){
            $albumId = $photo->album_id;
            $photo->delete();

            return redirect(route('albums-show', $albumId))->with('success', 'Photo deleted successfully!');
        }
    }
}
