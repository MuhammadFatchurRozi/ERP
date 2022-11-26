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
                <li class="breadcrumb-item"><a href="{{ route('datavendor.index') }}"> Data vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Edit Data Vendor</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Edit Data Vendor</h2>
            </div>
        </div>
    </div>
    <!--/.main-->
</div>
<div class="wow fadeInRight">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form method="POST" action="{{ route('datavendor.update', $vendors->id) }}">
                @csrf
                @method('PUT')
                <h5 class="card-header">Product</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="nama">Nama Bahan Baku</label>
                        <select name="nama_bahan_baku" id="" class="form-control input-lg" required>
                            <option value="{{ old('nama_bahan_baku', $vendors->nama_bahan_baku) }}" readonly="readonly" selected>{{ old('nama_bahan_baku', $vendors->nama_bahan_baku) }}</option>
                            <option value="Kain">Kain</option>
                            <option value="Benang">Benang</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">Harga</label>
                        <input type="number" id="#" name="harga" placeholder="" value="{{ old('harga', $vendors->harga) }}" class="form-control input-lg" required>
                    </div>
                    <br>
                    <br>
                    <br>
                    <h5 class="card-header">Informasi Vendor</h5>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="nama">Nama Vendor</label>
                        <input type="text" class="form-control" id="nama" placeholder="" name="nama_vendor" value="{{ old('nama_vendor', $vendors->nama_vendor) }}" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="Alamat">Alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="" name="alamat" value="{{ old('alamat', $vendors->alamat) }}" required></textarea>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="No.Hp">No.Hp</label>
                        <input type="text" class="form-control" id="NoHp" placeholder="" name="no_telp" value="{{ old('no_telp', $vendors->no_telp) }}" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="status">Status</label>
                        <input type="text" class="form-control" name="status" placeholder="Aktif" value="aktif" readonly>
                    </div>
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-3 mb-3">
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