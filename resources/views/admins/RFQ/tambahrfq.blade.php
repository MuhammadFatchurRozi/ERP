@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="wowfadeInLeft">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <ol class="breadcrumb">
                    <li><a href="{{ route('home') }}">
                            <em class="fa fa-home"></em>
                        </a></li>
                    <li class="breadcrumb-item"><a href="{{ route('rfq.index') }}"> Request For Quotation</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Tambah Data RFQ</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Tambah Data RFQ</h2>
                    <p class="wkt">Company : Kaos Polos Production</p>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <div class="row">
                <form class="needs-validation" method="post" action="{{ route('rfq.store') }} ">
                    @csrf
                    <h5 class="card-header">Bahan Baku</h5>
                    <div class="form-row" style="text-align: center">
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="id">Pilih Bahan Baku</label>
                            <select name="id" id="id" class="form-control input-lg dynamic"
                                data-dependent="nama_bahan_baku" data-dynamic="harga" data-dynamic1="nama_vendor"
                                data-dynamic2="alamat" data-dynamic3="no_telp">
                                <option disabled selected>---- Pilih Bahan Baku ----</option>
                                @foreach ($vendors as $v)
                                    <option value="{{ $v->id }}">{{ $v->nama_bahan_baku }} || {{ $v->harga }} ||
                                        {{ $v->nama_vendor }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="nama_bahan_baku">Nama Bahan Baku</label>
                            <select type="text" class="form-control dd" id="nama_bahan_baku" name="nama_bahan_baku"
                                readonly="readonly">
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="harga">Harga/<small>pcs</small></label>
                            <select type="text" class="form-control dd" id="harga" placeholder="" name="harga"
                                onchange="total_harga();" readonly="readonly"></select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="quantity">Quantity</label>
                            <input type="text" class="form-control" id="quantity" placeholder="" name="quantity"
                                onchange="total_harga();" required>
                        </div>
                        <div class="col-md-4 mb-4 input-group-sm">
                            <label for="total">Total</label>
                            <input type="text" class="form-control" onchange="total_harga();" id="total"
                                placeholder="" name="total" required readonly>
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <h5 class="card-header">Informasi Vendor</h5>
                        <div class="col-md-4 mb-4 input-group-sm">
                            <label for="nama_vendor">Nama Vendor</label>
                            <select type="text" class="form-control dd" id="nama_vendor" placeholder=""
                                name="nama_vendor" readonly="readonly"></select>
                        </div>
                        <div class="col-md-4 mb-4 input-group-sm">
                            <label for="Alamat">Alamat</label>
                            <select type="text" class="form-control dd" id="alamat" placeholder="" name="alamat"
                                readonly="readonly"></select>
                        </div>
                        <div class="col-md-4 mb-4 input-group-sm">
                            <label for="no_telp">No Telpon</label>
                            <select type="text" class="form-control dd" id="no_telp" placeholder="" name="no_telp"
                                readonly="readonly"></select>
                        </div>
                    </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    </br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
            </div>
            </form>
        </div>
        <div class="col-sm-12">
            <br>
            <p class="back-link">ERP Produksi Kaos Polos 2022</p>
        </div>
    </div>
    {{-- <script>
        var dt = new Date();
        document.getElementById("waktu").innerHTML = (("0" + (dt.getMonth() + 1)).slice(-2)) +
            "/" + (("0" + dt.getDate()).slice(-2)) + "/" + (dt.getFullYear()) + " " + dt.toLocaleTimeString();
    </script> --}}

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Ajax Total Harga --}}
    <script>
        function total_harga() {
            var quantity = document.getElementById("quantity").value;
            var harga = document.getElementById("harga").value;
            var total = parseFloat(quantity) * parseFloat(harga);
            if (!isNaN(total)) {
                document.getElementById("total").value = total;
            } else {
                document.getElementById("total").value = harga;
            }
        }
    </script>

    {{-- Ajax for Nama Produk --}}
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dependent = $(this).data('dependent');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('rfq.dependent') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dependent: dependent
                        },
                        success: function(result) {
                            $('#' + dependent).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#nama_bahan_baku').val('');
            });
        });
    </script>

    {{-- Ajax for harga produk --}}
    <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic = $(this).data('dynamic');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('rfq.fetch1') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dynamic: dynamic
                        },
                        success: function(result) {
                            $('#' + dynamic).html(result);
                        }
                    })
                }
            });

            $('#id').change(function() {
                $('#harga').val('');
            });
        });
    </script>

    {{-- Ajax for Nama Vendor --}}
    <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic1 = $(this).data('dynamic1');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('rfq.fetch2') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dynamic1: dynamic1
                        },
                        success: function(result) {
                            $('#' + dynamic1).html(result);
                        }
                    })
                }
            });

            $('#id').change(function() {
                $('#nama_vendor').val('');
            });
        });
    </script>

    {{-- Ajax for Alamat Vendor --}}
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic2 = $(this).data('dynamic2');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('rfq.fetch3') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dynamic2: dynamic2
                        },
                        success: function(result) {
                            $('#' + dynamic2).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#alamat').val('');
            });
        });
    </script>

    {{-- Ajax for No_Telp Vendor --}}
    <script>
        $(document).ready(function() {

            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic3 = $(this).data('dynamic3');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('rfq.fetch4') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            dynamic3: dynamic3
                        },
                        success: function(result) {
                            $('#' + dynamic3).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#no_telp').val('');
            });
        });
    </script>
@endsection
