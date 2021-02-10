<?php

namespace App\Http\Controllers;

use File;
use App\Models\Posts;
use App\Models\Category;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
 
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $artikel = Posts::all();
        return view('pages.artikel.index', compact('artikel'));
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
        return view('pages.artikel.create', compact('category','tags'));
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
            'gambar' => 'required|mimes:jpg,jpeg,png'
        ]);

        $image = $request->gambar;
        $new_image = time().$image->getClientOriginalName();

        $post = Posts::create([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'slug' => Str::slug($request->title),
            'gambar' => 'public/uploads/artikel/'.$new_image,
            'users_id' => Auth::id()
        ]);

        $post->tags()->attach($request->tags);

        $image->move('public/uploads/artikel/', $new_image);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('post.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $artikel = Posts::find($id);
        return view('pages.artikel.show', compact('artikel'));
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
        $artikel = Posts::find($id);
        $gambar = Posts::find($id)->get();
        return view('pages.artikel.edit', compact('artikel','tags','category','gambar'));
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

        $artikel = Posts::find($id);

        if ($request->has('gambar')) {
            $image = $request->gambar;
            $new_image = time().$image->getClientOriginalName();
            Image::make($image->getRealPath())->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('public/uploads/artikel/' . $new_image));

            File::Delete(public_path($artikel->gambar));

            $artikel_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'content' => $request->content,
                'gambar' => 'public/uploads/artikel/'.$new_image
            ];
        }

        else {
            $artikel_data = [
                'title' => $request->title,
                'category_id' => $request->category_id,
                'slug' => Str::slug($request->title),
                'content' => $request->content
            ];
        }
        

        $artikel->tags()->sync($request->tags);
        $artikel->update($artikel_data);

        toast('Data di Update!','success')->width('350px');
        return redirect()->route('post.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Posts::withTrashed()->where('id', $id)->first();
        File::Delete(public_path($artikel->gambar));
        $artikel->tags()->detach();
        $artikel->forceDelete();

        toast('Berhasil di Hapus!','success')->width('400px');
        return redirect()->route('post.index');
    }

    public function tampilhapus()
    {
        $artikel = Posts::onlyTrashed()->get();
        return view('pages.artikel.hapus', compact('artikel'));
    }

    public function restore($id)
    {
        $artikel = Posts::withTrashed()->where('id', $id)->first();
        $artikel->restore();

        toast('Data Berhasil di Restore!','success')->width('350px');
        return redirect()->route('post.index');
    }

    public function kill($id)
    {
        $artikel = Posts::withTrashed()->where('id', $id)->first();
        File::Delete(public_path($artikel->gambar));
        $artikel->tags()->detach();
        $artikel->forceDelete();

        toast('Berhasil di Hapus Secara Permanen!','success')->width('400px');
        return redirect()->route('post.index');
    }
}
