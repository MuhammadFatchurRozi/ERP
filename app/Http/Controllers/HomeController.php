<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    bahan_baku,
    product,
    accounting_customer,
    accounting_vendor,
    mad,
    pesanan
};

use Carbon\Carbon;

class HomeController extends Controller
{
    public function index()
    {
        $year = Carbon::now()->year; 
        
        $customer = accounting_customer::whereYear('created_at', $year)->sum('total'); //Table Customer
        $mad = mad::whereYear('created_at', $year)->sum('total'); //Table Product
        
        $income = $customer + $mad;
        $expenditure = accounting_vendor::whereYear('created_at', $year)->sum('total'); //Table Vendor

        $kain = bahan_baku::where('id', 1)->first();
        $benang = bahan_baku::where('id', 2)->first();

        $pesanans = pesanan::orderBy('created_at', 'desc')->paginate(5);

        return view('home', compact('pesanans','kain', 'benang', 'year', 'income', 'expenditure'));
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
