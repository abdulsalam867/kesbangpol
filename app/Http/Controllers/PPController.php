<?php

namespace App\Http\Controllers;

use File;
use App\Models\PP;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PPController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pp = PP::all();
        return view('pages.pp.index', compact('pp'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pp.create');
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
            'nomor' => 'required|numeric',
            'tentang' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        $file = $request->file;
        $nama_file = $file->getClientOriginalName();

        $tujuan_upload = 'public/uploads/pp/';

        $file->move($tujuan_upload, $nama_file);

        $pp = PP::create([
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'tentang' => $request->tentang,
            'file' => $nama_file
        ]);

        toast('Data Berhasil di Simpan','success')->width('350px');
        return redirect()->route('pp.index');
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
        $pp = PP::find($id);
        return view('pages.pp.edit', compact('pp'));
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
            'nomor' => 'required|numeric',
            'tahun' => 'required',
            'tentang' => 'required'
        ]);

        $pp = PP::find($id);

        if ($request->has('file')) {
            $file = $request->file;
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'public/uploads/pp/';
            $file->move($tujuan_upload, $nama_file);

            File::Delete('public/uploads/pp/'.$pp->file);

            $edit_data = [
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'tentang' =>  $request->tentang,
            'file' => $nama_file
            ];
        }

        else {
            $edit_data = [
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'tentang' => $request->tentang,
            ];
        }

        $pp->update($edit_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('pp.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = PP::where('id', $id)->first();
        File::delete('public/uploads/pp/'.$file->file);
        $file::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('pp.index');
    }
}
