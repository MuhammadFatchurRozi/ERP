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
                    <li class="active">Data Vendor Bill</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Data Vendor Bill</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeIn">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <form class="form-inline" action="{{ route('accounting.create') }}" method="GET">
                                <div class="form-group input-group-sm">
                                    <select name="cetak" id="cetak" class="form-control input-lg">
                                        <option disabled selected>---PILIH---</option>
                                        @forelse ($accounting_vendor->unique('to_accounting') as $av)
                                            <option value="{{ $av->to_accounting }}">{{ $av->to_accounting }}</option>
                                        @empty
                                            <option disabled>Data Accounting Kosong </option>
                                        @endforelse
                                    </select>
                                    @if ($accounting_vendor == null)
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
                        <div class="table-responsive">
                            <table class="table table-bordered table-striped table-hover">
                                <thead class="text-center" style="vertical-align:middle;">
                                    <tr>
                                        <th rowspan="2">No</th>
                                        <th rowspan="2">Kode Vendor Bill</th>
                                        <th colspan="3">Data Vendor</th>
                                        <th colspan="2">Data Bahan Baku</th>
                                        <th rowspan="2">Quantity</th>
                                        <th rowspan="2">Total Harga</th>
                                        <th rowspan="2">Tanggal Pemesanan</th>
                                        <th rowspan="2">Tanggal Pembayaran</th>
                                        <th rowspan="2">Status</th>
                                        <th rowspan="2">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Vendor</th>
                                        <th>No Vendor</th>
                                        <th>Alamat Vendor</th>
                                        <th>Nama Bahan Baku</th>
                                        <th>Harga Bahan Baku</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($accounting_vendor as $av)
                                        <tr>
                                            <td>{{ $av->id }}</td>
                                            <td>{!! DNS1D::getBarcodeHTML($av->kode_vendor_customer, 'C39', 0.8, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $av->kode_vendor_customer }}
                                                </p>
                                            </td>
                                            <td>{{ $av->nama_vendor }}</td>
                                            <td>{{ $av->nohp }}</td>
                                            <td>{{ $av->alamat }}</td>
                                            <td>{{ $av->nama_bahan_baku }}</td>
                                            <td>Rp.@idr($av->harga)</td>

                                            @if ($av->nama_bahan_baku == 'Benang')
                                                <td>{{ $av->quantity }} <small>Yard</small></td>
                                            @elseif ($av->nama_bahan_baku == 'Kain')
                                                <td>{{ $av->quantity }} <small>Kg</small></td>
                                            @endif

                                            <td>Rp.@idr($av->total)</td>
                                            <td>{{ $av->tgl_pesanan }}</td>
                                            <td><span class="badge bg-success">{{ $av->tgl_pembayaran }}</span></td>
                                            <td><span class="badge bg-success">{{ $av->status }}</span></td>
                                            <td>
                                                <a href="#" class="btn btn-sm btn-warning"><i class="fa fa-print"></i>
                                                    Cetak</a>
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
                    <p class="back-link">ERP Bahan Bakusi Kaos Polos 2022</a></p>
                </div>
                {{-- </form> --}}
            </div>
        </div>
    </div>
@endsection
