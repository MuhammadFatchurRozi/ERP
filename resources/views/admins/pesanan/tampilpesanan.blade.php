@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="wow fadeInLeft">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="active">Data Pemesanan</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Detail Pesanan</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode Pesanan</th>
                                        <th colspan="3">Data Pemesan</th>
                                        <th colspan="3">Data Produk</th>
                                        <th rowspan="2">Quantity <small>Per Lusin</small></th>
                                        <th rowspan="2">Total Harga</th>
                                        <th colspan="2">Bahan Baku</th>
                                        <th rowspan="2">Tanggal Pemesanan</th>
                                        <th rowspan="2">Estimasi Jadi</th>
                                        <th rowspan="2">Status</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    <tr>
                                        <td>Nama Pemesan</td>
                                        <td>Alamat Pemesan</td>
                                        <td>No HP Pemesan</td>
                                        <td>Nama Produk</td>
                                        <td>Ukuran Produk</td>
                                        <td>harga Produk</td>
                                        <td>Kain</td>
                                        <td>Benang</td>
                                        <td>Proses</td>
                                        <td>Cetak</td>
                                        <td>Edit</td>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($pesanans as $pesanan)
                                        <tr>
                                            <td>{{ $pesanan->id }} </td>
                                            <td>{!! DNS1D::getBarcodeHTML($pesanan->kode_pesanan, 'C39', 0.8, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $pesanan->kode_pesanan }}</p>
                                            </td>
                                            <td>{{ $pesanan->nama_pemesan }} </td>
                                            <td>{{ $pesanan->alamat_pemesan }} </td>
                                            <td>{{ $pesanan->no_pemesan }} </td>
                                            <td>{{ $pesanan->nama }} </td>
                                            <td>{{ $pesanan->ukuran }} </td>
                                            <td>Rp.@idr($pesanan->harga) </td>
                                            <td>{{ $pesanan->jumlah }} </td>
                                            <td>Rp.@idr($pesanan->total) </td>
                                            <td>{{ $pesanan->kain }}<small>Kg</small></td>
                                            <td>{{ $pesanan->benang }}<small>yard</small></td>
                                            <td>{{ $pesanan->tgl_pesan }} </td>
                                            <td>{{ $pesanan->estimasi }}</td>
                                            <td><span class="badge bg-danger">Belum Diproses</span></td>
                                            <td>
                                                <form action="{{ route('pesanan.proses', $pesanan->id) }}" method="POST">
                                                    @csrf
                                                    <button type="submit" class="btn btn-sm btn-info">Proses</button>
                                                </form>
                                            </td>
                                            <td>
                                                <a href="{{ route('pesanan.cetak', $pesanan->id) }}"
                                                    class="btn btn-sm btn-default"><i class="fa fa-print"> Cetak</i></a>
                                            </td>
                                            <td>
                                                <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                                    class="btn btn-sm btn-warning"><i class="fa fa-pencil"> Edit</i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        ` <tr>
                                            <td colspan="18" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $pesanans->withQueryString()->links() !!}
                </div>
                <div class="col-sm-12">
                    <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
