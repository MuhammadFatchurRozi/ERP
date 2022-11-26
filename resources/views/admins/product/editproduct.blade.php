@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Detail Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Produk</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Produk</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <form method="POST" action="{{ route('product.update', $product->id) }}">
            @csrf
            @method('PUT')
            <h5 class="card-header">Product</h5>
            <div class="form-row">
                <div class="col-md-3 mb-3 input-group-sm">
                    <label>Kode Produk</label>
                    <input type="text" name="kode" class="form-control" placeholder="" required="" value="{{ old('kode', $product->kode) }}">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label>Nama Produk</label>
                    <select name="nama" class="form-control">
                        <option value="{{ old('produk', $product->nama) }}" selected>
                            {{ old('produk', $product->nama) }}
                        </option>
                        <option>------------------------------------------------------</option>
                        <option value="Kaos Lengan Pendek" required="">Kaos Lengan Pendek</option>
                        <option value="Kaos Lengan Panjang" required="">Kaos Lengan Panjang</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label>Ukuran</label>
                    <select name="ukuran" class="form-control">
                        <option value="{{ old('ukuran', $product->ukuran) }}" selected>
                            {{ old('ukuran', $product->ukuran) }}
                        </option>
                        <option>------------------------------------------------------</option>
                        <option value="M" required="">M</option>
                        <option value="L" required="">L</option>
                        <option value="XL" required="">XL</option>
                        <option value="XXL" required="">XXL</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label>Harga</label>
                    <input type="text" name="harga" class="form-control" placeholder="" required="" value="{{ old('harga', $product->harga) }}">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <br>
                    <label>Terjual</label>
                    <input type="text" name="penjualan" class="form-control" placeholder="" required="" value="{{ old('penjualan', $product->penjualan) }}">
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