<?php

namespace App\Http\Controllers;

use File;
use App\Models\Slides;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class SlideController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $slides = Slides::all();
        return view('pages.slides.index', compact('slides'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.slides.create');
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
            'image' => 'required|mimes:jpg,jpeg,png'
        ]);

        $image = $request->image;
        $new_image = time().$image->getClientOriginalName();

        $slide = Slides::create([
            'title' => $request->title,
            'image' => 'public/uploads/slideshow/'.$new_image,
        ]);

        $image->move('public/uploads/slideshow/', $new_image);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('slideImages.index');
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
        $slide = Slides::find($id);
        $gambar = Slides::find($id)->get();
        return view('pages.slides.edit', compact('slide','gambar'));
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
            'title' => 'required'
        ]);

        $slide = Slides::find($id);

        if ($request->has('image')) {
            $gambar = $request->image;
            $new_image = time().$gambar->getClientOriginalName();
            Image::make($gambar->getRealPath())->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('public/uploads/slideshow/' . $new_image));

            File::Delete(public_path($slide->image));

            $slide_data = [
                'title' => $request->title,
                'image' => 'public/uploads/slideshow/'.$new_image
            ];
        }

        else {
            $slide_data = [
                'title' => $request->title
            ];
        }

        $slide->update($slide_data);

        toast('Data di Update!','success')->width('350px');
        return redirect()->route('slideImages.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $slide = Slides::where('id', $id)->first();
        File::Delete(public_path($slide->image));
        $slide->forceDelete();
        $slide::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('slideImages.index');
    }
}
