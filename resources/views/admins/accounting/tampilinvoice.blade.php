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
                    <li class="active">Data Costumer Invoicing</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Costumer Invoicing</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form class="form-inline" action="{{ route('accounting.index') }}" method="GET">
                                <div class="form-group input-group-sm">
                                    <select name="cetak" id="cetak" class="form-control input-lg">
                                        <option disabled selected>---PILIH---</option>
                                        @forelse ($accounting_customer->unique('to_accounting') as $ac)
                                            <option value="{{ $ac->to_accounting }}">{{ $ac->to_accounting }}</option>
                                        @empty
                                            <option disabled>Data Accounting Kosong </option>
                                        @endforelse
                                    </select>
                                    @if ($accounting_customer == null)
                                    <button type="submit" class="btn btn-primary" disabled>
                                        <i class="fa fa-print"> Cetak</i>
                                    </button>
                                    @else
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fa fa-print"> Cetak</i>
                                    </button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="text-center" style="vertical-align:middle;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Kode Invoice</th>
                                    <th colspan="3">Data Costumer</th>
                                    <th colspan="3">Data Produk</th>
                                    <th rowspan="2">Quantity</th>
                                    <th rowspan="2">Total Harga</th>
                                    <th rowspan="2">Tanggal Pemesanan</th>
                                    <th rowspan="2">Tanggal Pembayaran</th>
                                    <th rowspan="2">Status</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Nama Costumer</th>
                                    <th>Alamat</th>
                                    <th>No. Telp</th>
                                    <th>Nama Produk</th>
                                    <th>Ukuran Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Cetak</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($accounting_customer as $ac)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{!! DNS1D::getBarcodeSVG($ac->kode_accounting_customer, 'C39', 0.6, 40) !!}
                                        </td>
                                        <td>{{ $ac->name }}</td>
                                        <td>{{ $ac->address }}</td>
                                        <td>{{ $ac->phone }}</td>
                                        <td>{{ $ac->nama_produk }}</td>
                                        <td>{{ $ac->ukuran }}</td>
                                        <td>Rp.@idr($ac->harga)</td>
                                        <td>{{ $ac->quantity }}</td>
                                        <td>Rp.@idr($ac->total)</td>
                                        <td><span class="badge bg-success">{{ $ac->tgl_pemesanan }}</span></td>
                                        <td><span class="badge bg-success">{{ $ac->tgl_pembayaran }}</span></td>
                                        <td><span class="badge bg-success">{{ $ac->status }}</span></td>
                                        <td>
                                            <a href="{{ route('accounting.show',$ac->id) }}" class="btn btn-sm btn-warning"><i class="fa fa-print"></i>
                                                Cetak</a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="14" class="text-center">
                                            Data Kosong
                                        </td>
                                    </tr>
                                @endforelse
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
    </div>
@endsection
