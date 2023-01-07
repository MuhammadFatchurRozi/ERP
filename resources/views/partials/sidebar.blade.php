<!--/.sidebar-->
<div class="wrapper">
    <nav id="sidebar">
        <ul class="list-unstyled comments">
            <div id="sidebar-collapse" class="col-sm-3 col-lg-2 sidebar wow fadeInLeft">
                <div class="profile-sidebar">
                    <div class="profile-userpic">
                        <img src="{{ asset('style/gambar/user.gif') }}" class="img-responsive" alt="">
                    </div>
                    <div class="profile-usertitle">
                        <div class="profile-usertitle-name">
                            Admin
                        </div>
                        <div class="profile-usertitle-status"><span class="indicator label-success blink"></span>Online
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                <div class="divider"></div>
                <ul class="nav menu">
                    <li class="{{ request()->is('home') ? 'active' : '' }}">
                        <a href="{{ route('home') }}">
                            <em class="fa fa-home">&nbsp;</em>
                            Dashboard
                        </a>
                    </li>
                    <li class="{{ request()->is('product*') ? 'active' : '' }}">
                        <a href="{{ route('product.index') }}">
                            <em class="fa fa-user-circle-o ">&nbsp;</em>
                            Data Product
                        </a>
                    </li>
                    <li class="{{ request()->is('bom*') ? 'active' : '' }}">
                        <a href="{{ route('bom.index') }}">
                            <em class="fa fa-recycle">&nbsp;</em>
                            Data BoM
                        </a>
                    </li>
                    <li class="{{ request()->is('bahan*') ? 'active' : '' }}">
                        <a href="{{ route('bahan.index') }}"><em class="fa fa-balance-scale ">&nbsp;</em> Bahan Baku</a>
                    </li>
                    <li class="{{ request()->is('rfq*' && 'po*') ? 'active' : '' }}, parent">
                        <a href="#sub-item-1" data-toggle="collapse" aria-expanded="false">
                            <em class="fa fa-cart-plus ">&nbsp;</em>
                            Order Bahan
                            <span data-toggle="collapse" href="#sub-item-1" class="icon pull-right">
                                <em class="fa fa-plus"></em>
                            </span>
                        </a>
                        <ul class="children collapse" id="sub-item-1">
                            <li>
                                <a class="{{ request()->is('rfq*') ? 'active' : '' }}"
                                    href="{{ route('rfq.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    RFQ
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('po*') ? 'active' : '' }}" href="{{ route('po.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Purchase Order
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('costumer*' && 'quotation*') ? 'active' : '' }}, parent">
                        <a href="#sub-item-2" data-toggle="collapse" aria-expanded="false">
                            <em class="fa fa-shopping-basket ">&nbsp;</em>
                            Sales
                            <span data-toggle="collapse" href="#sub-item-2" class="icon pull-right">
                                <em class="fa fa-plus"></em>
                            </span>
                        </a>
                        <ul class="children collapse" id="sub-item-2">
                            <li>
                                <a class="{{ request()->is('costumer*') ? 'active' : '' }}"
                                    href="{{ route('costumer.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Costumer
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('quotation*') ? 'active' : '' }}"
                                    href="{{ route('quotation.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Quotations
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('order*') ? 'active' : '' }}"
                                    href="{{ route('order.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Order
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('datavendor*') ? 'active' : '' }} ">
                        <a href="{{ route('datavendor.index') }}">
                            <em class="fa fa-handshake-o ">&nbsp;</em>
                            Vendor
                        </a>
                    </li>
                    <li class="{{ request()->is('pesanan*') ? 'active' : '' }}, parent">
                        <a href="#sub-item-3" data-toggle="collapse" aria-expanded="false">
                            <em class="fa fa-money ">&nbsp;</em>
                            Pemesanan
                            <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
                                <em class="fa fa-plus"></em>
                            </span>
                        </a>
                        <ul class="children collapse" id="sub-item-3">
                            <li class="{{ request()->is('kasir*') ? 'active' : '' }}">
                                <a href="{{ route('kasir.index') }}">
                                    <em class="fa fa-money  ">&nbsp;</em>
                                    Kasir
                                </a>
                            </li>
                            <li class="{{ request()->is('pesanan*') ? 'active' : '' }}">
                                <a href="{{ route('pesanan.index') }}">
                                    <em class="fa fa-shopping-cart">&nbsp;</em>
                                    Detail Pesanan
                                </a>
                            </li>
                            <li class="{{ request()->is('mad*') ? 'active' : '' }}">
                                <a href="{{ route('mad.index') }}">
                                    <em class="fa fa-check-circle  ">&nbsp;</em>
                                    Data MaD
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ request()->is('accounting*') ? 'active' : '' }}, parent">
                        <a href="#sub-item-4" data-toggle="collapse" aria-expanded="false">
                            <em class="fa fa-calculator ">&nbsp;</em>
                            Accounting
                            <span data-toggle="collapse" href="#sub-item-3" class="icon pull-right">
                                <em class="fa fa-plus"></em>
                            </span>
                        </a>
                        <ul class="children collapse" id="sub-item-4">
                            <li>
                                <a class="{{ request()->is('costumerinvoice*') ? 'active' : '' }}"
                                    href="{{ route('accounting.index') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Costumer Invoice
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('vendorbill*') ? 'active' : '' }}"
                                    href="{{ route('accounting.create') }}">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Vendor Bill
                                </a>
                            </li>
                            <li>
                                <a class="{{ request()->is('payroll*') ? 'active' : '' }}" href="">
                                    <span class="fa fa-arrow-right">&nbsp;</span>
                                    Payroll
                                </a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
        </ul>
    </nav>
</div>
