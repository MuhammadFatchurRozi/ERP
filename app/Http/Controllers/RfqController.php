<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rfq;
use App\Models\vendor;
use App\Models\confirm_order;
use DB;
use Carbon\Carbon;
use Alert;

class RfqController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rfqs = rfq::orderBy('id','desc')->paginate(10);
        return view('admins.RFQ.tampilrfq',compact('rfqs'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vendors = vendor::where('status', 'aktif')->get(); //mengambil data vendor yang statusnya aktif
        return view('admins.RFQ.tambahrfq',compact('vendors'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $now = carbon::now();
        $kode_rfq = 'RFQ'.date('YmdHis');

        $rfq = rfq::create([
            'nama_vendor' => $request->nama_vendor,
            'kode_rfq' => $kode_rfq,
            'alamat' => $request->alamat,
            'nohp' => $request->no_telp,
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tgl_pesan' => $now->format('Y-m-d, H:i'),
            'status' => 1,
            'tgl_confirm_vendor' => 'Waiting Confirm',
            'tgl_pembayaran' => 'Nothing To Bill',
        ]);

        $confirm_order = confirm_order::create([
            'id_vendor' => $request->id,
            'kode_rfq' => $kode_rfq,
            'nama_vendor' => $request->nama_vendor,
            'alamat' => $request->alamat,
            'nohp' => $request->no_telp,
            'nama_bahan_baku' => $request->nama_bahan_baku,
            'harga' => $request->harga,
            'quantity' => $request->quantity,
            'total' => $request->total,
            'tgl_pesan' => $now->format('Y-m-d, H:i'),
        ]);

        $confirm_order = vendor::find($request->id);
        $count_order = $confirm_order->count_confirm_order + 1;
        $update_vendor = vendor::where('id', $request->id)->update([
            'count_confirm_order' => $count_order,
        ]);

        if($rfq && $confirm_order){
            Alert::success('Berhasil', 'Data Berhasil Ditambahkan');
            return redirect()->route('rfq.index');
        }else{
            Alert::error('Gagal', 'Data Gagal Ditambahkan');
            return redirect()->route('rfq.index');
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

    public function cetak($id)
    {
        $rfqs = rfq::find($id);
        return view('admins.RFQ.cetakrfq',compact('rfqs'));
    }

    //Ajax for table Nama
    function fetch(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dependent = $request->get('dependent');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dependent)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dependent . '" name="nama_bahan_baku" selected>' . ucfirst($row->$dependent) . '</option>';
        }
        echo $output;
    }

    //Ajax for harga
    function fetch1(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic = $request->get('dynamic');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic . '" name="harga" selected>' . ucfirst($row->$dynamic) . '</option>';
        }
        echo $output;
    }

    //Ajax for nama Vendor
    function fetch2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="nama_vendor" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }

    //Ajax for table alamat Vendor
    function fetch3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic2 = $request->get('dynamic2');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic2)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic2 . '" name="alamat" selected>' . ucfirst($row->$dynamic2) . '</option>';
        }
        echo $output;
    }

    //Ajax for table Nama Vendor
    function fetch4(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic3 = $request->get('dynamic3');
        $data = DB::table('vendors')
            ->where($select, $value)
            ->groupBy($dynamic3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic3 . '" name="no_telp" selected>' . ucfirst($row->$dynamic3) . '</option>';
        }
        echo $output;
    }
}
