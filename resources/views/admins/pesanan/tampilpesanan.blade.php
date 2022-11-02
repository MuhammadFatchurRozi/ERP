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
                    <div class="panel-heading">
                        <form class="form-inline">
                            <div class="form-group">
                                <select class="form-control" type="text" placeholder="Pencarian. . ." name="#"
                                    value="">
                                    <option>Pilih Kode Produk</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-danger" href="{{ route('pesanan.create') }}"><i
                                        class="fa fa-plus"></i> Tambah</a>
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-info" href="#"><i class="fa fa-print"></i> Cetak</a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="text-center" style="vertical-align:middle;">
                                <tr>
                                    <th>No</th>
                                    <th>Kode Produk</th>
                                    <th>Produk</th>
                                    <th>Jumlah Kaos (Lusin)</th>
                                    <th>Ukuran</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align:middle;">
                                @forelse ($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $pesanan->id }} </td>
                                        <td>{{ $pesanan->kode_produk }}</td>
                                        <td>{{ $pesanan->produk }} </td>
                                        <td>{{ $pesanan->jml_kaos }} </td>
                                        <td>{{ $pesanan->ukuran }} </td>
                                        <td>
                                            <div class="action">
                                                <a href="{{ route('pesanan.edit', $pesanan->id) }}"
                                                    class="action btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('pesanan.destroy', $pesanan->id) }}" method="POST"
                                                    class="d-inline">
                                                    @csrf
                                                    @method('delete')
                                                    <button type="submit" class="action btn btn-sm btn-danger"
                                                        onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                        <i class="fa fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
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
