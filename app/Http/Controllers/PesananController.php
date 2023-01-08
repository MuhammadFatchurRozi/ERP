<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\{
    pesanan,
    bahan_baku,
    product,
    mad,
    bom
};

use Alert;
use DB;
use Carbon\Carbon;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pesanans = pesanan::orderBy('tgl_pesan','desc')->paginate(5);
        return view('admins.pesanan.tampilpesanan', compact('pesanans'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admins.pesanan.tambahpesanan');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $masuk = pesanan::create($request->all());
        if ($masuk) {
            Alert::success('Pesanan Berhasil Ditambahkan', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Ditambahkan', 'Maaf');
            return redirect()->route('pesanan.create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //Di Alih Fungsi Menjadi Button Proses
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
        $pesanans = pesanan::find($id);
        return view('admins.pesanan.editpesanan', compact('pesanans'));
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
        $pesanans = pesanan::find($id);
        $pesanans->update($request->all());
        if ($pesanans) {
            Alert::success('Pesanan Berhasil Diubah', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Diubah', 'Maaf');
            return redirect()->route('pesanan.edit');
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
        $pesanans = pesanan::find($id);
        $pesanans->delete();
        if ($pesanans) {
            Alert::success('Pesanan Berhasil Dihapus', 'Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Pesanan Gagal Dihapus', 'Maaf');
            return redirect()->route('pesanan.index');
        }
    }

    //MO (Material Order)
    public function mo($id)
    {
        $pesanans = pesanan::find($id);

        if ($pesanans->nama == 'Lengan Panjang' && $pesanans->ukuran == 'M') {
            $kain = bom::where('id', 1)->first();
            $benang = bom::where('id', 1)->first();
        }
        elseif ($pesanans->nama == 'Lengan Panjang' && $pesanans->ukuran == 'L') {
            $kain = bom::where('id', 2)->first();
            $benang = bom::where('id', 2)->first();
        }
        elseif ($pesanans->nama == 'Lengan Panjang' && $pesanans->ukuran == 'XL') {
            $kain = bom::where('id', 3)->first();
            $benang = bom::where('id', 3)->first();
        }
        elseif ($pesanans->nama == 'Lengan Pendek' && $pesanans->ukuran == 'M') {
            $kain = bom::where('id', 4)->first();
            $benang = bom::where('id', 4)->first();
        }
        elseif ($pesanans->nama == 'Lengan Pendek' && $pesanans->ukuran == 'L') {
            $kain = bom::where('id', 5)->first();
            $benang = bom::where('id', 5)->first();
        }
        elseif ($pesanans->nama == 'Lengan Pendek' && $pesanans->ukuran == 'XL') {
            $kain = bom::where('id', 6)->first();
            $benang = bom::where('id', 6)->first();
        }

        // Bahan Baku dari BoM * Jumlah Pesanan (MO)
            $get_kain = $kain->kain * $pesanans->jumlah * 12;
            $get_benang = $benang->benang * $pesanans->jumlah * 12;

        //Update Pesanan
            $pesanans->update([
                'kain' => $get_kain,
                'benang' => $get_benang,
                'status' => 1,
                'mo' => 2,
                'ca' => 1,
            ]);

        if ($pesanans) {
            Alert::success('Material Order Berhasil Diproses', 'Kain ' .$get_kain. ' KG Dan Benang ' .$get_benang. ' Yard Selamat');
            return redirect()->route('pesanan.index');
        } else {
            Alert::error('Material Order Diproses', 'Maaf');
            return redirect()->route('pesanan.index');
        }
    }

    //Check Avability
    public function check_avability($id)
    {
        $pesanans = pesanan::find($id);

        // Inisiliasi Variabel Untuk Menampung Data Kain Dan Benang Dari Tabel Bahan Baku, Digunakan Untuk Menghitung Persediaan
        $kain_bahan = bahan_baku::find(1);
        $kain_bahan = $kain_bahan->stok;
        $benang_bahan = bahan_baku::find(2);
        $benang_bahan = $benang_bahan->stok;

        //Check Apakah Stok Bahan Baku Mencukupi
            if ($pesanans->kain && $pesanans->benang == 0 or null){
                Alert::error('Silahkan Proses Material Order Terlebih Dahulu', 'Maaf');
                return redirect()->route('pesanan.index');
            }

            elseif ($pesanans->kain > $kain_bahan && $pesanans->benang > $benang_bahan) {
                Alert::error('Stok Kain Dan Benang Tidak Mencukupi' , 'Membutuhkan Kain Sebanyak ' .$pesanans->kain. ' Dan Benang Sebanyak ' .$pesanans->benang. ' KG Maaf');
                return redirect()->route('bahan.index');
            }

            elseif ($pesanans->benang > $benang_bahan) {
                Alert::error('Stok Benang Tidak Mencukupi', 'Membutuhkan Benang Sebanyak ' .$pesanans->benang. ' Yard Maaf');
                return redirect()->route('bahan.index');
            }

            elseif($pesanans->kain > $kain_bahan){
                Alert::error('Stok Kain Tidak Mencukupi', 'Membutuhkan Kain Sebanyak ' .$pesanans->kain. ' KG Maaf');
                return redirect()->route('bahan.index');
            }

        else {
            //Update Stok Bahan Baku
            $new_kain = bahan_baku::find(1);
            $new_kain->update([
                'stok' => $kain_bahan - $pesanans->kain,
            ]);
            $new_benang = bahan_baku::find(2);
            $new_benang->update([
                'stok' => $benang_bahan - $pesanans->benang,
            ]);

            //Update Pesanan
            $pesanans->update([
                'ca' => 2,
                'produce' => 1,
                'status' => 2,
            ]);

            Alert::success('Stok Bahan Baku Mencukupi', 'Selamat');
            return redirect()->route('pesanan.index');
        }
    }

    //Proses Produksi
    public function produce($id)
    {
        $pesanans = pesanan::find($id);
        $now = Carbon::now();

        //check_estimated
        if($pesanans->estimasi >= $now){
            $pesanans->update([
                'status' => 4,
                'produce' => 0,
                'mo' => 0,
                'ca' => 0,
                'mad' => 0,
            ]);
            Alert::error('Estimasi Produksi Sudah Lewat', 'Maaf');
            return redirect()->route('pesanan.index');
        }
        else{
            $pesanans->update([
                'status' => 3,
                'mad' => 1,
                'produce' => 2,
            ]);
            Alert::success('Proses Produksi Berhasil', 'Selamat');
            return redirect()->route('pesanan.index');
        }
    }

    public function mad($id)
    {
        $pesanans = pesanan::find($id); //Mengambil Data Pesanan Berdasarkan ID
        $mad = mad::all(); //Mengambil Semua Data Dari Tabel Mad
        $produk = product::find($pesanans->id_produk); //Mengambil Data Produk Berdasarkan id_produk Pesanan

        // Proses Post ke Table MaD
        $mad = mad::create([
            'kode_pesanan' => $pesanans->kode_pesanan,
            'nama' => $pesanans->nama,
            'ukuran' => $pesanans->ukuran,
            'harga' => $pesanans->harga,
            'jumlah' => $pesanans->jumlah,
            'total' => $pesanans->total,
            'tgl_pesan' => $pesanans->tgl_pesan,
            'kain' => $pesanans->kain,
            'benang' => $pesanans->benang,
            'status' => 4,
            'nama_pemesan' => $pesanans->nama_pemesan,
            'alamat_pemesan' => $pesanans->alamat_pemesan,
            'no_pemesan' => $pesanans->no_pemesan,
            'estimasi' => $pesanans->estimasi,
        ]);

        // Proses Update Status Pesanan Dari 0 (Belum Diproses) Menjadi 1 (Sudah Diproses)
        $mad->status = 1;
        $mad->save();
        $produk->penjualan = $produk->penjualan + $pesanans->jumlah;
        $produk->save();

        $pesanans->delete(); // Menghapus Pesanan Yang Sudah Diproses

        if($mad && $produk && $pesanans ){
            Alert::success('Pesanan Berhasil Diproses', 'Selamat');
            return redirect()->route('mad.index');
        } else {
            Alert::error('Pesanan Gagal Diproses', 'Maaf');
            return redirect()->route('pesanan.index');
        }
    }

    public function cetak($id)
    {
        $pesanans = pesanan::find($id);
        return view('admins.pesanan.cetakpesanan', compact('pesanans'));
    }
}
