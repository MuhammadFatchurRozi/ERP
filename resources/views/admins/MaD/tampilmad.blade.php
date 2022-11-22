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
                    <li class="active">Data Mark as Done</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Mark as Done</h2>
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
                                        <th rowspan="3">Cetak</th>
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
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($mads as $mad)
                                        <tr>
                                            <td>{{ $mad->id }} </td>
                                            <td>{!! DNS1D::getBarcodeHTML($mad->kode_pesanan, 'C39', 0.8, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $mad->kode_pesanan }}</p>
                                            </td>
                                            <td>{{ $mad->nama_pemesan }} </td>
                                            <td>{{ $mad->alamat_pemesan }} </td>
                                            <td>{{ $mad->no_pemesan }} </td>
                                            <td>{{ $mad->nama }} </td>
                                            <td>{{ $mad->ukuran }} </td>
                                            <td>@idr($mad->harga) </td>
                                            <td>{{ $mad->jumlah }} </td>
                                            <td>@idr($mad->total) </td>
                                            <td>{{ $mad->kain }} </td>
                                            <td>{{ $mad->benang }} </td>
                                            <td>{{ $mad->tgl_pesan }} </td>
                                            <td>{{ $mad->estimasi }} </td>
                                            <td><span class="badge bg-success">Sudah Diproses</span></td>
                                            <td>
                                                <a href="{{ route('mad.cetak', $mad->id) }}"
                                                    class="btn btn-sm btn-default"><i class="fa fa-print"> Cetak</i></a>
                                            </td>
                                        </tr>
                                    @empty
                                        ` <tr>
                                            <td colspan="16" class="text-center">Tidak ada data</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {!! $mads->withQueryString()->links() !!}
                </div>
                <div class="col-sm-12">
                    <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
                </div>
            </div>
        </div>
    </div>
@endsection
