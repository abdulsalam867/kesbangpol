<?php

namespace App\Http\Controllers;

use File;
use App\Models\Pegawai;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pegawai = Pegawai::all();
        return view('pages.pegawai.index', compact('pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.pegawai.create');
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
            'nama' => 'required',
            'nip' => 'required|numeric',
            'pangkat'  => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
            'avatar' => 'required|file|mimes:jpeg,jpg,png'
        ]);

        $avatar = $request->avatar;
        $new_avatar = time().$avatar->getClientOriginalName();

        $pegawai = Pegawai::create([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'pangkat' => $request->pangkat,
            'golongan' => $request->golongan,
            'jabatan' => $request->jabatan,
            'avatar' => 'public/uploads/pegawai/'.$new_avatar
        ]);

        $avatar->move('public/uploads/pegawai/', $new_avatar);

        toast('Data Berhasil di Simpan','success')->width('350px');
        return redirect()->route('pegawai');
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
        $pegawai = Pegawai::find($id);
        $avatar = Pegawai::find($id)->get();
        return view('pages.pegawai.edit', compact('pegawai','avatar'));
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
            'nama' => 'required',
            'nip' => 'required',
            'pangkat' => 'required',
            'golongan' => 'required',
            'jabatan' => 'required',
        ]);

        $pegawai = Pegawai::find($id);

        if ($request->has('avatar')) {
            $avatar = $request->avatar;
            $new_avatar = time().$avatar->getClientOriginalName();
            Image::make($avatar->getRealPath())->resize(null, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->save(public_path('public/uploads/pegawai/' . $new_avatar));

            File::Delete(public_path($pegawai->avatar));

            $pegawai_data = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'pangkat' => $request->pangkat,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan,
                'avatar' => 'public/uploads/pegawai/'.$new_avatar
            ];
        }

        else {
            $pegawai_data = [
                'nama' => $request->nama,
                'nip' => $request->nip,
                'pangkat' => $request->pangkat,
                'golongan' => $request->golongan,
                'jabatan' => $request->jabatan
            ];
        }
        
        $pegawai->update($pegawai_data);

        toast('Data Berhasil di Update','success')->width('350px');
        return redirect()->route('pegawai');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pegawai = Pegawai::where('id', $id)->first();
        File::Delete(public_path($pegawai->avatar));
        $pegawai->forceDelete();
        $pegawai::where('id', $id)->delete();
        
        toast('Data Berhasil di Hapus','success')->width('350px');
        return redirect()->route('pegawai');
    }
}
