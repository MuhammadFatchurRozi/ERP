<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;
use App\Models\quatation;
use App\Models\product;

use Carbon\carbon;
use Alert;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $orders = order::orderBy('tgl_pemesanan', 'desc')->get();
        return view('admins.order.tampilorder',compact('orders'));
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
        return ('Belum Bisa Ehe');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Alih Fungsi Menjadi Button Register Payment
    public function edit($id)
    {
        $orders = order::find($id);
        return view('admins.order.register_payment_order', compact('orders'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    // Alih fungsi menjadi button Register Payment untuk post data
    public function update(Request $request, $id)
    {
        //get date now
        $now = carbon::now();
        
        // find order
        $order = order::find($id);

        //inisilisasi tanggal expired
        $expired = $now->addDays($request->lastpaid);

        //fetch kode
        $quotations = quatation::where('kode_quotation', $order->kode_order)->first();

        //update table quotation
        $quotations->status = 1;
        $quotations->last_paid= $expired;
        $quotations->save();

        //update table order
        $order->status = 1;
        $order->register_payment = 2;
        $order->validate = 2;
        $order->last_paid = $expired;
        $order->save();

        if ($order && $quotations)
        {
            Alert::success('Success', 'Register Berhasil Segera Validasi');
            Return redirect()->route('order.index');
        }
        else{
            Alert::error('Error', 'Register Gagal');
            Return redirect()->route('order.index');
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
        //
    }

    public function validates($id)
    {
        //find data order
        $orders = order::find($id);

        //fetch kode
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //check tanggal sekarang dengan tanggal expired
        $now = carbon::now();
        $lastpaid = $orders->last_paid;

        if($now > $lastpaid)
        {
            $orders->validate = 1;
            $orders->status = 5;
            $orders->save();

            $quotations->status = 5;
            $quotations->save();
            Alert::error('Error', 'Order Expired');
            return redirect()->route('order.index');
        }
        else
        {
            $orders->validate = 3;
            $orders->status = 2;
            $orders->paid = 2;
            $orders->save();

            $quotations->status = 2;
            $quotations->save();
            Alert::success('Success', 'Order Valid');
            return redirect()->route('order.index');
        }
    }

    public function paid($id)
    {
        //find data order
        $orders = order::find($id);
        //fetch kode
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //get date now
        $now = carbon::now();

        //check tanggal sekarang dengan tanggal expired
        $lastpaid = $orders->last_paid;

        if($now > $lastpaid)
        {
            $orders->paid = 1;
            $orders->status = 5;
            $orders->save();

            $quotations->status = 5;
            $quotations->save();
            Alert::error('Error', 'Order Expired');
            return redirect()->route('order.index');
        }
        else
        {
            $orders->paid = 3;
            $orders->status = 3;
            $orders->delivery = 2;
            $orders->tgl_pembayaran = $now;
            $orders->save();
            
            $quotations->status = 3;
            $quotations->tgl_pembayaran = $now;
            $quotations->save();
            Alert::success('Success', 'Order Paid');
            return redirect()->route('order.index');
        }
    }
    public function delivery($id)
    {
        //find data order
        $orders = order::find($id);
        //fetch kode
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //fetch data product and order
        $products = product::where('nama', $orders->nama_produk)->where('ukuran', $orders->ukuran)->first(); 
        //get date now
        $now = carbon::now();

        //check tanggal sekarang dengan tanggal expired
        $lastpaid = $orders->last_paid;

        if($now > $lastpaid)
        {
            $orders->delivery = 1;
            $orders->status = 5;
            $orders->save();

            $quotations->status = 5;
            $quotations->save();
            Alert::error('Error', 'Order Expired');
            return redirect()->route('order.index');
        }
        else
        {
            $orders->status = 4;
            $orders->delivery = 3;
            $orders->save();
            
            $quotations->status = 4;
            $quotations->save();

            $products->stok = $products->stok - $orders->quantity;
            $products->penjualan = $products->penjualan + $orders->quantity;
            $products->save();

            Alert::success('Success', 'Order Delivery');
            return redirect()->route('quotation.index');
        }
    }
}
