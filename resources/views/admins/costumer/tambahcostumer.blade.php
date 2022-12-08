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
                <li class="breadcrumb-item"><a href="{{ route('costumer.index') }}"> Data Costumer</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Data Costumer</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Data Costumer</h2>
            </div>
        </div>
    </div>
    <!--/.main-->
</div>
<div class="wow fadeInRight">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('costumer.store') }} ">
                @csrf
                <h5 class="card-header">Data Costumer</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-4 mb-4 input-group-sm">
                        <label for="nama">Nama</label>
                        <input type="text" id="#" name="harga" placeholder="" class="form-control input-lg" required>
                    </div>
                    <div class="col-md-4 mb-4 input-group-sm">
                        <label for="Alamat">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" placeholder="" name="alamat" required></textarea>
                    </div>
                    <div class="col-md-4 mb-4 input-group-sm">
                        <label for="harga">No.HP</label>
                        <input type="number" id="#" name="harga" placeholder="" class="form-control input-lg" required>
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
        <center>
            <p class="back-link">ERP Produksi Kaos Polos 2022</p>
        </center>
    </div>
</div>
@endsection