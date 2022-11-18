@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Purchase Order</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Purchase Order</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center" style="vertical-align:middle;">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kode Vendor</th>
                                <th rowspan="2">Nama Vendor</th>
                                <th rowspan="2">Produk</th>
                                <th rowspan="2">Nama Vendor</th>
                                <th rowspan="2">Quantity</th>
                                <th rowspan="2">Total</th>
                                <th rowspan="2">Status</th>
                                <th rowspan="2">Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" style="vertical-align:middle;">
                            <tr>
                                <td colspan="9">Tidak Ada data</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-sm-12">
            <p class="back-link">ERP Produksi Kaos Polos 2022</a></p>
        </div>
    </div>
</div>
@endsection