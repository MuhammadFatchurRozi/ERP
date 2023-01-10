<!DOCTYPE html>
<html lang="en">

<body>
    <!-- partial:index.partial.html -->
    <!DOCTYPE html>
    <html>

    <head>
        <meta charset="UTF-8">
        <title>Report Page - {{ $accounting_customer->to_accounting }}</title>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />
        <style>
            @page {
                size: 280mm 160mm;
            }

            @media print {
                .cetak {
                    visibility: hidden;
                }

                .badge {
                    border: none;
                }

                body {
                    margin-bottom: 0;
                }
            }

            * {
                box-sizing: border-box;
            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #ddd;
                padding: 10px;
                word-break: break-all;
            }

            body {
                font-family: Arial, Helvetica, sans-serif;
                margin: 0;
                padding: 0;
                font-size: 16px;
            }

            .h4-14 h4 {
                font-size: 12px;
                margin-top: 0;
                margin-bottom: 5px;
            }

            .img {
                margin-left: "auto";
                margin-top: "auto";
                height: 30px;
            }

            pre,
            p {
                /* width: 99%; */
                /* overflow: auto; */
                /* bpicklist: 1px solid #aaa; */
                padding: 0;
                margin: 0;
            }

            table {
                font-family: arial, sans-serif;
                width: 100%;
                border-collapse: collapse;
                padding: 1px;
            }

            .hm-p p {
                text-align: left;
                padding: 1px;
                padding: 5px 4px;
            }

            td,
            th {
                text-align: left;
                padding: 8px 6px;
            }

            .table-b td,
            .table-b th {
                border: 1px solid #ddd;
            }

            th {
                /* background-color: #ddd; */
            }

            .hm-p td,
            .hm-p th {
                padding: 3px 0px;
            }

            .cropped {
                float: right;
                margin-bottom: 20px;
                height: 100px;
                /* height of container */
                overflow: hidden;
            }

            .cropped img {
                width: 400px;
                margin: 8px 0px 0px 80px;
            }

            .main-pd-wrapper {
                box-shadow: 0 0 10px #ddd;
                background-color: #fff;
                border-radius: 10px;
                padding: 15px;
            }

            .table-bordered td,
            .table-bordered th {
                border: 1px solid #ddd;
                padding: 10px;
                font-size: 14px;
            }
        </style>
    </head>

    <body>
        <section class="main-pd-wrapper" style="width: 1000px; margin: auto">
            <div style="display: table-header-group">
                <h4 style="text-align: center; margin: 0">
                    <b>ERP Kaos Polos</b>
                </h4>
            </div>
            <table class="table table-bordered h4-14" style="width: 100%; -fs-table-paginate: paginate; margin-top: 15px">
                <thead style="display: table-header-group">
                    <tr style="margin: 0; padding: 15px; padding-left: 20px; border: none;">
                        <td colspan="4">
                            <h3>
                                Report
                                <span style=" font-weight: 300; font-size: 85%; color: #626262; margin-left: 5px;">
                                    Order Date: {{ $accounting_customer->to_accounting }}
                                </span>
                                <p style=" font-weight: 300; font-size: 85%; color: #626262; margin-top: 7px;">
                                    Status:
                                    <span style="color: #00bb07">{{ $accounting_customer->status }}</span><br />
                                </p>
                            </h3>
                        </td>
                    </tr>

                    <tr>
                        <th rowspan="2">No</th>
                        <th rowspan="2">Kode Invoice</th>
                        <th colspan="3">Data Costumer</th>
                        <th colspan="3">Data Produk</th>
                        <th rowspan="2">Quantity</th>
                        <th rowspan="2">Total Harga</th>
                        <th rowspan="2">Tanggal Pemesanan</th>
                        <th rowspan="2">Tanggal Pembayaran</th>
                    </tr>
                    <tr>
                        <th>Nama Costumer</th>
                        <th>Alamat</th>
                        <th>No. Telp</th>
                        <th>Nama Produk</th>
                        <th>Ukuran Produk</th>
                        <th>Harga Produk</th>
                    </tr>
                </thead>
                <tbody>
                        <tr>
                            <td>{{ $accounting_customer->id }}</td>
                            <td>{!! DNS1D::getBarcodeSVG($accounting_customer->kode_accounting_customer, 'C39', 0.4, 40) !!}
                            </td>
                            <td>{{ $accounting_customer->name }}</td>
                            <td>{{ $accounting_customer->address }}</td>
                            <td>{{ $accounting_customer->phone }}</td>
                            <td>{{ $accounting_customer->nama_produk }}</td>
                            <td>{{ $accounting_customer->ukuran }}</td>
                            <td>Rp.@idr($accounting_customer->harga)</td>
                            <td>{{ $accounting_customer->quantity }}</td>
                            <td>Rp.@idr($accounting_customer->total)</td>
                            <td><span class="badge bg-success">{{ $accounting_customer->tgl_pemesanan }}</span>
                            </td>
                            <td><span class="badge bg-success">{{ $accounting_customer->tgl_pembayaran }}</span>
                            </td>
                        </tr>

                </tbody>
                <tfoot></tfoot>
            </table>

            <table class="hm-p table-bordered" style="width: 100%; margin-top: 20px">
                <table class="hm-p table-bordered">
                    <tr style="background: #fcbd02">
                        <th>Total Order Value</th>
                        <td style="width: 120px; text-align: right; border-right: none">
                            <b>Rp.@idr($accounting_customer->total)</b>
                        </td>
                        <td colspan="5" style="border-left: none"></td>
                    </tr>
                </table>
            </table>
            <table style="width: 100%" cellspacing="0" cellspadding="0" border="0">
                <tr>
                    <td>
                        <h4 style="margin: 10px 0">
                            Thank you for your Business.
                        </h4>
                    </td>
                    <td>
                        <h4 style="margin: 0; text-align: right">
                            <div class="action-buttons">
                                <a class="cetak" onclick="window.print();" href="#"
                                    style="text-decoration: none">
                                    <i class="fa fa-print "></i>
                                    Print
                                </a>
                                <a class="cetak" href="#" onclick="history.back()" style="text-decoration: none">
                                    <i class="fa fa-backward"></i>
                                    Back
                                </a>
                            </div>
                        </h4>
                    </td>
                </tr>
            </table>
        </section>
    </body>

    </html>
    <!-- partial -->

</body>

</html>
