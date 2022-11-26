<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\product;
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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
        $product = product::findOrFail($id);
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
            'harga'     => 'required',
            'penjualan' => 'required'
        ]);

        $product = product::findOrFail($id);
        $product->update([
            'kode'      => $request->kode,
            'nama'      => $request->nama,
            'ukuran'    => $request->ukuran,
            'harga'     => $request->harga,
            'penjualan' => $request->penjualan,
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
}
