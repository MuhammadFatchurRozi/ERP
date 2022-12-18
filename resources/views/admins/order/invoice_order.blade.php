<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <!--  This file has been downloaded from bootdey.com @bootdey on twitter -->
    <!--  All snippets are MIT license http://bootdey.com/license -->
    <title>INV-{{ $orders->kode_order }} </title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.0/dist/js/bootstrap.bundle.min.js"></script>
</head>

<body>
    @include('sweetalert::alert')
    <div class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">
                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                        <div class="custom-actions-btns mb-5">
                                            @if ($orders->last_paid == null)
                                                <a href="{{ route('order.posted', Crypt::encrypt($orders->id)) }}"
                                                    class="btn btn-primary">
                                                    <i class="icon-download"></i> Posted
                                                </a>
                                            @else
                                                <button class="btn btn-primary" disabled>
                                                    <i class="icon-download"></i> Posted Done
                                                </button>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="index.html" class="invoice-logo">
                                            Kaos Polos ERP
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <address class="text-right">
                                            Kelompok ERP.<br>
                                            ITN Malang.<br>
                                            Ehe
                                        </address>
                                    </div>
                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                {{ $orders->name }} <br>
                                                {{ $orders->address }} <br>
                                                {{ $orders->phone }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
                                                <div>Invoice - #{{ $orders->kode_order }}</div>
                                                <div>
                                                    {{ \Carbon\Carbon::parse($orders->tgl_pemesanan)->isoFormat('MMMM Do') }}
                                                </div>
                                                <div>
                                                    {{ \Carbon\Carbon::parse($orders->tgl_pemesanan)->isoFormat('YYYY') }}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-body">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Items</th>
                                                        <th>Product ID</th>
                                                        <th>Quantity</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <tr>
                                                        <td>
                                                            Kaos Polos{{ $orders->nama_produk }}
                                                            <p class="m-0 text-muted">
                                                                {{ $orders->ukuran }}
                                                                Rp.@idr($orders->harga)
                                                            </p>
                                                        </td>
                                                        <td>#{{ $match_products->kode }}</td>
                                                        <td>{{ $orders->quantity }}</td>
                                                        <td>Rp.@idr($orders->total)</td>
                                                    </tr>
                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td>&nbsp;</td>
                                                        <td>
                                                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                        </td>
                                                        <td>
                                                            <h5 class="text-success">
                                                                <strong>Rp.@idr($orders->total)</strong>
                                                            </h5>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-footer">
                                Thank you for your Business.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <style type="text/css">
        body {
            margin: 0;
            padding: 0;
            font: 400 .875rem 'Open Sans', sans-serif;
            color: #bcd0f7;
            background: #1A233A;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #bcd0f7;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #8a99b5;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #1a233a;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #272e48;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #8a99b5;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #1a233a;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }

        .card {
            background: #272E48;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .custom-table {
            border: 1px solid #2b3958;
        }

        .custom-table thead {
            background: #2f71c1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #172033;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #1a243a;
        }

        .custom-table>tbody td {
            border: 1px solid #2e3d5f;
        }

        .table {
            background: #1a243a;
            color: #bcd0f7;
            font-size: .75rem;
        }

        .text-success {
            color: #c0d64a !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
        }
    </style>

    <script type="text/javascript"></script>
</body>

</html>
