@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
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
                                    <th rowspan="2">Status</th>
                                    <th colspan="2">Action</th>
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
                                    <td>Edit</td>
                                    <td>Proses</td>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align:middle;">
                                @forelse ($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $pesanan->id }} </td>
                                        {{-- Format kode MRK-LPA-{{ukuran}}-0{{id}} --}}
                                        @if ($pesanan->nama == 'Lengan Panjang')
                                            <td>{!! DNS2D::getBarcodeHTML("MRK-LPA-$pesanan->ukuran-0$pesanan->id", 'QRCODE', 3, 3) !!}</td>
                                        @elseif ($pesanan->nama == 'Lengan Pendek')
                                            <td>{!! DNS2D::getBarcodeHTML("MRK-LPD-$pesanan->ukuran-0$pesanan->id", 'QRCODE', 3, 3) !!}</td>
                                        @endif
                                        <td>{{ $pesanan->nama_pemesan }} </td>
                                        <td>{{ $pesanan->alamat_pemesan }} </td>
                                        <td>{{ $pesanan->no_pemesan }} </td>
                                        <td>{{ $pesanan->nama }} </td>
                                        <td>{{ $pesanan->ukuran }} </td>
                                        <td>{{ $pesanan->harga }} </td>
                                        <td>{{ $pesanan->jumlah }} </td>
                                        <td>{{ $pesanan->total }} </td>
                                        <td>{{ $pesanan->kain }} </td>
                                        <td>{{ $pesanan->benang }} </td>
                                        @if ($pesanan->status == 0)
                                            <td><span class="badge bg-danger">Belum Diproses</span></td>
                                        @elseif ($pesanan->status == 1)
                                            <td><span class="badge bg-succes">Sudah Diproses</span></td>
                                        @endif
                                        <td>
                                            <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                                class="action btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                        </td>
                                        <td>
                                            <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                                class="action btn btn-sm btn-primary">Proses</i></a>

                                        </td>
                                    </tr>
                                @empty
                                    ` <tr>
                                        <td colspan="6" class="text-center">Tidak ada data</td>
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
@endsection
