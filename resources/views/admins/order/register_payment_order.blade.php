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
                    <li class="breadcrumb-item"><a href="{{ route('order.index') }}"> Sales Order</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Register Payment</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Register Payment</h2>
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
                                        <th colspan="5">Action</th>
                                    </tr>
                                    <tr>
                                        <th>Nama Costumer</th>
                                        <th>No Hp</th>
                                        <th>Alamat Costumer</th>
                                        <th>Nama Produk</th>
                                        <th>Ukuran Produk</th>
                                        <th>Harga Produk</th>
                                        <th>Register</th>
                                        <th>Confirm</th>
                                    </tr>
                                </thead>
                                <tbody class="text-center" style="vertical-align:middle;">
                                    <form action="{{ route('order.update', $orders->id) }} " method="post">
                                        @csrf
                                        @method('patch')
                                        <tr>
                                            <td>{{ $orders->id }}</td>
                                            <td>{!! DNS1D::getBarcodeHTML($orders->kode_order, 'C39', 0.6, 30) !!}
                                                <p style="font-size: 10px; margin-top: 5px;">
                                                    {{ $orders->kode_order }}</p>
                                            </td>
                                            <td>{{ $orders->name }}</td>
                                            <td>{{ $orders->address }}</td>
                                            <td>{{ $orders->phone }}</td>
                                            <td>{{ $orders->nama_produk }}</td>
                                            <td>{{ $orders->ukuran }}</td>
                                            <td>Rp.@idr($orders->harga) </td>
                                            <td>{{ $orders->quantity }}</td>
                                            <td>Rp.@idr($orders->total)</td>
                                            <td>{{ $orders->tgl_pemesanan }}</td>
                                            <td>
                                                <select name="lastpaid" id="lastpaid" class="form-control-range input"
                                                    required>
                                                    <option value="0" selected disabled>---- Silihkan Pilih ----
                                                    </option>
                                                    <option value="1">1 Hari</option>
                                                    <option value="2">2 Hari</option>
                                                    <option value="3">3 Hari</option>
                                                    <option value="4">4 Hari</option>
                                                    <option value="5">5 Hari</option>
                                                    <option value="6">6 Hari</option>
                                                    <option value="7">7 Hari</option>
                                                </select>
                                            </td>
                                            <td>
                                                <button id="btnSubmit" type="submit" class="btn btn-sm btn-info"
                                                    disabled>Confirm
                                                </button>
                                            </td>
                                        </tr>
                                    </form>
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

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script>
        window.onload = function() {
            document.getElementById("lastpaid").onchange = function() {
                if (this.options[this.selectedIndex].value == 0) {
                    document.getElementById("btnSubmit").disabled = true;
                } else {
                    document.getElementById("btnSubmit").disabled = false;
                }
            }
        }
    </script>
@endsection
