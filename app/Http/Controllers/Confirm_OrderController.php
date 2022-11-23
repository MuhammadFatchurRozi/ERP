<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\confirm_order;
use App\Models\puchase_order;
use App\Models\rfq;
use Carbon\Carbon;
use Alert;

class Confirm_OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $confirm = confirm_order::all();
        return view('admins.Confirm-vendor.tampilconfirmvendor', compact('confirm'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

    //ALih Fungsi Menjadi Konfirmasi Vendor
    public function edit($id)
    {
        $now = carbon::now();

        $confirm_order = confirm_order::find($id);
        $purchase_order = puchase_order::create([
            'receive' => 0,
            'validate' => 1,
            'paid' => 1,
            'tgl_bayar' => 'Waiting To Bill',
            'kode_rfq' => $confirm_order->kode_rfq,
            'nama_vendor' => $confirm_order->nama_vendor,
            'alamat' => $confirm_order->alamat,
            'nohp' => $confirm_order->nohp,
            'nama_produk' => $confirm_order->nama_produk,
            'harga' => $confirm_order->harga,
            'quantity' => $confirm_order->quantity,
            'total' => $confirm_order->total,
            'tgl_pesan' => $confirm_order->tgl_pesan,
        ]);

        $update_status_rfq = rfq::where('kode_rfq', $confirm_order->kode_rfq)->first();
        $update_status_rfq->status = 2;
        $update_status_rfq->tgl_confirm_vendor = $now->format('Y-m-d, H:i');
        $update_status_rfq->save();

        $delete_confirm = confirm_order::find($id)->delete();

        if ($purchase_order) {
            Alert::success('Data Berhasil Dikonfirmasi', 'Selamat');
            return redirect()->route('rfq.index');
        } else {
            Alert::error('Data Gagal Dikonfirmasi', 'Maaf');
            return redirect()->route('confirm.index');
        }
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
}
