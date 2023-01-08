<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
use App\Models\bom;
use App\Models\bahan_baku;
use Alert;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $product = product::latest()->paginate(8);
        return view('admins.product.tampilproduct', compact('product'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.product.tambahproduct');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $product = product::create([
            'kode' => $request->kode,
            'nama' => $request->nama,
            'harga' => $request->harga,
            'ukuran' => $request->ukuran
        ]);
        if ($product) {
            Alert::success('Produk Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('product.index');
        } else {
            Alert::error('Produk Gagal Ditambahkan', 'Maaf');
            return redirect()->route('product.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // Alih Fungsi Menjadi Tombol Add Stock
    public function stok($id)
    {
        $products = product::find($id);
        return view('admins.product.stokproduct', compact('products'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        return view('admins.product.editproduct', compact('product'));
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
            'kode'      => 'required',
            'nama'      => 'required',
            'ukuran'    => 'required',
            'harga'     => 'required'
        ]);

        $product = product::findOrFail($id);
        $product->update([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'ukuran'    => $request->ukuran,
            'harga'     => $request->harga,
        ]);
        if ($product) {
            Alert::success('Produk Berhasil diupdate', 'Selamat');
            return redirect()->route('product.index');
        } else {
            Alert::error('Produk Gagal diupdate', 'Maaf');
            return redirect()->route('product.edit');
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
        $product = product::findOrFail($id);
        $product->delete();

        if ($product) {
            Alert::success('Produk Berhasil dihapus', 'Selamat');
            return redirect()->route('product.index');
        } else {
            Alert::error('Produk Gagal Dihapus', 'Maaf');
            return redirect()->route('product.index');
        }
    }

    public function add_stok(Request $request, $id)
    {
        //get data product
        $product = product::findOrFail($id);

        //check request stok
        if ($request->stok == 0) {
            Alert::error('Stok Tidak Boleh Kosong Atau 0', 'Maaf');
            return redirect()->back();
        }

        //get data bom
        $boms = bom::where('nama', $product->nama)->where('ukuran', $product->ukuran)->first();

        //get data kain & benang
        $get_kain = $boms->kain;
        $get_benang = $boms->benang;

        // Perhitungan kebutuhan bahan baku
        $kain = $get_kain * $request->stok;
        $benang = $get_benang * $request->stok;

        // check stok bahan baku
        $bahan_bakus_kain = bahan_baku::where('bahan', 'kain')->first();
        $bahan_bakus_benang = bahan_baku::where('bahan', 'benang')->first();
        if ($kain > $bahan_bakus_kain->stok && $benang > $bahan_bakus_benang->stok) {
            Alert::error('Stok Kain & Benang Tidak Mencukupi', 'Membutuhkan Kain ' . $kain . ' Kg & Benang ' . $benang . ' Kg');
            return redirect()->route('bahan.index');
        }
        if ($kain > $bahan_bakus_kain->stok) {
            Alert::error('Stok Kain Tidak Mencukupi', 'Membutuhkan Kain ' . $kain . ' Kg');
            return redirect()->route('bahan.index');
        } elseif ($benang > $bahan_bakus_benang->stok) {
            Alert::error('Stok Benang Tidak Mencukupi', 'Membutuhkan Benang ' . $kain . ' Kg');
            return redirect()->route('bahan.index');
        }
        // hitung stok bahan baku
        $hitung_kain = $bahan_bakus_kain->stok - $kain;
        $hitung_benang = $bahan_bakus_benang->stok - $benang;

        // update stok bahan baku
        $bahan_bakus_kain->update([
            'stok' => $hitung_kain
        ]);
        $bahan_bakus_benang->update([
            'stok' => $hitung_benang
        ]);

        //Update stok produk
        $product->update([
            'stok' => $product->stok + $request->stok
        ]);

        if ($product && $bahan_bakus_kain && $bahan_bakus_benang) {
            Alert::success('Stok Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('product.index');
        } else {
            Alert::error('Stok Gagal Ditambahkan', 'Maaf');
            return redirect()->route('product.index');
        }
    }
}
