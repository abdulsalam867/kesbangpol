<?php

namespace App\Http\Controllers;

use File;
use App\Models\Parpol;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ParpolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $parpol = Parpol::all();
        return view('pages.parpol.index', compact('parpol'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.parpol.create');
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
            'no_surat' => 'required',
            'nama' => 'required',
            'alamat' => 'required',
            'telpon' => 'required|numeric',
            'status' => 'required',
            'file' => 'required|file|mimes:pdf'
        ]);

        $file = $request->file;
        $nama_file = $file->getClientOriginalName();

        $tujuan_upload = 'public/uploads/parpol/';

        $file->move($tujuan_upload, $nama_file);

        $parpol = Parpol::create([
            'no_surat' => $request->no_surat,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telpon' => $request->telpon,
            'status' => $request->status,
            'file' => $nama_file
        ]);

        toast('Data Berhasil di Simpan','success')->width('350px');
        return redirect()->route('parpol.index');
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
        $parpol = Parpol::find($id);
        return view('pages.parpol.edit', compact('parpol'));
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
            'no_surat' => 'required',
            'nama' => 'required',
            'alamat' => 'required'
        ]);

        $parpol = Parpol::find($id);

        if ($request->has('file')) {
            $file = $request->file;
            $nama_file = $file->getClientOriginalName();
            $tujuan_upload = 'public/uploads/parpol/';
            $file->move($tujuan_upload, $nama_file);

            File::Delete('public/uploads/parpol/'.$parpol->file);

            $edit_data = [
            'no_surat' => $request->no_surat,
            'nama' => $request->nama,
            'alamat' =>  $request->alamat,
            'telpon' => $request->telpon,
            'status' => $request->status,
            'file' => $nama_file
            ];
        }

        else {
            $edit_data = [
            'no_surat' => $request->no_surat,
            'nama' => $request->nama,
            'alamat' =>  $request->alamat,
            'telpon' => $request->telpon,
            'status' => $request->status
            ];
        }

        $parpol->update($edit_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('parpol.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $file = Parpol::where('id', $id)->first();
        File::delete('public/uploads/parpol/'.$file->file);
        $file::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('parpol.index');
    }
}
