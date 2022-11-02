@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Data Product</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Detail Product</h2>
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
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-danger" href="{{ route('product.create') }}"><i
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
                                    <th>Nama Produk</th>
                                    <th>Ukuran</th>
                                    <th>Harga</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align:middle;">
                                @forelse ($product as $products)
                                    <tr>
                                        <td>{{ $products->id }} </td>
                                        <td>{{ $products->kode }}</td>
                                        <td>{{ $products->nama }} </td>
                                        <td>{{ $products->ukuran }} </td>
                                        <td>{{ $products->harga }} </td>
                                        <td>
                                            <div class="action">
                                                <a href="{{ route('product.edit', $products->id) }}"
                                                    class="action btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                                <form action="{{ route('product.destroy', $products->id) }}" method="POST"
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
                {!! $product->withQueryString()->links() !!}
            </div>
            <div class="col-sm-12">
                <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
            </div>
        </div>
    </div>
@endsection
