<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\TupoksiBagian;

class TupoksiBagianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bagian = TupoksiBagian::all();
        return view('pages.tupoksibagian.index', compact('bagian'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tupoksibagian.create');
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
            'content' => 'required'
        ]);

        $bagian = TupoksiBagian::create([
            'content' => $request->content
        ]);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('tupoksi.bagian');
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
        $bagian = TupoksiBagian::findorfail($id);
        return view('pages.tupoksibagian.edit', compact('bagian'));
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
            'content' => 'required'
        ]);

        $bagian_data = [
            'content' => $request->content
        ];

        TupoksiBagian::whereId($id)->update($bagian_data);

        toast('Berhasil Diupdate!','info')->width('350px');
        return redirect()->route('tupoksi.bagian');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bagian = TupoksiBagian::findorfail($id);
        $bagian->delete();

        toast('Data Dihapus!','success')->width('350px');
        return redirect()->route('tupoksi.bagian');
    }
}
