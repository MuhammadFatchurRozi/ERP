<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    @if ($rfqs->status == 1)
        <title>Cetak Halaman - {{ $rfqs->nama_bahan_baku }} - {{ $rfqs->tgl_pembayaran }}</title>
    @elseif ($rfqs->status == 2)
        <title>Cetak Halaman - {{ $rfqs->nama_bahan_baku }} - {{ $rfqs->tgl_pembayaran }}</title>
    @elseif ($rfqs->status == 3)
        <title>Cetak Halaman - {{ $rfqs->nama_bahan_baku }} - {{ $rfqs->tgl_pembayaran }}</title>
    @elseif ($rfqs->status == 4)
        <title>Cetak Halaman - {{ $rfqs->nama_bahan_baku }} - {{ $rfqs->tgl_pembayaran }}</title>
    @endif
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @page {
            size: 295mm 180mm;
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
    </style>
</head>

<body>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" />

    <div class="page-content container">
        <div class="page-header text-blue-d2">
            <h1 class="page-title text-secondary-d1">
                Invoice
                <small class="page-info">
                    <i class="fa fa-angle-double-right text-80"></i>
                    ID: #{{ $rfqs->kode_rfq }}
                </small>
            </h1>

            <div class="page-tools cetak">
                <div class="action-buttons">
                    <a onclick="window.print()" class="btn bg-white btn-light mx-1px text-95" href="#"
                        data-title="PDF">
                        <i class="mr-1 fa fa-file-pdf-o text-danger-m1 text-120 w-2"></i>
                        Print
                    </a>
                </div>
            </div>
        </div>

        <div class="container px-0">
            <div class="row mt-4">
                <div class="col-12 col-lg-12">
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center text-150">
                                <i class="fa fa-book fa-2x text-success-m2 mr-1"></i>
                                <span class="text-default-d3">ERP Kaos Polos</span>
                            </div>
                        </div>
                    </div>
                    <!-- .row -->

                    <hr class="row brc-default-l1 mx-n1 mb-4" />

                    <div class="row">
                        <div class="col-sm-6">
                            <div>
                                <span class="text-sm text-grey-m2 align-middle">Vendor : </span>
                                <span class="text-600 text-110 text-blue align-middle">{{ $rfqs->nama_vendor }}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    Alamat : {{ $rfqs->alamat }}
                                </div>
                                <div class="my-1">
                                    No Telpon : {{ $rfqs->nohp }}
                                </div>
                                <div class="my-1">
                                    Tanggal Confirm : {{ $rfqs->tgl_confirm_vendor }}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->

                        <div class="text-95 col-sm-6 align-self-start d-sm-flex justify-content-end">
                            <hr class="d-sm-none" />
                            <div class="text-grey-m2">
                                <div class="mt-1 mb-2 text-secondary-m1 text-600 text-125">
                                    Invoice
                                </div>


                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Tanggal Pemesanan : </span> {{ $rfqs->tgl_pesan }}
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span
                                        class="text-600 text-90">Tanggal Pembayaran :</span>
                                    {{ $rfqs->tgl_pembayaran }}
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i>
                                    <span class="text-600 text-90">Status : </span>
                                    @if ($rfqs->status == 1)
                                        <td><span class="badge badge-danger badge-pill px-25">RFQ</span></td>
                                    @elseif ($rfqs->status == 2)
                                        <td><span class="badge badge-warning badge-pill px-25">Purchase Order</span>
                                        </td>
                                    @elseif ($rfqs->status == 3)
                                        <td><span class="badge bg-gray-900 badge-pill px-25">Nothing To Bill</span></td>
                                    @elseif ($rfqs->status == 4)
                                        <td><span class="badge badge-success badge-pill px-25">Fully Billed</span></td>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25">
                            <div class="d-none d-sm-block col-1">#</div>
                            <div class="col-9 col-sm-5">Nama Produk</div>
                            <div class="d-none d-sm-block col-4 col-sm-2">Harga</div>
                            <div class="d-none d-sm-block col-sm-2">Quantity</div>
                            <div class="col-2">Total Harga</div>
                        </div>

                        <div class="text-95 text-secondary-d3">
                            <div class="row mb-2 mb-sm-0 py-25">
                                <div class="d-none d-sm-block col-1">1</div>
                                <div class="col-9 col-sm-5">{{ $rfqs->nama_bahan_baku }}</div>
                                <div class="d-none d-sm-block col-2">Rp.@idr($rfqs->harga)</div>
                                <div class="d-none d-sm-block col-2 text-95">{{ $rfqs->quantity }}</div>
                                <div class="col-2 text-secondary-d2">Rp.@idr($rfqs->total)</div>
                            </div>
                            <div class="row border-b-2 brc-default-l2"></div>

                            <!-- or use a table instead -->
                            <!--
            <div class="table-responsive">
                <table class="table table-striped table-borderless border-0 border-b-2 brc-default-l1">
                    <thead class="bg-none bgc-default-tp1">
                        <tr class="text-white">
                            <th class="opacity-2">#</th>
                            <th>Description</th>
                            <th>Qty</th>
                            <th>Unit Price</th>
                            <th width="140">Amount</th>
                        </tr>
                    </thead>

                    <tbody class="text-95 text-secondary-d3">
                        <tr></tr>
                        <tr>
                            <td>1</td>
                            <td>Domain registration</td>
                            <td>2</td>
                            <td class="text-95">$10</td>
                            <td class="text-secondary-d2">$20</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            -->

                            <div class="row mt-3">
                                {{-- <div class="col-12 col-sm-7 text-grey-d2 text-95 mt-2 mt-lg-0">
                                    Extra note such as company or payment information...
                                </div> --}}

                                <div class="col-12 col-sm-12 text-grey text-90 order-first order-sm-last float-right">
                                    <div class="row my-2">
                                        <div class="col-10 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-2">
                                            @if ($rfqs->status == 4)
                                                <span class="text-120 text-secondary-d1">Rp.@idr($rfqs->total)</span>
                                            @else
                                                <span class="text-120 text-secondary-d1">Nothing To Bill</span>
                                            @endif
                                        </div>
                                    </div>
                                    {{-- 
                                    <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">Rp.@idr($rfqs->total)</span>
                                        </div>
                                    </div> --}}
                                </div>
                            </div>

                            <hr />

                            <div class="center-text">
                                <span class="text-secondary-d1 text-105">Thank you for your business</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <style type="text/css">
            body {
                margin-top: 20px;
                color: #484b51;
                margin-bottom: 1rem;
            }

            .text-secondary-d1 {
                color: #728299 !important;
                ;
            }

            .center-text {
                text-align: center;
                margin: 0;
                top: 50%;
                left: 50%;
            }

            .page-header {
                margin: 0 0 1rem;
                padding-bottom: 1rem;
                padding-top: .5rem;
                border-bottom: 1px dotted #e2e2e2;
                display: -ms-flexbox;
                display: flex;
                -ms-flex-pack: justify;
                justify-content: space-between;
                -ms-flex-align: center;
                align-items: center;
            }

            .page-title {
                padding: 0;
                margin: 0;
                font-size: 1.75rem;
                font-weight: 300;
            }

            .brc-default-l1 {
                border-color: #dce9f0 !important;
            }

            .ml-n1,
            .mx-n1 {
                margin-left: -.25rem !important;
            }

            .mr-n1,
            .mx-n1 {
                margin-right: -.25rem !important;
            }

            .mb-4,
            .my-4 {
                margin-bottom: 1.5rem !important;
            }

            hr {
                margin-top: 1rem;
                margin-bottom: 1rem;
                border: 0;
                border-top: 1px solid rgba(0, 0, 0, .1);
            }

            .text-grey-m2 {
                color: #888a8d !important;
            }

            .text-success-m2 {
                color: #86bd68 !important;
            }

            .font-bolder,
            .text-600 {
                font-weight: 600 !important;
            }

            .text-110 {
                font-size: 110% !important;
            }

            .text-blue {
                color: #478fcc !important;
            }

            .pb-25,
            .py-25 {
                padding-bottom: .75rem !important;
            }

            .pt-25,
            .py-25 {
                padding-top: .75rem !important;
            }

            .bgc-default-tp1 {
                background-color: rgba(121, 169, 197, .92) !important;
            }

            .bgc-default-l4,
            .bgc-h-default-l4:hover {
                background-color: #f3f8fa !important;
            }

            .page-header .page-tools {
                -ms-flex-item-align: end;
                align-self: flex-end;
            }

            .btn-light {
                color: #757984;
                background-color: #f5f6f9;
                border-color: #dddfe4;
            }

            .w-2 {
                width: 1rem;
            }

            .text-120 {
                font-size: 120% !important;
            }

            .text-primary-m1 {
                color: #4087d4 !important;
            }

            .text-danger-m1 {
                color: #dd4949 !important;
            }

            .text-blue-m2 {
                color: #68a3d5 !important;
            }

            .text-150 {
                font-size: 150% !important;
            }

            .text-60 {
                font-size: 60% !important;
            }

            .text-grey-m1 {
                color: #7b7d81 !important;
            }

            .align-bottom {
                vertical-align: bottom !important;
            }
        </style>

        <script type="text/javascript"></script>
</body>

</html>
