@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('product.index') }}"> Detail Product</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Product</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Product</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('product.store') }} " novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="kode">Kode Produk</label>
                        <input type="text" class="form-control" id="kode" placeholder="" name="kode"
                            required="">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="nama">Nama Produk</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama"
                            required="">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="ukuran">Ukuran</label>
                        <select name="ukuran" class="form-control">
                            <option value="" selected="selected" disabled>---PILIH---</option>
                            <option value="M" required="">M</option>
                            <option value="L" required="">L</option>
                            <option value="XL" required="">XL</option>
                            <option value="XXL" required="">XXL</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" placeholder="" name="harga" required>
                    </div>
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
    <div class="col-sm-12">
        <br>
        <p class="back-link">ERP Produksi Kaos Polos 2022</p>
    </div>
@endsection
