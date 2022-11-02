@extends('layouts.main')
@section('container')
    @include('sweetalert::alert')
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <ol class="breadcrumb">
                <li><a href="{{ route('home') }}">
                        <em class="fa fa-home"></em>
                    </a></li>
                <li class="breadcrumb-item"><a href="{{ route('bom.index') }}"> Detail BoM</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Tambah BoM</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Tambah BoM</h2>
            </div>
        </div>
    </div>
    <!--/.main-->

    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            <form class="needs-validation" method="post" action="{{ route('bom.store') }} ">
                @csrf
                <h5 class="card-header">Product</h5>
                <div class="form-row" style="text-align: center">
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="kode">kode Produk</label>
                        <select name="kode" id="kode" class="form-control input-lg dynamic" data-dependent="nama"
                            data-dynamic="ukuran" required>
                            <option disabled selected>---PILIH---</option>
                            @foreach ($products as $p)
                                <option value="{{ $p->kode }}">{{ $p->kode }} ||
                                    {{ $p->nama }}</option>
                            @endforeach
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
                    <br>
                    <br>
                    <br>
                    <h5 class="card-header">Bahan Baku</h5>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">Kain</label>
                        <input type="text" class="form-control" id="harga" placeholder="" name="kain" required>
                    </div>
                    <div class="col-md-3 mb-3 input-group-sm">
                        <label for="harga">benang</label>
                        <input type="text" class="form-control" id="harga" placeholder="" name="benang" required>
                    </div>
                </div>

        </div>
        <div class="form-row">
            <div class="form-group col-md-4 mb-3">
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

    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>

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
                        url: "{{ route('bom.fetch') }}",
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

            $('#kode').change(function() {
                $('#nama').val('');
            });
        });
    </script>

    {{-- Ajax for table jabatan --}}
    {{-- <script>
        $(document).ready(function() {
            $('.dynamic').change(function() {
                if ($(this).val() != '') {
                    var select = $(this).attr("id");
                    var value = $(this).val();
                    var dynamic = $(this).data('dynamic');
                    var _token = $('input[name="_token"]').val();
                    $.ajax({
                        url: "{{ route('bom.fetch1') }}",
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

            $('#kode').change(function() {
                $('#ukuran').val('');
            });
        });
    </script> --}}
@endsection
