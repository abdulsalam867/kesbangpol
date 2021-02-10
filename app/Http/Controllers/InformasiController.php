<?php

namespace App\Http\Controllers;

use File;
use App\Models\Informasi;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informasi = Informasi::all();
        return view('pages.informasi.index', compact('informasi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category = Category::all();
        $tags = Tags::all();
        return view('pages.informasi.create', compact('category','tags'));
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
            'category_id' => 'required',
            'tags'  => 'required',
            'content' => 'required',
            'gambar' => 'mimes:jpg,jpeg,png'
        ]);

        $image = $request->gambar;
        $new_image = time().$image->getClientOriginalName();

        $informasi = Informasi::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'gambar' => 'public/uploads/informasi/'.$new_image,
            'users_id' => Auth::id()
        ]);

        $informasi->tags()->attach($request->tags);

        $image->move('public/uploads/informasi/', $new_image);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('informasi.index');
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
        $category = Category::all();
        $tags = Tags::all();
        $informasi = Informasi::find($id);
        $gambar = Informasi::find($id)->get();
        return view('pages.informasi.edit', compact('informasi','tags','category','gambar'));
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
            'category_id' => 'required',
            'tags'  => 'required',
            'content' => 'required'
        ]);

        $informasi = Informasi::find($id);

        if ($request->has('gambar')) {
            $image = $request->gambar;
            $new_image = time().$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('public/uploads/informasi/' . $new_image));

            File::Delete(public_path($informasi->gambar));

            $informasi_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'gambar' => 'public/uploads/informasi/'.$new_image
            ];
        }

        else {
            $informasi_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'content' => $request->content
            ];
        }
        

        $informasi->tags()->sync($request->tags);
        $informasi->update($informasi_data);

        toast('Data di Update!','success')->width('350px');
        return redirect()->route('informasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $informasi = Informasi::where('id', $id)->first();
        File::Delete(public_path($informasi->gambar));
        $informasi->tags()->detach();
        $informasi->forceDelete();
        $informasi::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('informasi.index');
    }
}
