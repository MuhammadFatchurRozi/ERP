<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\bahan_baku;
use App\Models\product;

class HomeController extends Controller
{
    public function index()
    {
        $pesanans = pesanan::orderBy('id', 'DESC')->get();
        $all_pesanan = pesanan::count('id');
        $kain = bahan_baku::where('id', 1)->first();
        $benang = bahan_baku::where('id', 2)->first();
        $sum_product = product::sum('penjualan');
        return view('home', compact('all_pesanan', 'kain', 'benang', 'pesanans', 'sum_product'));
    }

    public function kain()
    {
        $bahans = bahan_baku::where('bahan', 'Kain')->paginate(5);
        return view('admins.bahan.tampilbahan', compact('bahans'));
    }

    public function benang()
    {
        $bahans = bahan_baku::where('bahan', 'Benang')->paginate(5);
        return view('admins.bahan.tampilbahan', compact('bahans'));
    }
}
