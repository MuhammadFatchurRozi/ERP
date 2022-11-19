@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Request For Quotation</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Request For Quotation</h2>
        </div>
    </div>
</div>
<!--/.main-->

<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <form class="form-inline">
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            <a type="button" class="btn btn-danger" href="{{ route('rfq.create') }}"><i class="fa fa-plus"></i> Tambah</a>
                        </div>
                    </form>
                </div>
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
                                <th rowspan="2">Harga/<small>pcs</small></th>
                                <th rowspan="2">Total</th>
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