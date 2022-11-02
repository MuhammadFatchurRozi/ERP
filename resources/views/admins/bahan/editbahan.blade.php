@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('bahan.index') }}"> Katalog Bahan Baku</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Ubah Bahan Baku</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Data Bahan Baku Kaos</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form method="post" action="{{ route('bahan.update', $bahans->id) }}">
                @csrf
                @method('PUT')
                <div class="form-row">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>ID</label>
                        <input type="text" name="id" class="form-control" placeholder="" required=""
                            value="{{ old('id', $bahans->id) }}" disabled>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Kode Bahan</label>
                        <input type="text" name="kode" class="form-control" placeholder="" required=""
                            value="{{ old('kode', $bahans->kode) }}">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Bahan</label>
                        <input type="text" name="bahan" class="form-control" placeholder="" required=""
                            value="{{ old('bahan', $bahans->bahan) }}">
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label>Ketersediaan</label>
                        <input type="text" name="stok" class="form-control" placeholder="" required=""
                            value="{{ old('stok', $bahans->stok) }}">
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 mb-3">
                        </br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                    </div>
                </div>
            </form>
            <div class="col-sm-12">
                <p class="back-link">ERP Produksi Kaos Polos 2022</p>
            </div>
        </div>
    </div>
@endsection
