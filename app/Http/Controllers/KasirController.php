<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\product;
use App\Models\pesanan;
use App\Models\bom;
use App\Models\bahan_baku;

use DB;
use Alert;
use Carbon\Carbon;

class KasirController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = product::all();
        return view('admins.kasir.tampilkasir',compact('products'));
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
        // MO (Material Order)
            if ($request->nama == 'Lengan Panjang' && $request->ukuran == 'M') {
                $kain = bom::where('id', 1)->first();
                $benang = bom::where('id', 1)->first();
            }
            elseif ($request->nama == 'Lengan Panjang' && $request->ukuran == 'L') {
                $kain = bom::where('id', 2)->first();
                $benang = bom::where('id', 2)->first();
            }
            elseif ($request->nama == 'Lengan Panjang' && $request->ukuran == 'XL') {
                $kain = bom::where('id', 3)->first();
                $benang = bom::where('id', 3)->first();
            }
            elseif ($request->nama == 'Lengan Pendek' && $request->ukuran == 'M') {
                $kain = bom::where('id', 4)->first();
                $benang = bom::where('id', 4)->first();
            }
            elseif ($request->nama == 'Lengan Pendek' && $request->ukuran == 'L') {
                $kain = bom::where('id', 5)->first();
                $benang = bom::where('id', 5)->first();
            }
            elseif ($request->nama == 'Lengan Pendek' && $request->ukuran == 'XL') {
                $kain = bom::where('id', 6)->first();
                $benang = bom::where('id', 6)->first();
            }

            // Bahan Baku dari BoM * Jumlah Pesanan (MO)
                $get_kain = $kain->kain * $request->jumlah * 12;
                $get_benang = $benang->benang * $request->jumlah * 12;
        //End MO (Material Order)

        // Inisilisasi Kode Produk
            if ($request->nama == 'Lengan Panjang') {
                $kode_pesan = "ERP-LPA-$request->ukuran-$request->kode";
            }
            else {
                $kode_pesan = "ERP-LPE-$request->ukuran-$request->kode";
            }
        
        // Pick DateTime
            $tanggal = date('Y-m-d, H:i');
        
        $boms = bom::find($request->id); // Find Bom by ID from Request (ID kasir)

        $current = Carbon::now(); // ambil tanggal,waktu sekarang
        $sunday = $current->isSunday(); // cek apakah hari ini minggu
        $saturday = $current->isSaturday(); // cek apakah hari ini sabtu

        //Perhitungan Estimasi
        $estimasi =  $boms->estimasi * $request->jumlah * 12; //Estimasi per lusin // 12 pcs/lusin
        $sum_estimasi = pesanan::sum('total_estimasi'); // menghitung semua estimasi pada tabel pesanan

        // cek apakah pesanan lebih dari satu Jika lebih dari satu maka estimasi ditambahkan dengan estimasi yang telah ada sebelumnya
            if(pesanan::count() >= 1){
                $sum_estimasi = pesanan::sum('total_estimasi') + $estimasi;
            }
            else{
                $sum_estimasi = $estimasi;
            }

        // cek apakah hari ini minggu jika hari ini minggu maka estimasi ditambahkan 1 hari dan jika hari ini sabtu maka estimasi ditambahkan 2 hari
            if($current == $sunday){
                $add_day_estimasi = $current->addMinutes($sum_estimasi)->addDays(1);
            }
            elseif($current == $saturday){
                $add_day_estimasi = $current->addMinutes($sum_estimasi)->addDays(2);
            }
            else{
                $add_day_estimasi = $current->addMinutes($sum_estimasi);
            }
        
        // hasil estimasi
            $hasil_estimasi = $add_day_estimasi;

        // Insert to Database Pesanan
        $pesanan = pesanan::create([
            'kode_pesanan' => $kode_pesan,
            'nama' => $request->nama,
            'ukuran' => $request->ukuran,
            'harga' => $request->harga,
            'jumlah' => $request->jumlah,
            'total' => $request->total,
            'tgl_pesan' => $tanggal,
            'kain' => $get_kain,
            'benang' => $get_benang,
            'status' => 0,
            'nama_pemesan' => $request->nama_pemesan,
            'alamat_pemesan' => $request->alamat_pemesan,
            'no_pemesan' => $request->no_pemesan,
            'id_produk' => $request->id,
            'estimasi' => $hasil_estimasi->format('Y-m-d, H:i'),
            'total_estimasi' => $sum_estimasi, //untuk menampung jumlah waktu estimasi per pesanan
        ]);

        if ($pesanan) {
            Alert::success('Data Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Data Gagal Ditambahkan', 'Maaf');
            return redirect()->route('kasir.create');
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

    //Ajax for table Nama
    function fetch2(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic1 = $request->get('dynamic1');
        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dynamic1)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic1 . '" name="harga" selected>' . ucfirst($row->$dynamic1) . '</option>';
        }
        echo $output;
    }

    //Ajax for table Nama
    function fetch3(Request $request)
    {
        $select = $request->get('select');
        $value = $request->get('value');
        $dynamic3 = $request->get('dynamic3');
        $data = DB::table('products')
            ->where($select, $value)
            ->groupBy($dynamic3)
            ->get();
        foreach ($data as $row) {
            $output = '<option value="' . $row->$dynamic3 . '" name="kode" selected>' . ucfirst($row->$dynamic3) . '</option>';
        }
        echo $output;
    }
}
