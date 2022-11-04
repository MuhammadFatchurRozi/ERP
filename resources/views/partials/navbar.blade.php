<!--navabar-->
<nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#sidebar-collapse"><span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span></button>
            <a class="navbar-brand" href="{{ route('home') }}"><span>ERP</span> PRODUKSI KAOS
                POLOS</a>
            <ul class="nav navbar-top-links navbar-right">
                <li class="dropdown"><a class="dropdown-toggle count-info" data-toggle="dropdown" href="#">
                        <i href="{{ route('actionlogout') }}" class="fa fa-power-off"></i>
                </li>
            </ul>
        </div>
    </div>
</nav>