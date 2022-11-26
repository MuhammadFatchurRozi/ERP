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
                <li class="breadcrumb-item"><a href="{{ route('datavendor.index') }}"> Data vendor</a></li>
                <li class="breadcrumb-item active" aria-current="page"> Confirm Data Vendor</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Confirm Data Vendor</h2>
            </div>
        </div>
    </div>
    <!--/.main-->
</div>
<div class="wow fadeInRight">
    <div class="col-sm-9 col-sm-offset-3 col-lg-10 col-lg-offset-2 main">
        <div class="row">
            {{-- <form id="formAccountSettings" method="POST" action="{{ route('datavendor.update', $vendors->id) }}"
            enctype="multipart/form-data">
            @csrf
            @method('PUT') --}}
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
                                    <th rowspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Nama Vendor</th>
                                    <th>No Vendor</th>
                                    <th>Alamat Vendor</th>
                                    <th>Nama Produk</th>
                                    <th>Harga Produk</th>
                                </tr>
                            </thead>
                            <tbody class="text-center" style="vertical-align:middle;">
                                <?php $no = 1; ?>
                                @forelse ($confirm as $r)
                                <tr>
                                    <td>{{ $no++ }}</td>
                                    <td>{!! DNS1D::getBarcodeHTML($r->kode_rfq, 'C39', 0.8, 30) !!}
                                        <p style="font-size: 10px; margin-top: 5px;">
                                            {{ $r->kode_rfq }}
                                        </p>
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
                                    <td>
                                        {{-- <button type="submit" class="btn btn-primary me-2">Konfirmasi
                                                Order</button> --}}
                                        <a href="{{ route('confirm.konfirmasi', ['id' => $r->id, 'kode_rfq' => $r->kode_rfq]) }}" class="btn btn-success me-2"><i class="fa fa-check" aria-hidden="true"></i> Konfirmasi
                                            Order</a>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="11" class="text-center">
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
            {{-- </form> --}}
        </div>
    </div>
</div>
{{-- <script src="https://code.jquery.com/jquery-1.12.4.js" integrity="sha256-Qw82+bXyGq6MydymqBxNPYTaUXXq7c8v3CwiYwLLNXU="
        crossorigin="anonymous"></script>

    <script>
        $(document).ready(function() {

            search();

            function search(query = '') {
                $.ajax({
                    url: "{{ route('datavendor.action') }}",
method: 'GET',
data: {
query: query
},
dataType: 'json',
success: function(data) {
$('.tbody').html(data.table_data);
}
})
}

$(document).on('change', '.search', function() {
var query = $(this).val();
search(query);
});
});
</script> --}}
@endsection