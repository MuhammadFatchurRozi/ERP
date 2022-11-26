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
                <li class="active">Data Vendor</li>
            </ol>
        </div>
        <!--/.row-->

        <div class="row">
            <div class="col-lg-12">
                <h2 class="page-header">Data Vendor</h2>
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
                                <input class="form-control search" id="search" type="text" placeholder="Pencarian.." name="search">
                            </div>
                            <div class="form-group">
                                <a type="button" class="btn btn-danger" href="{{ route('datavendor.create') }}"><i class="fa fa-plus"></i> Tambah</a>
                                <a type="button" class="btn btn-primary" href="{{ route('rfq.create') }}"><i class="fa fa-plus"></i> Order Bahan Baku</a>
                            </div>
                        </form>
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover">
                            <thead class="text-center" style="vertical-align:middle;">
                                <tr>
                                    <th rowspan="2">No</th>
                                    <th rowspan="2">Kode Vendor</th>
                                    <th rowspan="2">Nama Bahan Baku</th>
                                    <th colspan="3">Informasi Vendor</th>
                                    <th rowspan="2">Harga<small>Per pcs</small></th>
                                    <th rowspan="2">Status</th>
                                    <th rowspan="2">Request Order</th>
                                    <th colspan="2">Action</th>
                                </tr>
                                <tr>
                                    <th>Nama Vendor</th>
                                    <th>No.Hp</th>
                                    <th>Alamat</th>
                                    <th>Jumlah Request Order</th>
                                    <th>Edit Delete</th>
                                </tr>
                            </thead>
                            <tbody class="text-center tbody" style="vertical-align:middle;">
                                @forelse ($vendors as $v)
                                <tr>
                                    <td>{{ $v->id }}</td>
                                    <td style="height:auto; width:200px">#{{ $v->kode_vendor }}</td>
                                    {{-- <td>{{ $v->code }}</td> --}}
                                    <td>{{ $v->nama_bahan_baku }}</td>
                                    <td>{{ $v->nama_vendor }}</td>
                                    <td>{{ $v->no_telp }}</td>
                                    <td>{{ $v->alamat }}</td>
                                    <td>Rp. @idr($v->harga)</td>

                                    @if ($v->status == 'aktif')
                                    <td><span class="badge bg-success">Aktif</span></td>
                                    @elseif ($v->status == 'nonaktif')
                                    <td><span class="badge bg-danger">Tidak Aktif</span></td>
                                    @endif

                                    @if ($v->count_confirm_order == 0)
                                    <td><span class="badge bg-danger">Belum Ada Order</span></td>
                                    @else
                                    <td><span class="badge bg-gray-300">{{ $v->count_confirm_order }}</span>
                                    </td>
                                    @endif

                                    <td>
                                        @if ($v->status == 'aktif')
                                        <a href="{{ route('confirm.show', $v->id) }} " class=" btn btn-sm btn-info">Check Order</a>
                                        @elseif ($v->status == 'nonaktif')
                                        <button class=" btn btn-sm btn-info" disabled>Check Order</button>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="action">
                                            <a href="{{ route('datavendor.edit', $v->id) }} " class="action btn btn-sm btn-warning"><i class="fa fa-pencil"></i></a>
                                            <form action="{{ route('datavendor.destroy', $v->id) }} " method="POST" class="d-inline">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="action btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus data ini?')">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">
                                        Data Kosong
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