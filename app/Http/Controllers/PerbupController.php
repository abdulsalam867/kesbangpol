<?php

namespace App\Http\Controllers;

use File;
use App\Models\Perbup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PerbupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perbup = Perbup::all();
        return view('pages.perbup.index', compact('perbup'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.perbup.create');
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

        $tujuan_upload = 'public/uploads/perbup/';

        $file->move($tujuan_upload, $nama_file);

        $perbup = Perbup::create([
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'tentang' => $request->tentang,
            'file' => $nama_file
        ]);

        toast('Data Berhasil di Simpan','success')->width('350px');
        return redirect()->route('perbup.index');
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
        $perbup = Perbup::find($id);
        return view('pages.perbup.edit', compact('perbup'));
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

        $perbup = Perbup::find($id);

        if ($request->has('file')) {
            $file = $request->file;
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'public/uploads/perbup/';
            $file->move($tujuan_upload, $nama_file);

            File::Delete('public/uploads/perbup/'.$perbup->file);

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

        $perbup->update($edit_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('perbup.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Perbup::where('id', $id)->first();
        File::delete('public/uploads/perbup/'.$file->file);
        $file::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('perbup.index');
    }
}
