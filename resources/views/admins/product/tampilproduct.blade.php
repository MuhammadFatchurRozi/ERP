@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="wow fadeInLeft">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">
                            <em class="">
                                <img src="{{ asset('style/gambar/home.gif') }}" width="20px" height="auto" alt=""
                                    srcset="">
                            </em>
                        </a></li>
                    <li class="active">Data Product</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Detail Product</h2>
                </div>
                {{-- <div class="col-lg-12">
                    <img src="{{ asset('style/gambar/product.png') }}" width="25%" height="auto" alt="">
                </div> --}}
            </div>
        </div>
        <!--/.main-->
    </div>

    <div class="wow fadeIn">
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
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode Produk</th>
                                        <th rowspan="2">Nama Produk</th>
                                        <th rowspan="2">Ukuran</th>
                                        <th rowspan="2">Harga</th>
                                        <th rowspan="2">Stok</th>
                                        <th rowspan="2">Penjualan</th>
                                        <th colspan="3">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Make Stock</th>
                                        <th>Edit</th>
                                        <th>Delete</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($product as $products)
                                        <tr>
                                            <td>{{ $products->id }} </td>
                                            <td>{{ $products->kode }}</td>
                                            <td>Kaos Polos {{ $products->nama }} </td>
                                            <td>{{ $products->ukuran }} </td>
                                            <td>Rp. @idr($products->harga) </td>
                                            <td>
                                                @if ($products->stok == 0)
                                                    <span class="badge bg-danger">Stok Kosong</span>
                                                @else
                                                    <span class="badge bg-success">{{ $products->stok }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($products->penjualan == 0)
                                                    <span class="badge bg-danger">Belum Terjual</span>
                                                @else
                                                    <span class="badge bg-success">{{ $products->penjualan }}</span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('product.stok', $products->id) }}"
                                                    class="action btn btn-sm btn-success">
                                                    <i class="fa fa-plus-circle ">
                                                        Make Stock</i>
                                                </a>
                                            </td>
                                            <td>
                                                <a href="{{ route('product.edit', $products->id) }}"
                                                    class="action btn btn-sm btn-warning"><i class="fa fa-pencil">
                                                        Edit</i></a>
                                            </td>
                                            <td>
                                                <div class="action">
                                                    <form onsubmit="return confirm('Yakin ingin menghapus data ini?');"
                                                        action="{{ route('product.destroy', $products->id) }}"
                                                        method="POST" class="d-inline">
                                                        @csrf
                                                        @method('delete')
                                                        <button type="submit" class="action btn btn-sm btn-danger"
                                                            onclick=>
                                                            <i class="fa fa-trash"> Delete</i>
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
    </div>
@endsection
