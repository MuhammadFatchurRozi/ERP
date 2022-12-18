<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\order;
use App\Models\quatation;
use App\Models\product;

use Carbon\carbon;
use Alert;
use Crypt;

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
        $id = Crypt::decrypt($id);
        $orders = order::find($id);

        $match_products = product::where('nama', $orders->nama_produk)->where('ukuran', $orders->ukuran)->first(); 

        $match_kode = quatation::where('kode_quotation', $orders->kode_order)->first();
        $update_qoutations = $match_kode->update(['status' => 2]);

        $update_orders = $orders->update(['status' => 2]);

        if ($update_orders && $update_qoutations == true) {
            return view('admins.order.invoice_order', compact('orders','match_products'));
        } else {
            Alert::error('Error', 'Gagal');
            return redirect()->back();
        }
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

    public function posted($id)
    {
        $id = Crypt::decrypt($id); //decrypt id

        //get date now
        $now = carbon::now();
        
        // find order
        $orders = order::find($id);

        //inisilisasi jam expired
        $expired = $now->addHours(24);

        //fetch kode quotations
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //update table quotation
        $quotations->status = 1;
        $quotations->last_paid= $expired;
        $quotations->tgl_pembayaran= "Validasi Sebelum";
        $quotations->save();

        //update table order
        $orders->status = 2;
        $orders->invoice= 3;
        $orders->validate = 2;
        $orders->last_paid = $expired;
        $orders->tgl_pembayaran= "Validasi Sebelum";
        $orders->save();

        if ($orders && $quotations)
        {
            Alert::success('Success', 'Create Invoice Success');
            Return redirect()->route('order.index');
        }
        else{
            Alert::error('Error', 'Create Invoice Failed');
            Return redirect()->route('order.index');
        }
    }

    public function validates($id)
    {
        $id = Crypt::decrypt($id); //decrypt id
        
        //find data order
        $orders = order::find($id);

        //fetch kode
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //get date now
        $now = carbon::now();
        
        //check tanggal sekarang dengan tanggal expired
        if($now > $orders->last_paid)
        {
            $orders->validate = 1;
            $orders->invoice = 1;
            $orders->status = 5;
            $orders->tgl_pembayaran = "Order Expired";
            $orders->save();

            $quotations->status = 5;
            $quotations->tgl_pembayaran = "Order Expired";
            $quotations->save();

            Alert::error('Error', 'Order Expired');
            return redirect()->route('order.index');
        }
        else
        {
            $orders->validate = 3;
            $orders->status = 3;
            $orders->delivery = 2;
            $orders->tgl_pembayaran = $now;
            $orders->save();

            $quotations->status = 3;
            $quotations->tgl_pembayaran = $now;
            $quotations->save();

            Alert::success('Success', 'Order Valid');
            return redirect()->route('order.index');
        }
    }

    public function delivery($id)
    {
        $id = Crypt::decrypt($id); //decrypt id

        //find data order
        $orders = order::find($id);
        //fetch kode
        $quotations = quatation::where('kode_quotation', $orders->kode_order)->first();

        //fetch data product and order
        $products = product::where('nama', $orders->nama_produk)->where('ukuran', $orders->ukuran)->first(); 
        //get date now
        $now = carbon::now();
        
        //check tanggal sekarang dengan tanggal expired
        if($now > $orders->last_paid)
        {
            $orders->validate = 1;
            $orders->invoice = 1;
            $orders->delivery = 1;
            $orders->status = 5;
            $orders->tgl_pembayaran = "Order Expired";
            $orders->save();

            $quotations->status = 5;
            $quotations->tgl_pembayaran = "Order Expired";
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
