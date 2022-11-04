@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('datavendor.index') }}"> Data vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Data Vendor</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Data Vendor</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('datavendor.store') }} ">
                @csrf
                <h5 class="card-header">Product</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="kode">kode Produk</label>
                        <input type="text" id="#" name="kode_produk" class="form-control input-lg">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="nama">Nama Produk</label>
                        <select name="nama_produk" id="" class="form-control input-lg">
                            <option readonly="readonly">Silahkan Pilih Produk</option>
                            <option value="Kain">Kain</option>
                            <option value="Benang">Benang</option>
                        </select>
                    </div>
                    <br>
                    <br>
                    <br>
                    <h5 class="card-header">Informasi Vendor</h5>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="nama">Nama Vendor</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama_vendor"
                            required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="Alamat">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" placeholder="" name="alamat" required></textarea>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="No.Hp">No.Hp</label>
                        <input type="text" class="form-control" id="NoHp" placeholder="" name="no_telp" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="status">Status</label>
                        <select name="status" id="" class="form-control input-lg">
                            <option disabled>Silahkan Pilih Status</option>
                            <option value="aktif">Aktif</option>
                            <option value="nonaktif">Nonaktif</option>
                        </select>
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
