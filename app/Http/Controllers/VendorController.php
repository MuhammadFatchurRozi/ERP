<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\vendor;
use App\Models\bahan_baku;
use App\Models\confirm_order;
use App\Models\rfq;
use App\Models\puchase_order;
use Alert;
use Carbon\Carbon;

class VendorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if($request->has('search'))
        {
            $vendors = vendor::where('nama_bahan_baku','like',"%".$request->search."%")
            ->orWhere('kode_vendor','like',"%".$request->search."%")
            ->orWhere('nama_vendor','like',"%".$request->search."%")
            ->orWhere('alamat','like',"%".$request->search."%")
            ->orWhere('no_telp','like',"%".$request->search."%")
            ->orWhere('status', 'regexp',"(^| ){$request->search}.*( |$)")
            ->orWhere('id', 'regexp',"(^| ){$request->search}.*( |$)")
            ->orderBy('status', 'asc')
            ->paginate(10);
        }
        else
        {
            $vendors = vendor::orderBy('status', 'asc')
            ->paginate(10);
        }
        return view('admins.data-vendor.tampilvendor', compact('vendors'));
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
        $count_id = vendor::count();
        $count_id = $count_id + 1;
        $kode_vendor = "$request->nama_vendor-$request->nama_bahan_baku-00$count_id";
        $masuk = vendor::create([
            'kode_vendor' => $kode_vendor,
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'nama_vendor' => $request->nama_vendor,
            'harga' => $request->harga,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'status' => $request->status,
            'count_confirm_order' => 0,
        ]);
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
        $confirm = confirm_order::where('id_vendor', $id)->get();
        // $vendors = vendor::find($id);
        $vendors = vendor::with(['confirm_order'])->find($id);
        // dd($vendors->confirm_order->count());
        return view('admins.data-vendor.Confirm-vendor.tampilconfirmvendor', compact('confirm', 'vendors'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vendors = vendor::find($id);
        return view('admins.data-vendor.editvendor', compact('vendors'));
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
        $vendors = vendor::find($id);
        $vendors->update($request->all());
        if ($vendors) {
            Alert::success('Data Vendor Berhasil diupdate', 'Selamat');
            return redirect()->route('datavendor.index');
        } else {
            Alert::error('Data Vendor Gagal diupdate', 'Maaf');
            return redirect()->route('datavendor.edit');
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
        $vendors = vendor::findOrFail($id);
        $vendors->delete();

        if ($vendors) {
            Alert::success('Data Vendor Berhasil dihapus', 'Selamat');
            return redirect()->route('datavendor.index');
        } else {
            Alert::error('Data Vendor Gagal Dihapus', 'Maaf');
            return redirect()->route('datavendor.index');
        }
    }
}
