<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Tupoksi;

class TupoksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tupoksi = Tupoksi::all();
        return view('pages.tupoksi.index', compact('tupoksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.tupoksi.create');
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

        $tupoksi = Tupoksi::create([
            'content' => $request->content
        ]);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('tupoksi.index');
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
        $tupoksi = Tupoksi::findorfail($id);
        return view('pages.tupoksi.edit', compact('tupoksi'));
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

        $tupoksi_data = [
            'content' => $request->content
        ];

        Tupoksi::whereId($id)->update($tupoksi_data);

        toast('Berhasil Diupdate!','info')->width('350px');
        return redirect()->route('tupoksi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tupoksi = Tupoksi::findorfail($id);
        $tupoksi->delete();

        toast('Data Dihapus!','success')->width('350px');
        return redirect()->route('tupoksi.index');
    }
}
