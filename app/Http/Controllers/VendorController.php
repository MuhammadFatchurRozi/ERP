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
    public function index()
    {
        $vendors = vendor::orderBy('status','asc')->paginate(10);
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
        $kode_vendor = "$request->nama_vendor-$request->nama_produk-00$count_id";
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
        // $now = carbon::now();

        // // $confirm_order = confirm_order::find('id_vendor',$id)->first();
        // $confirm_order = confirm_order::with(['vendors'])->find($id);
        // dd($confirm_order->confirm_order->kode_rfq);
        //     $purchase_order = puchase_order::create([
        //         'id_vendor' => $confirm_order->confirm_order->id_vendor,
        //         'kode_rfq' => $confirm_order->confirm_order->kode_rfq,
        //         'nama_vendor' => $confirm_order->confirm_order->nama_vendor,
        //         'alamat' => $confirm_order->confirm_order->alamat,
        //         'nohp' => $confirm_order->confirm_order->nohp,
        //         'nama_produk' => $confirm_order->confirm_order->nama_produk,
        //         'harga' => $confirm_order->confirm_order->harga,
        //         'quantity' => $confirm_order->confirm_order->quantity,
        //         'total' => $confirm_order->confirm_order->total,
        //         'tgl_pesan' => $confirm_order->confirm_order->tgl_pesan,
        //     ]);

        //     $update_status_rfq = rfq::where('kode_rfq', $confirm_order->kode_rfq)->first();
        //     $update_status_rfq->status = 2;
        //     $update_status_rfq->tgl_confirm_vendor = $now->format('Y-m-d, H:i');
        //     $update_status_rfq->save();

        //     $delete_confirm = confirm_order::find($id)->delete();

        //     if ($purchase_order) {
        //         Alert::success('Data Berhasil Dikonfirmasi', 'Selamat');
        //         return redirect()->route('datavendor.index');
        //     } else {
        //         Alert::error('Data Gagal Dikonfirmasi', 'Maaf');
        //         return redirect()->route('datavendor.index');
        //     }
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

    public function confirm($id)
    {
        //
    }

    //Ajax Di Halaman AbsensiDataKaryawan.blade.php
    public function action(Request $request)
    {
        // $vendors = vendor::where('status','aktif')->get();
        // $vendors = vendor::where('status','nonaktif')->get();
        // if ($vendors == 'nonaktif') {
        //     $search_status = 'Tidak Aktif';
        // } elseif ($vendors == 'aktif') {
        //     $search_status = 'Aktif';
        // }
        // dd($search_status);
        if ($request->ajax()) {
            $output = '';
            $query = $request->get('query');
            if ($query != '') {
                $search = vendor::Where('nama_vendor', 'LIKE', '%' . $query . '%')
                    ->orWhere('nama_produk', 'LIKE', '%' . $query . '%')
                    ->orderBy('id', 'asc')->get();
            } else {
                $search = vendor::latest()->get();
            }
            $total_row = $search->count();




            if ($total_row > 0) {
                $no = 1;


                foreach ($search as $v) {
                    $output .= '
                    <tr>
                        <td>' . $v->id . '</td>
                        <td>' . $v->nama_produk . '</td>
                        <td>' . $v->nama_vendor . '</td>
                        <td>' . $v->no_telp . '</td>
                        <td>' . $v->alamat . '</td>
                        <td>' . $v->harga . '</td>
                        <td>
                            ' . $v->status . '
                        </td>
                        <td>
                            <a href="' . route('datavendor.show', $v->id) . '" class="btn btn-info btn-sm">Order</a>
                        </td>
                        <td>
                            <div class="action">
                                <a href="' . route('datavendor.edit', $v->id) . '" class="btn btn-warning btn-sm">Edit</a> <br>
                                <a href="' . route('datavendor.destroy', $v->id) . '" class="btn btn-danger btn-sm" onclick="return confirm(\'Yakin ingin menghapus data ini?\')">Hapus</a>
                            </div>
                        </td>
                    </tr>
                    ';
                }
            } else {
                $output = '
            <tr>
                <td align="center" colspan="15"><strong> No Data Found </strong></td>
            </tr>
            ';
            }
            $search = array('table_data' => $output);
            echo json_encode($search);
        }
    }
}
