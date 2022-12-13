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
                    <li class="breadcrumb-item"><a href="{{ route('quotation.index') }}"> Quotation</a></li>
                    <li class="breadcrumb-item active" aria-current="page"> Tambah Quotation</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Tambah Quotation</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>
    <div class="wow fadeInRight">
        <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
            <form class="needs-validation" method="post" action="{{ route('quotation.store') }} ">
                @csrf
                <div class="row">
                    <h5 class="card-header">Data Costumer</h5>
                    <div class="form-row" style="text-align: center">
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="id">Nama</label>
                            <select name="id_costumer" id="id" class="form-control input-lg costumer"
                                data-costumer1="phone" data-costumer2="address">
                                required>
                                <option disabled selected>---PILIH---</option>
                                @forelse ($costumers as $costumer)
                                    <option value="{{ $costumer->id }}">{{ $costumer->id }}. {{ $costumer->name }}</option>
                                @empty
                                    <option disabled>Data Costumer Kosong </option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="phone">Nomor HP</label>
                            <select type="number" class="form-control input-lg" id="phone" name="phone" readonly
                                required>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="address">Alamat</label>
                            <select type="area" class="form-control" id="address" name="address" readonly required>
                            </select>
                        </div>
                        <br> <br> <br>
                        <h5 class="card-header">Pemesanan</h5>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="id">Nama Produk</label>
                            <select name="id_produk" id="id" class="form-control input-lg product"
                                data-product1="ukuran" data-product2="harga" data-product3="stok">
                                required>
                                <option disabled selected>---PILIH---</option>
                                @forelse ($products as $product)
                                    <option value="{{ $product->id }}">{{ $product->id }}. {{ $product->nama }} -
                                        {{ $product->ukuran }}
                                    </option>
                                @empty
                                    <option disabled>Data Produk Kosong </option>
                                @endforelse
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="ukurna">Ukuran</label>
                            <select type="text" class="form-control" id="ukuran" name="ukuran" required readonly>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="harga">Harga</label>
                            <select type="text" class="form-control" id="harga" name="harga" required readonly>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="stok">Stok</label>
                            <select type="text" class="form-control" id="stok" name="stok" required readonly>
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="quantity">Quantity</label>
                            <input type="number" class="form-control" id="quantity" name="quantity"
                                onchange="total_harga();" required>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="total">Total Harga</label>
                            <input type="text" class="form-control" id="total" name="total"
                                onchange="total_harga();" required readonly>
                        </div>
                    </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4 mb-3">
                        </br>
                        <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan
                            Data</button>
                    </div>
                </div>
            </form>
        </div>
        <div class="col-sm-12">
            <br>
            <p class="back-link">ERP Produksi Kaos Polos 2022</p>
        </div>
    </div>

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

    {{-- Ajax for Costumer --}}
    <script>
        // Ajax for phone
        $(document).ready(function() {

            $('.costumer').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var costumer1 = $(this).data('costumer1');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('quotation.costumer1') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            costumer1: costumer1
                        },
                        success: function(result) {
                            $('#' + costumer1).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#phone').val('');
            });
        });

        // Ajax for address
        $(document).ready(function() {

            $('.costumer').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var costumer2 = $(this).data('costumer2');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('quotation.costumer2') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            costumer2: costumer2
                        },
                        success: function(result) {
                            $('#' + costumer2).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#address').val('');
            });
        });
    </script>

    {{-- Ajax for Nama Produk --}}
    <script>
        // Ajax for Ukuran
        $(document).ready(function() {

            $('.product').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var product1 = $(this).data('product1');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('quotation.product1') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            product1: product1
                        },
                        success: function(result) {
                            $('#' + product1).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#ukuran').val('');
            });
        });

        //Ajax for Harga
        $(document).ready(function() {

            $('.product').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var product2 = $(this).data('product2');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('quotation.product2') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            product2: product2
                        },
                        success: function(result) {
                            $('#' + product2).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#harga').val('');
            });
        });

        //Ajax for Stok
        $(document).ready(function() {

            $('.product').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var product3 = $(this).data('product3');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('quotation.product3') }}",
                        method: "POST",
                        data: {
                            select: select,
                            value: value,
                            _token: _token,
                            product3: product3
                        },
                        success: function(result) {
                            $('#' + product3).html(result);
                        }

                    })
                }
            });
            $('#id').change(function() {
                $('#stok').val('');
            });
        });
    </script>
@endsection
