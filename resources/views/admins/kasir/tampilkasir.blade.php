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
                    <li class="breadcrumb-item active" aria-current="page"> Pemesan</li>
                </ol>
            </div>
            <!--/.row-->

            <div class="row">
                <div class="col-lg-12">
                    <h2 class="page-header">Pemesan</h2>
                </div>
            </div>
        </div>
        <!--/.main-->
    </div>

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <div class="wow fadeInLeft">
                <form class="needs-validation" method="post" action="{{ route('kasir.store') }} ">
                    @csrf
                    <h5 class="card-header">Product</h5>
                    <div class="form-row" style="text-align: center">
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="id">Detail Product</label>
                            <select name="id" id="id" class="form-control input-lg dynamic" data-dynamic3="kode"
                                data-dynamic1="harga" data-dependent="nama" data-dynamic="ukuran" required>
                                <option disabled selected>---PILIH---</option>
                                @foreach ($products as $p)
                                    <option value="{{ $p->id }}">{{ $p->kode }} ||
                                        {{ $p->nama }} || {{ $p->ukuran }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="kode">Kode Produk</label>
                            <select name="kode" id="kode" class="form-control input-lg" readonly="readonly">
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="nama">Nama Produk</label>
                            <select name="nama" id="nama" class="form-control input-lg" readonly="readonly">
                            </select>
                        </div>
                        <div class="col-md-3 mb-3 input-group-sm">
                            <label for="ukuran">Ukuran</label>
                            <select name="ukuran" id="ukuran" class="form-control input-lg" readonly="readonly">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 mt-lg-5 input-group-sm">
                            <label for="harga">Harga</label>
                            <select name="harga" id="harga" class="form-control input-lg" readonly="readonly">
                            </select>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="jumlah">Jumlah/<small>lusin</small></label>
                            <input type="text" id="jumlah" name="jumlah" class="form-control input-lg"
                                onchange="lembur();">
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="total">Total Harga</label>
                            <input type="text" id="total" name="total" class="form-control input-lg"
                                onchange="lembur();" readonly="readonly">
                        </div>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                        <br>
                    </div>
                    <div class="wow fadeInRight">
                        <h5 class="card-header">Informasi Pemesan</h5>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="nama">Nama</label>
                            <input type="text" class="form-control" id="nama" placeholder="" name="nama_pemesan"
                                required>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="Alamat">Alamat</label>
                            <textarea type="area" class="form-control" id="alamat" placeholder="" name="alamat_pemesan" required></textarea>
                        </div>
                        <div class="col-md-4 mb-3 input-group-sm">
                            <label for="No.Hp">No.Hp</label>
                            <input type="text" class="form-control" id="NoHp" placeholder="" name="no_pemesan"
                                required>
                        </div>
                    </div>
            </div>

        </div>
        <div class="wow fadeInDown">
            <div class="form-row">
                <div class="form-group col-md-4 mb-3">
                    </br>
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan Data</button>
                </div>
            </div>
        </div>
        </form>
    </div>
    <div class="wow fadeInDown">
        <div class="col-sm-12">
            <br>
            <p class="back-link">ERP Produksi Kaos Polos 2022</p>
        </div>
    </div>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

    {{-- Ajax Total Harga --}}
    <script>
        function lembur() {
            var jumlah = document.getElementById("jumlah").value;
            var harga = document.getElementById("harga").value;
            var total = parseFloat(jumlah) * parseFloat(harga) * parseFloat(12) + parseFloat(5000);
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
                    var dynamic3 = $(this).data('dynamic3');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('kasir.dependent2') }}",
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
                $('#kode').val('');
            });
        });
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
                        url: "{{ route('kasir.dependent') }}",
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
                $('#nama').val('');
            });
        });
    </script>

    {{-- Ajax for table ukuran --}}
    <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic = $(this).data('dynamic');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('kasir.fetch1') }}",
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
                $('#ukuran').val('');
            });
        });
    </script>

    {{-- Ajax for table Harga --}}
    <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic1 = $(this).data('dynamic1');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('kasir.fetch2') }}",
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
                $('#harga').val('');
            });
        });
    </script>
@endsection
