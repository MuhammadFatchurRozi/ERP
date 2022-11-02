<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;


class HomeController extends Controller
{
    public function index()
    {
        $pesanans = pesanan::orderBy('id', 'DESC')->get();
        $all_pesanan = pesanan::count('id');
        $sum_kain = pesanan::sum('kain'); 
        $sum_benang = pesanan::sum('benang'); 
        return view('home',compact('all_pesanan','sum_kain','sum_benang','pesanans'));
    }
}
