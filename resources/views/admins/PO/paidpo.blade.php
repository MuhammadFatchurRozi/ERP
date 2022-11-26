<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">

    @if ($po->status == 1)
    <title>Cetak Halaman - {{ $po->nama_bahan_baku }} - {{ $po->tgl_bayar }}</title>
    @elseif ($po->status == 2)
    <title>Cetak Halaman - {{ $po->nama_bahan_baku }} - {{ $po->tgl_bayar }}</title>
    @elseif ($po->status == 3)
    <title>Cetak Halaman - {{ $po->nama_bahan_baku }} - {{ $po->tgl_bayar }}</title>
    @elseif ($po->status == 4)
    <title>Cetak Halaman - {{ $po->nama_bahan_baku }} - {{ $po->tgl_bayar }}</title>
    @endif

    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://code.jquery.com/jquery-1.10.2.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        @page {
            size: 295mm 160mm;
        }

        @media print {
            .cetak {
                display: none;

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
                    ID: #{{ $po->kode_rfq }}
                </small>
            </h1>

            <div class="page-tools cetak">
                <div class="action-buttons">
                    <a onclick="window.print()" class="btn bg-white btn-light mx-1px text-95" href="#" data-title="PDF">
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
                                <span class="text-600 text-110 text-blue align-middle">{{ $po->nama_vendor }}</span>
                            </div>
                            <div class="text-grey-m2">
                                <div class="my-1">
                                    Alamat : {{ $po->alamat }}
                                </div>
                                <div class="my-1">
                                    No Telpon : {{ $po->nohp }}
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


                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal Pemesanan : </span> {{ $po->tgl_pesan }}
                                </div>

                                <div class="my-2"><i class="fa fa-circle text-blue-m2 text-xs mr-1"></i> <span class="text-600 text-90">Tanggal bayar :</span>
                                    {{ $po->tgl_bayar }}
                                </div>
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>

                    <div class="mt-4">
                        <div class="row text-600 text-white bgc-default-tp1 py-25 bora">
                            <div class="d-none d-sm-block col-1">#</div>
                            <div class="col-9 col-sm-5">Nama Bahan Baku</div>
                            <div class="d-none d-sm-block col-4 col-sm-2">Harga</div>
                            <div class="d-none d-sm-block col-sm-2">Quantity</div>
                            <div class="col-2">Total Harga</div>
                        </div>

                        <div class="text-95 text-secondary-d3">
                            <div class="row mb-2 mb-sm-0 py-25">
                                <div class="d-none d-sm-block col-1">1</div>
                                <div class="col-9 col-sm-5">{{ $po->nama_bahan_baku }}</div>
                                <div class="d-none d-sm-block col-2">Rp.@idr($po->harga)</div>
                                <div class="d-none d-sm-block col-2 text-95">{{ $po->quantity }}</div>
                                <div class="col-2 text-secondary-d2">Rp.@idr($po->total)</div>
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
                                            @if ($po->status == 4)
                                            <span class="text-120 text-secondary-d1">Rp.@idr($po->total)</span>
                                            @else
                                            <span class="text-120 text-secondary-d1">Nothing To Bill</span>
                                            @endif
                                        </div>
                                    </div>

                                    <!-- <div class="row my-2 align-items-center bgc-primary-l3 p-2">
                                        <div class="col-7 text-right">
                                            Total Amount
                                        </div>
                                        <div class="col-5">
                                            <span class="text-150 text-success-d3 opacity-2">Rp.@idr($po->total)</span>
                                        </div>
                                    </div>  -->
                                </div>
                            </div>

                            <hr />

                            <div class="center-text">
                                <a href="javascript:setTimeout(()=>{window.location = '{{ route('po.edit', $po->id) }}' },10000);" class="btn btn-info btn-bold px-4 mt-3 mt-lg-0 order cetak">
                                    <span class="default">PAID</span>
                                    <span class="success">SUCCESS PAID
                                        <svg viewbox="0 0 12 10">
                                            <polyline points="1.5 6 4.5 9 10.5 1"></polyline>
                                        </svg>
                                    </span>
                                    <div class="box"></div>
                                    <div class="truck">
                                        <div class="back"></div>
                                        <div class="front">
                                            <div class="window"></div>
                                        </div>
                                        <div class="light top"></div>
                                        <div class="light bottom"></div>
                                    </div>
                                    <div class="lines"></div>
                                </a>
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

            .bora {
                border-radius: 15px;
            }

            .text-secondary-d1 {
                color: #728299 !important;
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

            /* Button Complete Order */
            :root {
                --primary: #275EFE;
                --primary-light: #7699FF;
                --dark: #1C212E;
                --grey-dark: #3F4656;
                --grey: #6C7486;
                --grey-light: #CDD9ED;
                --white: #FFF;
                --green: #16BF78;
                --sand: #DCB773;
                --sand-light: #EDD9A9;
            }

            .order {
                appearance: none;
                border: 0;
                background: var(--dark);
                position: relative;
                height: 63px;
                width: 240px;
                padding: 0;
                outline: none;
                cursor: pointer;
                border-radius: 15px;
                -webkit-mask-image: -webkit-radial-gradient(white, black);
                -webkit-tap-highlight-color: transparent;
                overflow: hidden;
                transition: transform 0.3s ease;
            }

            .order span {
                --o: 1;
                position: absolute;
                left: 0;
                right: 0;
                text-align: center;
                top: 19px;
                line-height: 24px;
                color: var(--white);
                font-size: 16px;
                font-weight: 500;
                opacity: var(--o);
                transition: opacity 0.3s ease;
            }

            .order span.default {
                transition-delay: 0.3s;
            }

            .order span.success {
                --offset: 16px;
                --o: 0;
            }

            .order span.success svg {
                width: 12px;
                height: 10px;
                display: inline-block;
                vertical-align: top;
                fill: none;
                margin: 7px 0 0 4px;
                stroke: var(--green);
                stroke-width: 2;
                stroke-linecap: round;
                stroke-linejoin: round;
                stroke-dasharray: 16px;
                stroke-dashoffset: var(--offset);
                transition: stroke-dashoffset 0.3s ease;
            }

            .order:active {
                transform: scale(0.96);
            }

            .order .lines {
                opacity: 0;
                position: absolute;
                height: 3px;
                background: var(--white);
                border-radius: 2px;
                width: 6px;
                top: 30px;
                left: 100%;
                box-shadow: 15px 0 0 var(--white), 30px 0 0 var(--white), 45px 0 0 var(--white), 60px 0 0 var(--white), 75px 0 0 var(--white), 90px 0 0 var(--white), 105px 0 0 var(--white), 120px 0 0 var(--white), 135px 0 0 var(--white), 150px 0 0 var(--white), 165px 0 0 var(--white), 180px 0 0 var(--white), 195px 0 0 var(--white), 210px 0 0 var(--white), 225px 0 0 var(--white), 240px 0 0 var(--white), 255px 0 0 var(--white), 270px 0 0 var(--white), 285px 0 0 var(--white), 300px 0 0 var(--white), 315px 0 0 var(--white), 330px 0 0 var(--white);
            }

            .order .back,
            .order .box {
                --start: var(--white);
                --stop: var(--grey-light);
                border-radius: 2px;
                background: linear-gradient(var(--start), var(--stop));
                position: absolute;
            }

            .order .truck {
                width: 60px;
                height: 41px;
                left: 100%;
                z-index: 1;
                top: 11px;
                position: absolute;
                transform: translateX(24px);
            }

            .order .truck:before,
            .order .truck:after {
                --r: -90deg;
                content: '';
                height: 2px;
                width: 20px;
                right: 58px;
                position: absolute;
                display: block;
                background: var(--white);
                border-radius: 1px;
                transform-origin: 100% 50%;
                transform: rotate(var(--r));
            }

            .order .truck:before {
                top: 4px;
            }

            .order .truck:after {
                --r: 90deg;
                bottom: 4px;
            }

            .order .truck .back {
                left: 0;
                top: 0;
                width: 60px;
                height: 41px;
                z-index: 1;
            }

            .order .truck .front {
                overflow: hidden;
                position: absolute;
                border-radius: 2px 9px 9px 2px;
                width: 26px;
                height: 41px;
                left: 60px;
            }

            .order .truck .front:before,
            .order .truck .front:after {
                content: '';
                position: absolute;
                display: block;
            }

            .order .truck .front:before {
                height: 13px;
                width: 2px;
                left: 0;
                top: 14px;
                background: linear-gradient(var(--grey), var(--grey-dark));
            }

            .order .truck .front:after {
                border-radius: 2px 9px 9px 2px;
                background: var(--primary);
                width: 24px;
                height: 41px;
                right: 0;
            }

            .order .truck .front .window {
                overflow: hidden;
                border-radius: 2px 8px 8px 2px;
                background: var(--primary-light);
                transform: perspective(4px) rotateY(3deg);
                width: 22px;
                height: 41px;
                position: absolute;
                left: 2px;
                top: 0;
                z-index: 1;
                transform-origin: 0 50%;
            }

            .order .truck .front .window:before,
            .order .truck .front .window:after {
                content: '';
                position: absolute;
                right: 0;
            }

            .order .truck .front .window:before {
                top: 0;
                bottom: 0;
                width: 14px;
                background: var(--dark);
            }

            .order .truck .front .window:after {
                width: 14px;
                top: 7px;
                height: 4px;
                position: absolute;
                background: rgba(255, 255, 255, 0.14);
                transform: skewY(14deg);
                box-shadow: 0 7px 0 rgba(255, 255, 255, 0.14);
            }

            .order .truck .light {
                width: 3px;
                height: 8px;
                left: 83px;
                transform-origin: 100% 50%;
                position: absolute;
                border-radius: 2px;
                transform: scaleX(0.8);
                background: #f0dc5f;
            }

            .order .truck .light:before {
                content: '';
                height: 4px;
                width: 7px;
                opacity: 0;
                transform: perspective(2px) rotateY(-15deg) scaleX(0.94);
                position: absolute;
                transform-origin: 0 50%;
                left: 3px;
                top: 50%;
                margin-top: -2px;
                background: linear-gradient(90deg, #f0dc5f, rgba(240, 220, 95, 0.7), rgba(240, 220, 95, 0));
            }

            .order .truck .light.top {
                top: 4px;
            }

            .order .truck .light.bottom {
                bottom: 4px;
            }

            .order .box {
                --start: var(--sand-light);
                --stop: var(--sand);
                width: 21px;
                height: 21px;
                right: 100%;
                top: 21px;
            }

            .order .box:before,
            .order .box:after {
                content: '';
                top: 10px;
                position: absolute;
                left: 0;
                right: 0;
            }

            .order .box:before {
                height: 3px;
                margin-top: -1px;
                background: rgba(0, 0, 0, 0.1);
            }

            .order .box:after {
                height: 1px;
                background: rgba(0, 0, 0, 0.15);
            }

            .order.animate .default {
                --o: 0;
                transition-delay: 0s;
            }

            .order.animate .success {
                --offset: 0;
                --o: 1;
                transition-delay: 7s;
            }

            .order.animate .success svg {
                transition-delay: 7.3s;
            }

            .order.animate .truck {
                animation: truck 10s ease forwards;
            }

            .order.animate .truck:before {
                animation: door1 2.4s ease forwards 0.3s;
            }

            .order.animate .truck:after {
                animation: door2 2.4s ease forwards 0.6s;
            }

            .order.animate .truck .light:before,
            .order.animate .truck .light:after {
                animation: light 10s ease forwards;
            }

            .order.animate .box {
                animation: box 10s ease forwards;
            }

            .order.animate .lines {
                animation: lines 10s ease forwards;
            }

            @keyframes truck {

                10%,
                30% {
                    transform: translateX(-164px);
                }

                40% {
                    transform: translateX(-104px);
                }

                60% {
                    transform: translateX(-224px);
                }

                75%,
                100% {
                    transform: translateX(24px);
                }
            }

            @keyframes lines {

                0%,
                30% {
                    opacity: 0;
                    transform: scaleY(0.7) translateX(0);
                }

                35%,
                65% {
                    opacity: 1;
                }

                70% {
                    opacity: 0;
                }

                100% {
                    transform: scaleY(0.7) translateX(-400px);
                }
            }

            @keyframes light {

                0%,
                30% {
                    opacity: 0;
                    transform: perspective(2px) rotateY(-15deg) scaleX(0.88);
                }

                40%,
                100% {
                    opacity: 1;
                    transform: perspective(2px) rotateY(-15deg) scaleX(0.94);
                }
            }

            @keyframes door1 {

                30%,
                50% {
                    transform: rotate(32deg);
                }
            }

            @keyframes door2 {

                30%,
                50% {
                    transform: rotate(-32deg);
                }
            }

            @keyframes box {

                8%,
                10% {
                    transform: translateX(40px);
                    opacity: 1;
                }

                25% {
                    transform: translateX(112px);
                    opacity: 1;
                }

                26% {
                    transform: translateX(112px);
                    opacity: 0;
                }

                27%,
                100% {
                    transform: translateX(0px);
                    opacity: 0;
                }
            }

            /* End Button Complete Order */
        </style>

        <script type="text/javascript"></script>
        <!-- <script src="{{ asset('style/js/complete_order.js') }}"></script> -->
        <script>
            $(".order").click(function(e) {
                let button = $(this);

                if (!button.hasClass("animate")) {
                    button.addClass("animate");
                    setTimeout(() => {
                        button.removeClass("animate");
                    }, 10000);
                }
            });
        </script>
</body>

</html>