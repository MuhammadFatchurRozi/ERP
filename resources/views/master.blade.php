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

    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="chat wow fadeInUp">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div class="large"><strong>{{ $all_pesanan }}</strong></div>
                            <div class="text"><strong>Semua Pesanan</strong></div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-cart-plus"></i>
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
                            <div class="text"><strong>Produk Terjual</strong></div>
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
                            <div class="large"><strong>{{ $kain->stok }} </strong><small>Kg</small></div>
                            <div class="text"><strong>Kain</strong></div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bars"></i>
                        </div>
                        <a href="{{ route('bahan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ route('bahan.index')}}" class="small-box-footer">More info <i class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!-- ./col -->
        </div>
        {{-- <div class="row">
            <div class="col-md-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        Site Traffic Overview
                        <ul class="pull-right panel-settings panel-button-tab-right">
                            <li class="dropdown"><a class="pull-right dropdown-toggle" data-toggle="dropdown"
                                    href="#">
                                    <em class="fa fa-cogs"></em>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-right">
                                    <li>
                                        <ul class="dropdown-settings">
                                            <li><a href="#">
                                                    <em class="fa fa-cog"></em> Settings 1
                                                </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                    <em class="fa fa-cog"></em> Settings 2
                                                </a></li>
                                            <li class="divider"></li>
                                            <li><a href="#">
                                                    <em class="fa fa-cog"></em> Settings 3
                                                </a></li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                class="fa fa-toggle-up"></em></span>
                    </div>
                    <div class="panel-body">
                        <div class="canvas-wrapper">
                            <canvas class="main-chart" id="line-chart" height="200" width="600"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>New Orders</h4>
                        <div class="easypiechart" id="easypiechart-blue" data-percent="92"><span
                                class="percent">92%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Comments</h4>
                        <div class="easypiechart" id="easypiechart-orange" data-percent="65"><span
                                class="percent">65%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>New Users</h4>
                        <div class="easypiechart" id="easypiechart-teal" data-percent="56"><span
                                class="percent">56%</span></div>
                    </div>
                </div>
            </div>
            <div class="col-xs-6 col-md-3">
                <div class="panel panel-default">
                    <div class="panel-body easypiechart-panel">
                        <h4>Visitors</h4>
                        <div class="easypiechart" id="easypiechart-red" data-percent="27"><span
                                class="percent">27%</span></div>
                    </div>
                </div>
            </div>
        </div>
        <!--/.row--> --}}
        <div class="row">
            <div class="container-fluid">
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