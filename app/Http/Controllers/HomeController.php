<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\bahan_baku;

class HomeController extends Controller
{
    public function index()
    {
        $pesanans = pesanan::orderBy('id', 'DESC')->get();
        $all_pesanan = pesanan::count('id');
        $kain = bahan_baku::where('id', 1)->first();
        $benang = bahan_baku::where('id', 2)->first();
        return view('home',compact('all_pesanan','kain','benang','pesanans'));
    }
}
