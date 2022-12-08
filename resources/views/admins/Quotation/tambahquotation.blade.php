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
                <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}"> Quotation</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Quotation</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Quotation</h2>
            </div>
        </div>
    </div>
    <!--/.main-->
</div>
<div class="wow fadeInRight">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('quotation.store') }} ">
                @csrf
                <h5 class="card-header">Pemesanan</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="kode">Costumer</label>
                        <select name="costumer" id="costumer" class="form-control input-lg dynamic" data-dependent="nama" data-dynamic="ukuran">
                            required>
                            <option disabled selected>---PILIH---</option>

                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="produk">Nama Produk</label>
                        <input type="text" class="form-control" id="produk" placeholder="" name="produk" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">Harga</label>
                        <input type="text" class="form-control" id="harga" placeholder="" name="harga" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">Quantity</label>
                        <input type="text" class="form-control" id="quantity" placeholder="" name="quantity" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <br>
                        <label for="harga">Total Harga</label>
                        <input type="text" class="form-control" id="" placeholder="" name="total" required readonly>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <br>
                        <label for="harga">Tanggal Pemesanan</label>
                        <input type="text" class="form-control" id="" placeholder="" name="" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <br>
                        <label for="harga">Tanggal Pembayaran</label>
                        <input type="text" class="form-control" id="" placeholder="" name="" required>
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
</div>
@endsection