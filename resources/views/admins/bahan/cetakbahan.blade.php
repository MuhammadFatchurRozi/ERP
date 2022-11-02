<!DOCTYPE html>
<html>

<head>
    <title>Laporan</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>ERP</title>
    <link href="{{ asset('style/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/font-awesome.min.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/datepicker3.css') }}" rel="stylesheet">
    <link href="{{ asset('style/css/styles.css') }}" rel="stylesheet">

    <!--Custom Font-->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">
</head>

<body>
    <style type="text/css">
        table tr td,
        table tr th {
            font-size: 9pt;
        }
    </style>
    <center>
        <h5>Laporan Ketersediaan Bahan Baku</h5>
    </center>
    <div class="table-responsive">
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kode Bahan</th>
                    <th>Bahan</th>
                    <th>Ketersediaan</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($bahans as $bahan)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{$p->nama}}</td>
                    <td>{{$p->email}}</td>
                    <td>{{$p->alamat}}</td>
                    <td>{{$p->telepon}}</td>
                    <td>{{$p->pekerjaan}}</td>
                </tr>
                @endforeach
                <tr>
                    <td>{{ $bahan->id }} </td>
                    <td>{{ $bahan->kode }} </td>
                    <td>{{ $bahan->bahan }} </td>
                    <td>{{ $bahan->stok }} </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</body>

</html>