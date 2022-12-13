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
                    <li class="active">Order Sales</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Order Sales</h2>
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode Order</th>
                                        <th colspan="3">Data Costumer</th>
                                        <th colspan="3">Data Produk</th>
                                        <th rowspan="2">Quantity</th>
                                        <th rowspan="2">Total Harga</th>
                                        <th rowspan="2">Tanggal Pemesanan</th>
                                        <th rowspan="2">Tanggal Pembayaran</th>
                                        <th rowspan="2">Status</th>
                                        <th colspan="5">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Costumer</th>
                                        <th>Alamat Costumer</th>
                                        <th>No Hp</th>
                                        <th>Nama Produk</th>
                                        <th>Ukuran Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Register Payment</th>
                                        <th>Validate</th>
                                        <th>Paid</th>
                                        <th>Delivery</th>
                                        <th>Create Invoice</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($orders as $o)
                                        <tr>
                                            <td>{{ $o->id }}</td>
                                            <td>{!! DNS1D::getBarcodeHTML($o->kode_order, 'C39', 0.6, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $o->kode_order }}</p>
                                            </td>
                                            <td>{{ $o->name }}</td>
                                            <td>{{ $o->address }}</td>
                                            <td>{{ $o->phone }}</td>
                                            <td>{{ $o->nama_produk }}</td>
                                            <td>{{ $o->ukuran }}</td>
                                            <td>Rp.@idr($o->harga)</td>
                                            <td>{{ $o->quantity }}</td>
                                            <td>Rp.@idr($o->total)</td>
                                            <td>{{ $o->tgl_pemesanan }}</td>
                                            <td>
                                                @if ($o->tgl_pembayaran == 'Not Billed')
                                                    <span class="badge bg-danger">{{ $o->tgl_pembayaran }}</span>
                                                @else
                                                    <span class="badge bg-success">{{ $o->tgl_pembayaran }}</span>
                                                @endif
                                            <td>
                                                @if ($o->status == 0)
                                                    <span class="badge bg-danger">Waiting Register</span>
                                                @elseif ($o->status == 1)
                                                    <span>Validasi Sebelum
                                                        <i class="badge bg-danger">{{ $o->last_paid }}</i>
                                                        <i class="badge bg-warning">Segera Validasi</i>
                                                    </span>
                                                @elseif ($o->status == 2)
                                                    <span class="badge bg-info">Paid</span>
                                                @elseif ($o->status == 3)
                                                    <span class="badge bg-orange">Delivery</span>
                                                @elseif ($o->status == 4)
                                                    <span class="badge bg-success">Pesanan Selesai</span>
                                                @elseif ($o->status == 5)
                                                    <span class="badge bg-danger">Pesanan Gagal</span>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($o->register_payment == 1)
                                                    <a href="{{ route('order.edit', $o->id) }}" class="btn btn-info"><i
                                                            class="fa fa-times">
                                                            Register</i></a>
                                                @elseif ($o->register_payment == 2)
                                                    <button class="btn btn-success" disabled><i class="fa fa-registered">
                                                            Registered</i></button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($o->validate == 1)
                                                    <button class="btn btn-danger" disabled><i class="fa fa-times">
                                                            Validated</i></button>
                                                @elseif ($o->validate == 2)
                                                    <a href="{{ route('order.validate', $o->id) }}" class="btn btn-info"><i
                                                            class="fa fa-times"> Validate</i></a>
                                                @elseif ($o->validate == 3)
                                                    <button class="btn btn-success" disabled><i class="fa fa-check">
                                                            Validated</i></button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($o->paid == 1)
                                                    <button class="btn btn-danger" disabled><i class="fa fa-times">
                                                            Paid</i></button>
                                                @elseif ($o->paid == 2)
                                                    <a href="{{ route('order.paid', $o->id) }}" class="btn btn-info"><i
                                                            class="fa fa-times"> Paid</i></a>
                                                @elseif ($o->paid == 3)
                                                    <button class="btn btn-success" disabled><i class="fa fa-money">
                                                            Paid</i></button>
                                                @endif
                                            </td>
                                            <td>
                                                @if ($o->delivery == 1)
                                                    <button class="btn btn-danger" disabled><i class="fa fa-times">
                                                            Delivered</i></button>
                                                @elseif ($o->delivery == 2)
                                                    <a href="{{ route('order.delivery', $o->id) }}" class="btn btn-info"><i
                                                            class="fa fa-times"> Delivery</i></a>
                                                @elseif ($o->delivery == 3)
                                                    <button class="btn btn-success" disabled><i class="fa fa-truck">
                                                            Delivered</i></button>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('order.show', $o->id) }}" class="btn btn-primary">
                                                    <i class="fa fa-file">
                                                        Create Invoice</i>
                                                </a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="18" class="text-center">Data Order Kosong</td>
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
