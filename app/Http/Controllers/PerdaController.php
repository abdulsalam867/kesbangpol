<?php

namespace App\Http\Controllers;

use File;
use App\Models\Perda;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PerdaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $perda = Perda::all();
        return view('pages.perda.index', compact('perda'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.perda.create');
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

        $tujuan_upload = 'public/uploads/perda/';

        $file->move($tujuan_upload, $nama_file);

        $perda = Perda::create([
            'nomor' => $request->nomor,
            'tahun' => $request->tahun,
            'tentang' => $request->tentang,
            'file' => $nama_file
        ]);

        toast('Data Berhasil di Simpan','success')->width('350px');
        return redirect()->route('perda.index');
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
        $perda = Perda::find($id);
        return view('pages.perda.edit', compact('perda'));
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

        $perda = Perda::find($id);

        if ($request->has('file')) {
            $file = $request->file;
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'public/uploads/perda/';
            $file->move($tujuan_upload, $nama_file);

            File::Delete('public/uploads/perda/'.$perda->file);

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

        $perda->update($edit_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('perda.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Perda::where('id', $id)->first();
        File::delete('public/uploads/perda/'.$file->file);
        $file::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('perda.index');
    }
}
