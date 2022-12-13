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
                    <li class="active">Quotation</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Quotation</h2>
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
                            <form class="form-inline">
                                <div class="form-group">
                                </div>
                                <div class="form-group">
                                    <a type="button" class="btn btn-danger" href="{{ route('quotation.create') }}"><i
                                            class="fa fa-plus"></i> Tambah Quotation</a>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode Quotation</th>
                                        <th colspan="3">Data Costumer</th>
                                        <th colspan="3">Data Produk</th>
                                        <th rowspan="2">Quantity</th>
                                        <th rowspan="2">Total Harga</th>
                                        <th rowspan="2">Tanggal Pemesanan</th>
                                        <th rowspan="2">Tanggal Pembayaran</th>
                                        <th rowspan="2">Status</th>
                                        {{-- <th colspan="2">Action</th> --}}
                                    </tr>
                                    <tr>
                                        <th>Nama Costumer</th>
                                        <th>Alamat</th>
                                        <th>No. Telp</th>
                                        <th>Nama Produk</th>
                                        <th>Ukuran Produk</th>
                                        <th>Harga Produk</th>
                                        {{-- <th>Confirm</th> --}}
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($quotations as $q)
                                        <tr>
                                            <td>{{ $q->id }}</td>
                                            <td>{!! DNS1D::getBarcodeHTML($q->kode_quotation, 'C39', 0.6, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $q->kode_quotation }}</p>
                                            </td>
                                            <td>{{ $q->name }}</td>
                                            <td>{{ $q->address }}</td>
                                            <td>{{ $q->phone }}</td>
                                            <td>{{ $q->nama_produk }}</td>
                                            <td>{{ $q->ukuran }}</td>
                                            <td>Rp.@idr($q->harga)</td>
                                            <td>{{ $q->quantity }}</td>
                                            <td>Rp.@idr($q->total)</td>
                                            <td>{{ $q->tgl_pemesanan }}</td>
                                            <td>
                                                @if ($q->tgl_pembayaran == 'Not Billed')
                                                    <span class="badge bg-danger">{{ $q->tgl_pembayaran }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $q->tgl_pembayaran }}</span>
                                                @endif
                                            <td>
                                                @if ($q->status == 0)
                                                    <span class="badge bg-danger">Waiting Register</span>
                                                @elseif ($q->status == 1)
                                                    <span>Validasi Sebelum
                                                        <i class="badge bg-danger">{{ $q->last_paid }}</i>
                                                        <i class="badge bg-warning">Segera Validasi</i>
                                                    </span>
                                                @elseif ($q->status == 2)
                                                    <span class="badge bg-info">Waiting Paid</span>
                                                @elseif ($q->status == 3)
                                                    <span class="badge bg-success">Delivery</span>
                                                @elseif ($q->status == 4)
                                                    <span class="badge bg-success">Pesanan Selesai</span>
                                                @elseif ($q->status == 5)
                                                    <span class="badge bg-danger">Pesanan Gagal</span>
                                                @endif
                                            </td>
                                            {{-- <td>
                                                @if ($q->status == 3)
                                                    <a href="{{ route('quotation.edit', $q->id) }}"
                                                        class="btn btn-success btn-sm"><i class="fa fa-edit">Confirm</i></a>
                                                @else
                                                    <button class="btn btn-danger btn-sm" disabled><i class="fa fa-times">
                                                            Confirm</i></button>
                                                @endif
                                            </td> --}}
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="text-center">Data Kosong</td>
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
