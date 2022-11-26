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
                                    <a type="button" class="btn btn-danger" href="{{ route('rfq.create') }}"><i
                                            class="fa fa-plus"></i> Order Bahan Baku</a>
                                </div>
                            </form>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode RFQ</th>
                                        <th colspan="3">Data Vendor</th>
                                        <th colspan="2">Data Bahan Baku</th>
                                        <th rowspan="2">Quantity</th>
                                        <th rowspan="2">Total Harga</th>
                                        <th rowspan="2">Tanggal Pemesanan</th>
                                        <th colspan="3">Status</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Vendor</th>
                                        <th>No Vendor</th>
                                        <th>Alamat Vendor</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Harga Produk</th>
                                        <th>Status</th>
                                        <th>Tanggal Confirm Vendor</th>
                                        <th>Tanggal Pembayaran</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    @forelse ($rfqs as $r)
                                        <tr>
                                            <td>{{ $r->id }}</td>
                                            <td>{!! DNS1D::getBarcodeHTML($r->kode_rfq, 'C39', 0.8, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $r->kode_rfq }}</p>
                                            </td>
                                            <td>{{ $r->nama_vendor }}</td>
                                            <td>{{ $r->nohp }}</td>
                                            <td>{{ $r->alamat }}</td>
                                            <td>{{ $r->nama_bahan_baku }}</td>
                                            <td>Rp.@idr($r->harga)</td>

                                            @if ($r->nama_bahan_baku == 'Benang')
                                                <td>{{ $r->quantity }} <small>Yard</small></td>
                                            @elseif ($r->nama_bahan_baku == 'Kain')
                                                <td>{{ $r->quantity }} <small>Kg</small></td>
                                            @endif

                                            <td>Rp.@idr($r->total)</td>
                                            <td>{{ $r->tgl_pesan }}</td>

                                            @if ($r->status == 1)
                                                <td><span class="badge bg-danger">RFQ</span></td>
                                            @elseif ($r->status == 2)
                                                <td><span class="badge bg-warning">Purchase Order</span></td>
                                            @elseif ($r->status == 3)
                                                <td><span class="badge bg-gray-900">Nothing To Bill</span></td>
                                            @elseif ($r->status == 4)
                                                <td><span class="badge bg-success">Fully Billed</span></td>
                                            @endif

                                            <td>{{ $r->tgl_confirm_vendor }}</td>
                                            <td>{{ $r->tgl_pembayaran }}</td>
                                            <td>
                                                <a href="{{ route('rfq.cetak', $r->id) }}" class="btn btn-warning"><i
                                                        class="fa fa-print"></i> Cetak</a>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="14" class="text-center">
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
