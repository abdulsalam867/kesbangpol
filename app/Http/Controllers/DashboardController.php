<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Posts;
use App\Models\Pegawai;


class DashboardController extends Controller
{
    public function index()
    {
    	$articles = Posts::latest()->get();
    	$staff = Pegawai::take(5)->get();
    	return view('dashboard', compact('staff','articles'));
    }
}
