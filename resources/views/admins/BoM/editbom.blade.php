@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="breadcrumb-item"><a href="{{ route('bom.index') }}"> BOM</a></li>
            <li class="breadcrumb-item active" aria-current="page"> Edit Bill of Materials</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Edit Bill of Materials</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <form method="POST" action="{{ route('bom.update', $boms->id) }}">
            @csrf
            @method('PUT')
            <h5 class="card-header">Bill Of Materials</h5>
            <div class="form-row" style="text-align: center">
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="harga">Harga</label>
                    <input type="text" class="form-control" id="harga" placeholder="" name="harga" value="{{ old('harga', $boms->harga) }}" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="kain">Kain</label>
                    <input type="text" class="form-control" id="kain" placeholder="" name="kain" value="{{ old('kain', $boms->kain) }}" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="harga">benang</label>
                    <input type="text" class="form-control" id="harga" placeholder="" name="benang" value="{{ old('benang', $boms->benang) }}" required>
                </div>
                <div class="col-md-3 mb-3 input-group-sm">
                    <label for="estimasi">Estimasi Waktu</label>
                    <input type="text" class="form-control" id="estimasi" placeholder="" name="estimasi" value="{{ old('estimasi', $boms->estimasi) }}" required>
                </div>
            </div>
    </div>
    <div class="form-row">
        <div class="form-group col-md-4 mb-3">
            </br>
            <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Perubahan</button>
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