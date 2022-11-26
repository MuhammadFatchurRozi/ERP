@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="wow fadeInLeft">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="active">Katalog Bahan Baku</li>
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
</div>
<div class="wow fadeInRight">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Bahan</th>
                                    <th>Nama Bahan</th>
                                    <th>Ketersediaan</th>
                                    <th>Order</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($bahans as $bahan)
                                <tr>
                                    <td>id </td>
                                    <td>{{ $bahan->kode }} </td>
                                    <td>{{ $bahan->bahan }} </td>
                                    <td>
                                        @if ($bahan->stok == '0')
                                        <span class="badge bg-danger me-1 ">Stok Kosong</span>
                                        @elseif ($bahan->stok >= '0')
                                        @if ($bahan->bahan == 'Kain')
                                        <span class="badge bg-primary me-2">{{ $bahan->stok }}
                                            <small>KG</small></span>
                                        @elseif ($bahan->bahan == 'Benang')
                                        <span class="badge bg-primary me-2">{{ $bahan->stok }}
                                            <small>Yard</small></span>
                                        @endif
                                        @endif
                                    </td>
                                    <td>
                                        <a href="{{ route('rfq.create') }} " class="btn btn-sm btn-warning"><i class="fa fa-plus"></i>
                                            Order</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4">
                                        Data Kosong
                                    </td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
                {!! $bahans->withQueryString()->links() !!}
            </div>
            <div class="col-sm-12">
                <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
            </div>
        </div>
    </div>
</div>
@endsection