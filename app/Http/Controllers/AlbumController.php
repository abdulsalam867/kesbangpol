<?php

namespace App\Http\Controllers;

use File;
use App\Models\Albums;
use App\Models\Photos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $albums = Albums::get();
        return view('pages.albums.index')->with('albums', $albums);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.albums.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'cover_image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();

        $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

        $extension = $request->file('cover_image')->getClientOriginalExtension();

        $filenameToStore = $filename . '_' . time() . '.' . $extension;

        $path = $request->file('cover_image')->storeAs('public/album_covers', $filenameToStore);

        $album = new Albums();
        $album->title = $request->input('title');
        $album->description = $request->input('description');
        $album->cover_image = $filenameToStore;
        $album->save();

        toast('Berhasil di Upload!','success')->width('350px');
        return redirect()->route('album.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $album = Albums::with('photos')->find($id);
        return view('pages.albums.show')->with('album', $album);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $album = Albums::find($id);
        $cover_image = Albums::find($id)->get();
        return view('pages.albums.edit', compact('album','cover_image'));
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
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required'
        ]);

        $album = Albums::find($id);

        if ($request->has('cover_image')) {
            $avatar = $request->cover_image;
            $filenameWithExtension = $request->file('cover_image')->getClientOriginalName();

            $filename = pathinfo($filenameWithExtension, PATHINFO_FILENAME);

            $extension = $request->file('cover_image')->getClientOriginalExtension();

            $filenameToStore = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('cover_image')->storeAs('public/album_covers/', $filenameToStore);

            Storage::Delete('public/album_covers/'.$album->cover_image);

            $album_data = [
                $album->title = $request->input('title'),
                $album->description = $request->input('description'),
                $album->cover_image = $filenameToStore
            ];
        }

        else {
            $album_data = [
                $album->title = $request->input('title'),
                $album->description = $request->input('description')
            ];
        }
        
        
        $album->update($album_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('album.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $album = Albums::with('photos')->find($id);
         if (Storage::delete('public/album_covers/'.$album->cover_image)) 
         {
            $album->delete();

            toast('Album Berhasil di Hapus','success')->width('350px');
            return redirect()->route('album.index');
        }
    }
}
