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
            <form method="post" action="{{ route('pesanan.update', $pesanans->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" placeholder="" required=""
                            value="{{ old('id', $pesanans->id) }}" disabled>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Produk</label>
                        <select name="produk" class="form-control">
                            <option value="{{ old('produk', $pesanans->produk) }}" selected>
                                {{ old('produk', $pesanans->produk) }}
                            </option>
                            <option>------------------------------------------------------</option>
                            <option value="Kaos Lengan Pendek" required="">Kaos Lengan Pendek</option>
                            <option value="Kaos Lengan Panjang" required="">Kaos Lengan Panjang</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Ukuran</label>
                        <select name="ukuran" class="form-control">
                            <option value="{{ old('ukuran', $pesanans->ukuran) }}" selected>
                                {{ old('ukuran', $pesanans->ukuran) }}
                            </option>
                            <option>------------------------------------------------------</option>
                            <option value="M" required="">M</option>
                            <option value="L" required="">L</option>
                            <option value="XL" required="">XL</option>
                            <option value="XXL" required="">XXL</option>
                        </select>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Jumlah Kaos (pcs)</label>
                        <input type="text" name="jml_kaos" class="form-control" placeholder="" required=""
                            value="{{ old('jml_kaos', $pesanans->jml_kaos) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3 input-group-sm">
                        </br>
                        <label>Kain Katun 245 (Kg)</label>
                        <input type="text" name="kain" class="form-control" placeholder="" required=""
                            value="{{ old('jml_kaos', $pesanans->kain) }}">
                    </div>
                    <div class="col-md-4 mb-3 input-group-sm">
                        </br>
                        <label>Jumlah Benang (Yard)</label>
                        <input type="text" name="benang" class="form-control" placeholder="" required=""
                            value="{{ old('jml_kaos', $pesanans->benang) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group text-left col-md-6 mb-3">
                        <br>
                        <button type="submit" class="editbtn btn btn-primary left-block"><i class="fa fa-save"></i> Simpan
                            Perubahan</button>
                    </div>
                </div>
            </form>
            <div class="col-sm-12">
                </br>
                <p class="back-link">ERP Produksi Kaos Polos 2022</p>
            </div>
        </div>
    </div>
@endsection
