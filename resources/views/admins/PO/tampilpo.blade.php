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
                                    <th rowspan="2">Kode RFQ</th>
                                    <th colspan="3">Data Vendor</th>
                                    <th colspan="2">Data Produk</th>
                                    <th rowspan="2">Quantity</th>
                                    <th rowspan="2">Total Harga</th>
                                    <th rowspan="2">Tanggal Pemesanan</th>
                                    <th rowspan="2">Tanggal Pembayaran</th>
                                    <th colspan="3">Action</th>
                                </tr>
                                <tr>
                                    <th>Nama Vendor</th>
                                    <th>No Vendor</th>
                                    <th>Alamat Vendor</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                    <th>Receive Product</th>
                                    <th>Validate</th>
                                    <th>Paid</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align:middle;">
                                @forelse ($pos as $r)
                                <tr>
                                    <td>{{ $r->id }}</td>
                                    <td>{{ $r->kode_rfq }}</td>
                                    <td>{{ $r->nama_vendor }}</td>
                                    <td>{{ $r->nohp }}</td>
                                    <td>{{ $r->alamat }}</td>
                                    <td>{{ $r->nama_produk }}</td>
                                    <td>Rp.@idr($r->harga)</td>

                                    @if ($r->nama_produk == 'Benang')
                                    <td>{{ $r->quantity }} <small>Yard</small></td>
                                    @elseif ($r->nama_produk == 'Kain')
                                    <td>{{ $r->quantity }} <small>Kg</small></td>
                                    @endif

                                    <td>Rp.@idr($r->total)</td>
                                    <td>{{ $r->tgl_pesan }}</td>
                                    <td>{{ $r->tgl_bayar }}</td>
                                    @if($r->validate == 1 && $r->paid == 1)
                                    <td>
                                        <button class="btn btn-success" disabled><i class="fa fa-check"></i>
                                            Receive Product</button>
                                    </td>
                                    @elseif($r->validate == 0 && $r->paid == 0)
                                    <td>
                                        <a href="{{ route('po.receive', $r->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Receive Product</a>
                                    </td>
                                    @endif

                                    @if ($r->validate == 0)
                                    <td>
                                        <a href="{{ route('po.show', $r->id) }}" class="btn btn-success"><i class="fa fa-check"></i> Validate</a>
                                    </td>
                                    @elseif ($r->validate == 1)
                                    <td>
                                        <button class="btn btn-success" disabled><i class="fa fa-check"></i>
                                            Validate</button>
                                    </td>
                                    @endif

                                    @if ($r->paid == 0)
                                    <td>
                                        <button class="btn btn-danger" disabled><i class="fa fa-credit-card-alt"></i>
                                            Paid</button>
                                    </td>
                                    @elseif ($r->paid == 1)
                                    <td>
                                        <a href="{{ route('po.edit', $r->id) }}" class="btn btn-danger"><i class="fa fa-credit-card-alt"></i> Paid</a>
                                    </td>
                                    @endif
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="10" class="text-center">
                                        Tidak Ada Data
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