@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item"><a href="{{ route('rfq.index') }}"> Request For Quotation</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Tambah Data RFQ</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Tambah Data RFQ</h2>
            <p class="wkt">Company : Kaos Polos Production</p>
            <p class="wkt">Tanggal Konfirmasi: <span id="waktu"></span></p>
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
                    <label for="nama">Nama Produk</label>
                    <select name="nama_produk" id="" class="form-control input-lg">
                        <option readonly="readonly"> Produk</option>
                        <option value="Kain">Kain</option>
                        <option value="Benang">Benang</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="quantity">Quantity</label>
                    <input type="text" class="form-control" id="quantity" placeholder="" name="" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="harga">Harga/<small>pcs</small></label>
                    <input type="text" class="form-control" id="harga" placeholder="" name="" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="total">Total</label>
                    <input type="text" class="form-control" id="total" placeholder="" name="" required disabled>
                </div>
                <br>
                <br>
                <br>
                <h5 class="card-header">Informasi Vendor</h5>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="kode">Kode Vendor</label>
                    <select class="form-control input-lg">
                        <option readonly="readonly">Kode Produk</option>
                    </select>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="nama">Nama Vendor</label>
                    <input type="text" class="form-control" id="nama" placeholder="" name="nama_vendor" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="Alamat">Alamat</label>
                    <textarea type="text" class="form-control" id="alamat" placeholder="" name="alamat" required></textarea>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="No.Hp">No.Hp</label>
                    <input type="text" class="form-control" id="NoHp" placeholder="" name="no_telp" required>
                </div>
            </div>

    </div>
    <div class="form-row">
        <div class="form-group col-md-4">
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
<script>
    var dt = new Date();
    document.getElementById("waktu").innerHTML = (("0" + (dt.getMonth() + 1)).slice(-2)) +
        "/" + (("0" + dt.getDate()).slice(-2)) + "/" + (dt.getFullYear()) + " " + dt.toLocaleTimeString();
</script>
@endsection