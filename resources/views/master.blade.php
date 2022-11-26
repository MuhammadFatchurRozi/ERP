@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb wow fadeInLeft">
            <li><a href="#">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="wow fadeInLeft active">Dashboard</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header wow fadeInUp">Dashboard</h1>
        </div>
    </div>
    <!--/.row-->
    <div class="containee-fluid chat wow fadeInUp">
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <div class="large"><strong>{{ $all_pesanan }}</strong></div>
                        <div class="text"><strong> Pesanan</strong></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-cart"></i>
                    </div>
                    <a href="{{ route('pesanan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <div class="large"><strong>{{ $sum_product }}</strong></div>
                        <div class="text"><strong>Product Terjual</strong></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-shopping-bag"></i>
                    </div>
                    <a href="#" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <div class="large"><strong>{{ $kain->stok }} </strong><small> Kg</small></div>
                        <div class="text"><strong>Kain</strong></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <a href="{{ route('home.kain') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <div class="large"><strong> {{ $benang->stok }}</strong><small> Yard</small></div>
                        <div class="text"><strong>Benang</strong></div>
                    </div>
                    <div class="icon">
                        <i class="fa fa-bars"></i>
                    </div>
                    <a href="{{ route('bahan.index') }}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                </div>
            </div>
        </div>
        <!--/.row-->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default chat wow fadeInLeft">
                    <div class="panel-heading">
                        All Orders
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em class="fa fa-toggle-up"></em></span>
                    </div>
                    <div class="panel-body">
                        <ul>
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th>No</th>
                                        <th>Produk</th>
                                        <th>Jumlah Kaos (pcs)</th>
                                        <th>Ukuran</th>
                                        <th>Kain/<small>Kg</small></th>
                                        <th>Benang/<small>Yard</small></th>
                                        <th>Estimasi Produk</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($pesanans as $pesanan)
                                    <tr>
                                        <td>{{ $pesanan->id }} </td>
                                        <td>{{ $pesanan->nama }} </td>
                                        <td>{{ $pesanan->jumlah }} </td>
                                        <td>{{ $pesanan->ukuran }} </td>
                                        <td>{{ $pesanan->kain }} </td>
                                        <td>{{ $pesanan->benang }} </td>
                                        <td>{{ $pesanan->estimasi }} </td>
                                        @if ($pesanan->status == 0)
                                        <td><span class="badge bg-danger">Belum Diproses</span></td>
                                        @elseif ($pesanan->status == 1)
                                        <td><span class="badge bg-success">Sudah Diproses</span></td>
                                        @endif
                                    </tr>
                                    @empty
                                    ` <tr>
                                        <td colspan="7" class="text-center">Tidak ada data</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </ul>
                    </div>
                </div>
                <!--/.col-->
            </div>
            <!--/.col-->
            <div class="wow fadeInDown">
                <div class="col-sm-12">
                    <p class="back-link">ERP Produksi Kaos Polos
                        2022</p>
                </div>
            </div>
        </div>
        <!--/.row-->
    </div>
    <!--/.main-->
    @endsection