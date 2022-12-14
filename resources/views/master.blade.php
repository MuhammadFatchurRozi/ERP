@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="container-fluid col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb wow fadeInLeft">
                <li><a href="#">
                        <em class="">
                            <img src="{{ asset('style/gambar/home.gif') }}" width="20px" height="auto" alt=""
                                srcset="">
                        </em>
                    </a></li>
                <li class="wow fadeInLeft active">Dashboard</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row image_dashboard mt-1 mx-auto">
            <div class="col-lg-12">
                <img src="{{ asset('style/gambar/dashboard.gif') }}" alt="dashboard" class="wow fadeInUp">
            </div>
        </div>
        <!--/.row-->
        <div class="container-fluid chat wow fadeInUp">
            <div class="row">
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-info">
                        <div class="inner">
                            <div class="large"><strong>Rp.@idr($income)</strong></div>
                            <div class="text"><strong> Pemasukan {{ $year }}</strong></div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-arrow-up"></i>
                        </div>
                        <a href="{{ route('accounting.index') }}" class="small-box-footer">More Info Report <i
                            class="fa fa-arrow-circle-right"></i></a>
                        <a href="{{ route('home.cetak_customer') }}" class="small-box-footer">Report <i
                                class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
                <!-- ./col -->
                <div class="col-lg-3 col-6">
                    <!-- small box -->
                    <div class="small-box bg-success">
                        <div class="inner">
                            <div class="large"><strong>Rp.@idr($expenditure) </strong></div>
                            <div class="text"><strong>Pengeluaran {{ $year }}</strong></div>
                        </div>
                        <div class="icon">
                            <i class="fa fa-arrow-down"></i>
                        </div>
                        <a href="{{ route('accounting.create') }}" class="small-box-footer">More Info Report <i
                            class="fa fa-arrow-circle-right"></i></a>
                        <a href="{{ route('home.cetak_vendor') }}" class="small-box-footer">Report <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ route('home.kain') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                        <a href="{{ route('home.kain_create') }}" class="small-box-footer">Order <i
                                class="fa fa-arrow-circle-right"></i></a>
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
                        <a href="{{ route('home.benang') }}" class="small-box-footer">More info <i
                                class="fa fa-arrow-circle-right"></i></a>
                        <a href="{{ route('home.benang_create') }}" class="small-box-footer">Order <i
                            class="fa fa-arrow-circle-right"></i></a>
                    </div>
                </div>
            </div>
            <!--/.row-->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default chat wow fadeInLeft">
                        <div class="panel-heading">
                            All Orders
                            <span class="pull-right clickable panel-toggle panel-button-tab-left"><em
                                    class="fa fa-toggle-up"></em></span>
                        </div>
                        <div class="panel-body">
                            <ul>
                                <table class="table table-bordered table-striped table-hover">
                                    <thead class="text-center" style="vertical-align:middle;">
                                        <tr>
                                            <th>No</th>
                                            <th>Produk</th>
                                            <th>Quanitity <small>Per Lusin</small></th>
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
                                                <td>{{ $loop->iteration }} </td>
                                                <td>{{ $pesanan->nama }} </td>
                                                <td>{{ $pesanan->jumlah }} </td>
                                                <td>{{ $pesanan->ukuran }} </td>
                                                <td>{{ $pesanan->kain }} </td>
                                                <td>{{ $pesanan->benang }} </td>
                                                <td>{{ $pesanan->estimasi }} </td>
                                                <td>
                                                    @if ($pesanan->status == 0)
                                                        <span class="badge bg-success">Material Order</span>
                                                    @elseif ($pesanan->status == 1)
                                                        <span class="badge bg-warning">Check Avability</span>
                                                    @elseif ($pesanan->status == 2)
                                                        <span class="badge bg-info">Produce</span>
                                                    @elseif ($pesanan->status == 3)
                                                        <span class="badge bg-primary">Mark as Down</span>
                                                    @else
                                                        <span class="badge bg-danger">Gagal Produksi</span>
                                                    @endif
                                                </td>
                                            </tr>
                                        @empty
                                            ` <tr>
                                                <td colspan="8 class="text-center">Tidak ada data</td>
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
