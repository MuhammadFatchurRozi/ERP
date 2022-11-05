<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pesanan;
use App\Models\bom;
use App\Models\bahan_baku;
use Alert;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = pesanan::latest()->paginate(5);
        return view('admins.pesanan.tampilpesanan', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.pesanan.tambahpesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = pesanan::create($request->all());
        if ($masuk) {
            Alert::success('Pesanan Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Ditambahkan', 'Maaf');
            return redirect()->route('pesanan.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Di Alih Fungsi Menjadi Button Proses
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
        $pesanans = pesanan::find($id);
        return view('admins.pesanan.editpesanan', compact('pesanans'));
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
        $pesanans = pesanan::find($id);
        $pesanans->update($request->all());
        if ($pesanans) {
            Alert::success('Pesanan Berhasil Diubah', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Diubah', 'Maaf');
            return redirect()->route('pesanan.edit');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pesanans = pesanan::find($id);
        $pesanans->delete();
        if ($pesanans) {
            Alert::success('Pesanan Berhasil Dihapus', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Dihapus', 'Maaf');
            return redirect()->route('pesanan.index');
        }
    }

    //Proses Check Avibility (CA)
    public function proses($id)
    {
        $kain_bahan = bahan_baku::find(1);
        $kain_bahan = $kain_bahan->stok;
        $benang_bahan = bahan_baku::find(2);
        $benang_bahan = $benang_bahan->stok;


        $pesanans = pesanan::find($id);
        $kain_pesanan = $pesanans->kain;
        $benang_pesanan = $pesanans->benang;
        
        if ($kain_bahan >= $kain_pesanan && $benang_bahan >= $benang_pesanan) {
            
            $up_kain = $kain_bahan - $kain_pesanan;
            $up_benang = $benang_bahan - $benang_pesanan;
            
            $new_kain = bahan_baku::find(1);
            $new_kain->stok = $up_kain;
            $new_kain->save();

            $new_bahan = bahan_baku::find(2);
            $new_bahan->stok = $up_benang;
            $new_bahan->save();
            
            $pesanans->status = 1;
            $pesanans->save();

            Alert::success('Pesanan Berhasil Diproses', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Tidak Dapat Di Proses, Silahkan Tambah Stok ', 'Stok Kurang');
            return redirect()->route('stok.index');
        }
    }

    public function cetak($id)
    {
        $pesanans = pesanan::find($id);
        return view('admins.pesanan.cetakpesanan', compact('pesanans'));
    }
}
