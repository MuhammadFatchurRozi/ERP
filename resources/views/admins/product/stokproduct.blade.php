@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="">
                            <img src="{{ asset('style/gambar/home.gif') }}" width="20px" height="auto" alt=""
                                srcset="">
                        </em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Detail Produk</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Stok Produk</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Stok Produk</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <form method="POST" action="{{ route('product.add_stok', $products->id) }}">
            @csrf
            @method('PUT')
            <div class="row">
                <h5 class="card-header">Product</h5>
                <div class="form-row">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Kode Produk</label>
                        <input type="text" name="kode" class="form-control" placeholder="" required=""
                            value="{{ old('kode', $products->kode) }}" readonly>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Nama Produk</label>
                        <input type="text" name="nama" class="form-control" placeholder="" required=""
                            value="{{ old('nama', $products->nama) }}" readonly>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Ukuran</label>
                        <input type="text" name="ukuran" class="form-control" placeholder="" required=""
                            value="{{ old('ukuran', $products->ukuran) }}" readonly>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Harga</label>
                        <input type="text" name="harga" class="form-control" placeholder="" required=""
                            value="{{ old('harga', $products->harga) }}" readonly>
                    </div>
                    <br> <br> <br>
                    <h5 class="card-header">Stok</h5>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Stok</label>
                        <input type="number" name="stok" class="form-control" placeholder="" required=""
                            value="{{ old('stok', $products->stok) }}">
                    </div>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4 mb-3">
                    </br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
                </div>
            </div>
        </form>
    </div>
@endsection
