<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Validator;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\Config;
use Auth;
use App\Models\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user = User::all();
        return view('pages.user.index', compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.user.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'tipe' => 'required'

        ]);

        if ($request->input('password')) {
            $password = bcrypt($request->password);
        }
        else
        {
           $password = bcrypt('123456');
       	}

       User::Create([
        'name' => $request->name,
        'email' => $request->email,
        'tipe' => $request->tipe,
        'password' => $password,
        'remember_token' => Str::random(60)
    ]);

       return redirect()->route('user.index')->with('sukses', 'User Berhasil di Tambah');
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
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
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
            'name' => 'required',
            'email' => 'required|email',
            'tipe' => 'required'

        ]);

        if ($request->input('password')) {
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe,
                'password' => bcrypt($request->password),
                'remember_token' => Str::random(60)
            ];
        }
        else
        {
            $user_data = [
                'name' => $request->name,
                'tipe' => $request->tipe
            ];
        }

        $user = User::find($id);
        $user->update($user_data);

        toast('User Berhasil di Update','success')->width('350px');
        return redirect()->route('user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();

        toast('User Berhasil di Delete','success')->width('350px');
        return redirect()->route('user.index');
    }

    public function changePasswordForm() {
        return view('pages.user.changePassword');
    }

    public function postChangePassword(Request $request)
    {
        $request->validate([
            'password_lama'         => 'required|password',
            'new_password'          => 'required|min:3',
            'password_confirmation' => 'required|same:new_password'
        ]);

        $current_user=auth()->user();

        if (Hash::check($request->password_lama, $current_user->password)) {
            $current_user->update([
                'password' => bcrypt($request->new_password)
            ]);
            return redirect()->back()->with('sukses', 'Password Berhasil di Ubah.');
        }else{
            return redirect()->back()->with('error', 'Password lama tidak sesuai.');
        }
    }
}
