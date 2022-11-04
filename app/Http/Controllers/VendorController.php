<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\bahan_baku;
use Alert;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vendors = vendor::orderBy('status', 'asc')->paginate(10);
        return view('admins.data-vendor.tampilvendor',compact('vendors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.data-vendor.tambahvendor');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = vendor::create($request->all());
        if ($masuk) {
            Alert::success('Data Vendor Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('datavendor.index');
        } else {
            Alert::error('Data Vendor Gagal Ditambahkan', 'Maaf');
            return redirect()->route('datavendor.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $bahan = vendor::find($id);
        return view('admins.data-vendor.tambahstok', compact('bahan'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function tambahstok (Request $request,$id)
    {
        $bahan = vendor::find($id);
        $bahan_baku = bahan_baku::where('bahan', $bahan->nama_produk)->first();
        $bahan_baku->stok = $bahan_baku->stok + $request->stok;
        $bahan_baku->save();
        if ($bahan_baku) {
            Alert::success('Stok Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('bahan.index');
        } else {
            Alert::error('Stok Gagal Ditambahkan', 'Maaf');
            return redirect()->route('datavendor.show', $id);
        }
    }
}
