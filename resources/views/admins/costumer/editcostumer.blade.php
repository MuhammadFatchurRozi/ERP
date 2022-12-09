@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="wow fadeInLeft">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">
                            <em class="">
                                <img src="{{ asset('style/gambar/home.gif') }}" width="20px" height="auto" alt=""
                                    srcset="">
                            </em>
                        </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('costumer.index') }}"> Data Costumer</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Edit Data Costumer</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Edit Data Costumer</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <form method="POST" action="{{ route('costumer.update', $cotumers->id) }}">
                    @csrf
                    @method('PUT')
                    <h5 class="card-header">Data Costumer</h5>
                    <div class="form-row" style="text-align: center">
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="nama">Nama</label>
                            <input type="text" id="#" name="nama" placeholder=""
                                value="{{ old('nama', $cotumers->nama) }}" class="form-control input-lg" required>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="Alamat">Alamat</label>
                            <input type="text" class="form-control" id="alamat" placeholder="" name="alamat"
                                value="{{ old('alamat', $costumers->alamat) }}" required></textarea>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="harga">No.Hp</label>
                            <input type="number" id="#" name="NoHp" placeholder=""
                                value="{{ old('NoHp', $costumers->NoHp) }}" class="form-control input-lg" required>
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
