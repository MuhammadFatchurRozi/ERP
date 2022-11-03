@extends('layouts.main')
@section('container')
@include('sweetalert::alert')
<div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
    <div class="row">
        <ol class="breadcrumb">
            <li><a href="{{ route('home') }}">
                    <em class="fa fa-home"></em>
                </a></li>
            <li class="active">Data Product</li>
        </ol>
    </div>
    <!--/.row-->

    <div class="row">
        <div class="col-lg-12">
            <h2 class="page-header">Detail Product</h2>
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
                            <a type="button" class="btn btn-danger" href="{{ route('datavendor.create')}}"><i class="fa fa-plus"></i> Tambah</a>
                        </div>
                        <div class="form-group">
                            <a type="button" class="btn btn-info" href="#"><i class="fa fa-print"></i> Cetak</a>
                        </div>
                    </form>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover">
                        <thead class="text-center" style="vertical-align:middle;">
                            <tr>
                                <th rowspan="2">No</th>
                                <th rowspan="2">Kode Produk</th>
                                <th rowspan="2">Nama Produk</th>
                                <th colspan="3">Informasi Vendor</th>
                                <th rowspan="2">Action</th>
                            </tr>
                            <tr>
                                <th>Nama Vendor</th>
                                <th>No.Hp</th>
                                <th>Alamat</th>
                            </tr>
                        </thead>
                        <tbody class="text-center" style="vertical-align:middle;">
                            <tr>
                                <td>p</td>
                                <td>p</td>
                                <td>p</td>
                                <td>p</td>
                                <td>p</td>
                                <td>p</td>
                                <td>
                                    <div class="action">
                                        <a href="" class="action btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                        <form action="" method="POST" class="d-inline">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="action btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
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