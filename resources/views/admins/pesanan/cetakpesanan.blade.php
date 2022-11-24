<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Cetak Halaman - Kaos Polos-{{ $pesanans->nama }}-{{ $pesanans->ukuran }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <link rel="stylesheet" media="print" href="{{ asset('style/css/bootstrap.css') }}" />

    <link rel="stylesheet" media="screen" href="{{ asset('style/css/bootstrap.css') }}" />

    <style>
        @page {
            size: 140mm 110mm;
            margin: 0;
        }

        @media print {
            body {
                -webkit-print-color-adjust: exact !important;
            }
        }

        @media print {
            .cetak {
                display: none;
            }

            .well {
                min-height: 20px;
                padding: 19px;
                margin-bottom: 20px;
                background-color: #f5f5f5 !important;
                border: 1px solid #e3e3e3;
                border-radius: 4px;
                -webkit-box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
                box-shadow: inset 0 1px 1px rgb(0 0 0 / 5%);
            }

            .label-danger {
                background-color: #d9534f !important;
            }

            .label {
                color: #fff !important;
                border-radius: 0.25em !important;
                border: none !important;
            }

            html,
            body {
                width: 210mm;
                height: auto;
            }


            .invoice {
                margin: 0;
                border: initial;
                border-radius: initial;
                width: initial;
                min-height: auto;
                background: initial;
                page-break-after: always;
            }
        }
    </style>
</head>

<body>
    <div class="container bootdey">
        <div class="row invoice row-printable">
            <div class="col-md-10">
                <!-- col-lg-12 start here -->
                <div class="panel panel-default plain" id="dash_0">
                    <!-- Start .panel -->
                    <div class="panel-body p30">
                        <div class="row">
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-6 start here -->
                                <div class="invoice-from">
                                    <ul class="list-unstyled text-right">
                                        <li>ERP Kaos Polos</li>
                                        <li>ITN Malang 2022</li>
                                    </ul>
                                </div>
                            </div>
                            <!-- col-lg-6 end here -->
                            <div class="col-lg-12">
                                <!-- col-lg-12 start here -->
                                <div class="invoice-details mt25">
                                    <div class="well">
                                        <ul class="list-unstyled mb0">
                                            <li><strong>Invoice</strong>
                                                <span style="font-size: 10px;">
                                                </span> <br>
                                                <td>{!! DNS1D::getBarcodeSVG($pesanans->kode_pesanan, 'C39', 1, 35) !!}
                                                </td>
                                                {{-- <td>{!! DNS1D::getBarcodeHTML($pesanans->kode_pesanan, 'C39', 0.8, 30) !!}
                                                    <p style="font-size: 10px; margin-top: 5px;">
                                                        {{ $pesanans->kode_pesanan }}</p>
                                                </td> --}}
                                            </li>
                                            <li><strong>Tanggal Pemesanan:</strong>
                                                {{ date('l, j F Y, H:i A', strtotime($pesanans->tgl_pesan)) }}</li>
                                            <li><strong>Estimasi Jadi:</strong>
                                                {{ date('l, j F Y, H:i A', strtotime($pesanans->estimasi)) }}</li>
                                            <li><strong>Status:</strong>
                                                @if ($pesanans->status == 0)
                                                    <td><span class="label label-danger">Belum Diproses</span></td>
                                                @elseif ($pesanans->status == 1)
                                                    <td><span class="label label-success">Sudah Diproses</span></td>
                                                @endif
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="invoice-to mt25">
                                    <ul class="list-unstyled">
                                        <li><strong>Invoiced To</strong></li>
                                        <li>{{ $pesanans->nama_pemesan }}</li>
                                        <li>{{ $pesanans->alamat_pemesan }}</li>
                                        <li>{{ $pesanans->no_pemesan }}</li>
                                    </ul>
                                </div>
                                <div class="invoice-items">
                                    <div class="table-responsive" style="overflow: hidden; outline: none;"
                                        tabindex="0">
                                        <table class="table table-bordered">
                                            <thead>
                                                <tr>
                                                    <th class="per70 text-center">Description</th>
                                                    <th class="per5 text-center">Quantity/<small
                                                            style="font-size: 9px; font-weight: 900;">Lusin</small></th>
                                                    <th class="per25 text-center">Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>Kaos Polos - {{ $pesanans->nama }} - {{ $pesanans->ukuran }}
                                                        ({{ $pesanans->tgl_pesan }})
                                                    </td>
                                                    <td class="text-center">{{ $pesanans->jumlah }} <small
                                                            style="font-size: 9px; font-weight: 900;">Lusin</small></td>
                                                    <td class="text-center">Rp. @idr($pesanans->total)</td>
                                                </tr>
                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th colspan="2" class="text-right">Sub Total:</th>
                                                    <th class="text-center">Rp. @idr($pesanans->total)</th>
                                                </tr>
                                                <tr>
                                                    <th colspan="2" class="text-right">Total:</th>
                                                    <th class="text-center">Rp. @idr($pesanans->total)</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                </div>
                                <div class="invoice-footer mt25">
                                    <p class="text-center">ERP PRODUKSI KAOS POLOS 2022 <br> <br>
                                        <a onclick="window.print()" class="btn btn-default ml15 cetak"><i
                                                class="fa fa-print mr5"></i>
                                            Print</a>
                                    </p>
                                </div>
                            </div>
                            <!-- col-lg-12 end here -->
                        </div>
                        <!-- End .row -->
                    </div>
                </div>
                <!-- End .panel -->
            </div>
            <!-- col-lg-12 end here -->
        </div>
    </div>

    <style type="text/css">
        body {
            margin-top: 10px;
            background: #eee;
        }
    </style>

    <script type="text/javascript"></script>

</body>

</html>
