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
                <li class="breadcrumb-item active" aria-current="page"> Tambah Stok Bahan Baku {{ $bahan->nama_bahan_baku }}
                </li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah Stok Bahan Baku {{ $bahan->nama_bahan_baku }}</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('datavendor.stok', $bahan->id) }} ">
                @csrf
                <h5 class="card-header">{{ $bahan->nama_bahan_baku }}</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-3 mb-3 input-group-sm">
                        @if ($bahan->nama_bahan_baku == 'Kain')
                            <label for="kode">Stok {{ $bahan->nama_bahan_baku }}<small>/Kg</small></label>
                        @elseif ($bahan->nama_bahan_baku == 'Benang')
                            <label for="kode">Stok {{ $bahan->nama_bahan_baku }}<small>/Yard</small></label>
                        @endif
                        <input type="text" id="#" name="stok" class="form-control input-lg">
                    </div>
                </div>
        </div>
        <div class="form-row">
            <div class="form-group col-md-4 mb-3">
                </br>
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Tambah Stok</button>
            </div>
        </div>
        </form>
    </div>
    <div class="col-sm-12">
        <br>
        <p class="back-link">ERP Produksi Kaos Polos 2022</p>
    </div>
@endsection
