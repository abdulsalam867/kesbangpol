<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\VisiMisi;

class VisiMisiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $visimisi = VisiMisi::all();
        return view('pages.visi-misi.index', compact('visimisi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.visi-misi.create');
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
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $visimisi = VisiMisi::create([
            'visi' => $request->visi,
            'misi' => $request->misi,
        ]);

        toast('Data Disimpan!','success')->width('350px');
        return redirect()->route('visimisi.index');
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
        $visimisi = VisiMisi::findorfail($id);
        return view('pages.visi-misi.edit', compact('visimisi'));
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
            'visi' => 'required',
            'misi' => 'required'
        ]);

        $visimisi_data = [
            'visi' => $request->visi,
            'misi' => $request->misi
        ];

        VisiMisi::whereId($id)->update($visimisi_data);

        toast('Berhasil Diupdate!','info')->width('350px');
        return redirect()->route('visimisi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $visimisi = VisiMisi::findorfail($id);
        $visimisi->delete();

        toast('Data Dihapus!','success')->width('350px');
        return redirect()->route('visimisi.index');
    }
}
