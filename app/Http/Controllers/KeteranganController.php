<?php

namespace App\Http\Controllers;

use File;
use App\Models\Keterangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class KeteranganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $keterangan = Keterangan::all();
        return view('pages.keterangan.index', compact('keterangan'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.keterangan.create');
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
            'content' => 'required'
        ]);

        $keterangan = Keterangan::create([
            'title' => $request->title,
            'content' => $request->content,
        ]);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('keterangan.index');
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
        $keterangan = Keterangan::findorfail($id);
        return view('pages.keterangan.edit', compact('keterangan'));
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
            'content' => 'required'
        ]);

        $keterangan_data = [
            'title' => $request->title,
            'content' => $request->content
        ];

        Keterangan::whereId($id)->update($keterangan_data);

        toast('Berhasil Diupdate!','info')->width('350px');
        return redirect()->route('keterangan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $keterangan = Keterangan::findorfail($id);
        $keterangan->delete();

        toast('Data Dihapus!','success')->width('350px');
        return redirect()->route('keterangan.index');
    }
}
