<?php

namespace App\Http\Controllers;

use App\Models\bahan_baku;
use Illuminate\Http\Request;
use Alert;
use PDF;


class Bahan_BakuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bahans = bahan_baku::latest()->paginate(5);
        return view('admins.bahan.tampilbahan', compact('bahans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.bahan.tambahbahan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = bahan_baku::create([
            'kode' => $request->kode,
            'bahan' => $request->bahan,
            'stok' => 0,
        ]);
        if ($masuk) {
            Alert::success('Data Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('bahan.index');
        } else {
            Alert::error('Data Gagal Ditambahkan', 'Maaf');
            return redirect()->route('bahan.create');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $bahans = bahan_baku::find($id);
        return view('admins.bahan.editbahan', compact('bahans'));
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
        $bahans = bahan_baku::find($id);
        $bahans->update($request->all());
        if ($bahans) {
            Alert::success('Data Berhasil Diubah', 'Selamat');
            return redirect()->route('bahan.index');
        } else {
            Alert::error('Data Gagal Diubah', 'Maaf');
            return redirect()->route('bahan.edit');
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
        $bahans = bahan_baku::find($id);
        $bahans->delete();
        if ($bahans) {
            Alert::success('Data Berhasil Dihapus', 'Selamat');
            return redirect()->route('bahan.index');
        } else {
            Alert::error('Data Gagal Dihapus', 'Maaf');
            return redirect()->route('bahan.index');
        }
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cetak()
    {
        $bahans = bahan_baku::all();
        $pdf = PDF::loadview('cetak_bahan', ['bahan_baku' => $bahans]);
        return $pdf->download('laporan-bahanBaku-pdf');
    }
}
