<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\{
    bahan_baku,
    product,
    accounting_customer,
    accounting_vendor,
    mad,
    pesanan,
    vendor
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

    public function kain_create()
    {
        $vendors = vendor::where('nama_bahan_baku', 'Kain')->where('status', 'aktif')->get(); //mengambil data vendor yang statusnya aktif
        return view('admins.RFQ.tambahrfq',compact('vendors'));
    }

    public function benang()
    {
        $bahans = bahan_baku::where('bahan', 'Benang')->paginate(5);
        return view('admins.bahan.tampilbahan', compact('bahans'));
    }
    public function benang_create()
    {
        $vendors = vendor::where('nama_bahan_baku', 'Benang')->where('status', 'aktif')->get(); //mengambil data vendor yang statusnya aktif
        return view('admins.RFQ.tambahrfq',compact('vendors'));
    }

    public function cetak_income()
    {
        $title_date = accounting_customer::orderBy('created_at', 'desc')->first();
        $sum_totals = accounting_customer::sum('total');
        $get_data = accounting_customer::orderBy('created_at', 'desc')->get();
        return view('report_dashboard.report', compact('get_data', 'title_date', 'sum_totals'));
    }

    public function cetak_expenditure()
    {
        $title_date = accounting_vendor::orderBy('created_at', 'desc')->first();
        $sum_totals = accounting_vendor::sum('total');
        $get_data = accounting_vendor::orderBy('created_at', 'desc')->get();
        return view('report_dashboard.report', compact('get_data', 'title_date', 'sum_totals'));
    }
}
