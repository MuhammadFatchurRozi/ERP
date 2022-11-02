@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('pesanan.index') }}"> Detail Pesanan</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah Pesanan</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Detail Pesanan</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('pesanan.store') }} " novalidate>
                @csrf
                <div class="form-row">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="kodeproduk">Kode Produk</label>
                        <input type="text" class="form-control" id="kodeproduk" placeholder="" name="kode_produk"
                            required="">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="Produk">Produk</label>
                        <br>
                        <select name="produk" class="form-control" required="">
                            <option value="" selected="selected">---PILIH---</option>
                            <option value="Kaos Lengan Pendek" required="">Kaos Lengan Pendek</option>
                            <option value="Kaos Lengan Panjang" required="">Kaos Lengan Panjang</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="ukuran">Ukuran</label>
                        <select name="ukuran" class="form-control">
                            <option value="" selected="selected">---PILIH---</option>
                            <option value="M" required="">M</option>
                            <option value="L" required="">L</option>
                            <option value="XL" required="">XL</option>
                            <option value="XXL" required="">XXL</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="jumlah">Qty</label>
                        <input type="text" class="form-control" id="jumlah" placeholder="" name="jml_kaos" required>
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 input-group-sm">
                        </br>
                        <label for="alamat">Alamat</label>
                        <textarea type="text" class="form-control" id="alamat" placeholder="" name="#" required=""></textarea>
                    </div>
                    <div class="col-md-4 mb-3 input-group-sm">
                        </br>
                        <label for="nohp">No Hp</label>
                        <input type="text" class="form-control" id="nohp" placeholder="" name="nohp"
                            required="">
                    </div>
                    <div class="col-md-4 mb-3 input-group-sm">
                        </br>
                        <label for="tanggal">Tanggal Order</label>
                        <input type="text" class="form-control" id="date" name="#" placeholder=""
                            required="">
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
        <div class="panel panel-primary">
            <div class="panel-heading">
                <strong>Daftar Pesanan</strong>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Produk</th>
                            <th>Ukuran</th>
                            <th>Jumlah</th>
                        </tr>
                    </thead>
                    <tbody>
                        <td>1</td>
                        <td>Kaos lengan panjang</td>
                        <td>L</td>
                        <td>10</td>
                    </tbody>
                </table>
            </div>
            <div class="panel-body">
                <div class="form-group">
                    <a class="btn btn-primary" href="#"><i class="fa fa-check-square"></i> Proses</a>
                    <a class="btn btn-default" href="#"><i class="fa fa-print"></i> Cetak</a>
                </div>
            </div>
        </div>
        <div class="form-row">
            <fieldset disabled>
                <div class="col-md-4 mb-3 input-group-sm">
                    <label>Estimasi Pengerjaan</label>
                    <input type="text" class="form-control" placeholder="">
                </div>
                <div class="col-md-4 mb-3 input-group-sm">
                    <label>Total Harga</label>
                    <input type="text" class="form-control">
                </div>
            </fieldset>
        </div>

        <div class="col-sm-12">
            <br>
            <p class="back-link">ERP Produksi Kaos Polos 2022</p>
        </div>
    @endsection
