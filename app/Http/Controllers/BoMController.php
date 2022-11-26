<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\bom;
use App\Models\product;
use DB;
use Alert;
use Carbon\Carbon;

class BoMController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $boms = bom::latest()->paginate(8);
        return view('admins.bom.tampilbom', compact('boms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        return view('admins.bom.tambahbom', compact('products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = bom::create($request->all());
        if ($masuk) {
            Alert::success('Pesanan Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('bom.index');
        } else {
            Alert::error('Pesanan Gagal Ditambahkan', 'Maaf');
            return redirect()->route('bom.create');
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
        $boms = bom::findOrFail($id);
        return view('admins.bom.editbom', compact('boms'));
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
            'harga'     => 'required',
            'kain'      => 'required',
            'benang'    => 'required',
            'estimasi'  => 'required'
        ]);

        $boms = bom::findOrFail($id);
        $boms->update([
            'harga'      => $request->harga,
            'kain'       => $request->kain,
            'benang'     => $request->benang,
            'estimasi'   => $request->estimasi
        ]);
        if ($boms) {
            Alert::success('Data BOM Berhasil diupdate', 'Selamat');
            return redirect()->route('bom.index');
        } else {
            Alert::error('Data BOM Gagal diupdate', 'Maaf');
            return redirect()->route('bom.edit');
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
        $boms = bom::findOrFail($id);
        $boms->delete();

        if ($boms) {
            Alert::success('Data BOM Berhasil dihapus', 'Selamat');
            return redirect()->route('bom.index');
        } else {
            Alert::error('Data BOM Gagal Dihapus', 'Maaf');
            return redirect()->route('bom.index');
        }
    }

    //Cetak
    public function cetak($id)
    {
        $boms = bom::find($id);
        return view('admins.bom.cetakbom', compact('boms'));
    }

    //Ajax for table Nama
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="nama" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }

    //Ajax for table ukuran
    function fetch1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic = $request->get('dynamic');
        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dynamic)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic . '" name="ukuran" selected>' . ucfirst($row->$dynamic) . '</option>';
        }
        echo $output;
    }
}
