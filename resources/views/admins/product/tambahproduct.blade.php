@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item"><a href="{{ route('product.index') }}">Data Produk</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Produk</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Tambah Produk</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <form class="needs-validation" method="post" action="{{ route('product.store') }} " novalidate>
            @csrf
            <h5 class="card-header">Product</h5>
            <div class="form-row" style="text-align: center">
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="kode">kode Produk</label>
                    <input name="kode" id="kode" class="form-control input-lg dynamic" data-dependent="nama" data-dynamic="ukuran">
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="nama">Nama Produk</label>
                    <select name="nama" id="nama" class="form-control input-lg" data-dependent="produk">
                        <option selected="selected">--pilih produk--</option>
                        <option>Kaos Lengan Panjang</option>
                        <option>Kaos Lengan Pendek</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="ukuran">Ukuran</label>
                    <select name="ukuran" id="ukuran" class="form-control input-lg" data-dependent="ukuran">
                        <option selected="selected">--pilih ukuran--</option>
                        <option>S</option>
                        <option>M</option>
                        <option>L</option>
                        <option>XL</option>
                    </select>
                </div>
                <br>
                <br>
                <br>
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4 mb-3">
            </br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
        </div>
    </div>
    </form>
</div>
<div class="form-row">
    <div class="form-group col-md-4 mb-3">
        </br>
        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
    </div>
</div>
</form>
</div>
<div class="col-sm-12">
    <br>
    <p class="back-link">ERP Produksi Kaos Polos 2022</p>
</div>
@endsection