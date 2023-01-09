<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\costumer;
use App\Models\quatation;
use App\Models\product;
use App\Models\order;

use Alert;
use Carbon\Carbon;
use Crypt;

class QuotationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quotations = quatation::orderBy('tgl_pemesanan','DESC')->get();
        return view('admins.Quotation.tampilquotation',compact('quotations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $costumers = costumer::all();
        $products = product::where('stok' ,'>' ,'0')->get();
        return view('admins.Quotation.tambahquotation',compact('costumers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Get Data Costumer & Product
        $find_product = product::find($request->id_produk);
        $find_costumer = costumer::find($request->id_costumer);

        // Get Date Now
        $now = Carbon::now();

        //Check Stok Product
        if ($find_product->stok < $request->quantity) {
            Alert::error('Stok Tidak Mencukupi', 'Gagal');
            return redirect()->back();
        }

        // Inisilisasi Kode Quotation
        if ($find_product->nama == 'Lengan Panjang') {
            $kode= 'LPA-'.$request->ukuran.date('YmdHis');
        }
        else {
            $kode= 'LPE-'.$request->ukuran.date('YmdHis');
        }

        // Post Data Quotation
        $quotations = quatation::create([
            'id_product' => $request->id_produk,
            'kode_quotation' => $kode,
            'name' => $find_costumer->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'nama_produk' => $find_product->nama,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tgl_pemesanan' => $now->format('Y-m-d H:i:s'),
            'tgl_pembayaran' => "Not Billed",
            'status' => 0,
        ]);

        // Post Stok Order
        $orders = order::create([
            'id_product' => $request->id_produk,
            'kode_order' => $kode,
            'name' => $find_costumer->name,
            'phone' => $request->phone,
            'address' => $request->address,
            'nama_produk' => $find_product->nama,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tgl_pemesanan' => $now->format('Y-m-d H:i:s'),
            'tgl_pembayaran' => "Not Billed",
            'invoice' => 1,
            'validate' => 1,
            'delivery' => 1,
            'status' => 0,
        ]);

        if($quotations){
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('quotation.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->back();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    //Di fungsi alihkan menjadi button confirm di halaman tampil quotation
    public function show($id)
    {
        $id = Crypt::decrypt($id); // Decrypt ID
        $quotations = quatation::find($id);

        //Changed Status Quoatation
        $quotations->update([
            'status' => 1,
        ]);

        // Post Stok Order
        $orders = order::where('kode_order',$quotations->kode_quotation)->where('tgl_pemesanan', $quotations->tgl_pemesanan)->update([
            'invoice' => 2,
            'validate' => 1,
            'delivery' => 1,
            'status' => 1,
        ]);
        if($quotations && $orders){
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('order.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->back();
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

    //Ajax for table phone
    function costumer1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $costumer1 = $request->get('costumer1');
        $data = costumer::where($select, $value)
            ->groupBy($costumer1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$costumer1 . '" name="phone" selected>' . ucfirst($row->$costumer1) . '</option>';
        }
        echo $output;
    }

    //Ajax for table address
    public function costumer2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $costumer2 = $request->get('costumer2');
        $data = costumer::where($select, $value)
            ->groupBy($costumer2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$costumer2 . '" name="address" selected>' . ucfirst($row->$costumer2) . '</option>';
        }
        echo $output;
    }

    //Ajax for table ukuran
    public function product1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $product1 = $request->get('product1');
        $data = product::where($select, $value)
            ->groupBy($product1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$product1 . '" name="ukuran" selected>' . ucfirst($row->$product1) . '</option>';
        }
        echo $output;
    }

    //Ajax for table harga
    public function product2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $product2 = $request->get('product2');
        $data = product::where($select, $value)
            ->groupBy($product2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$product2 . '" name="harga" selected>' . ucfirst($row->$product2) . '</option>';
        }
        echo $output;
    }

    //Ajax for table harga
    public function product3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $product3 = $request->get('product3');
        $data = product::where($select, $value)
            ->groupBy($product3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$product3 . '" name="harga" selected>' . ucfirst($row->$product3) . '</option>';
        }
        echo $output;
    }
}
