<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login-ERP</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="row"><br>
        <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2 col-md-4 col-md-offset-4">
            <div class="login-panel panel panel-default">
                <div class="panel-heading">ERP PRODUKSI KAOS POLOS</div>
                <div class="panel-body">
                    @if(session('error'))
                    <div class="alert alert-danger">
                        <b>Oops!! </b>{{session('error')}}
                    </div>
                    @endif
                    <form action="{{ route('actionlogin') }}" method="POST" role="form">
                        @csrf
                        <fieldset>
                            <div class="form-group">
                                <input class="form-control" placeholder="Username" name="name" type="text" autofocus="" required="">
                            </div>
                            <div class="form-group">
                                <input class="form-control" placeholder="Password" name="password" type="password" value="">
                            </div>
                            <div class="checkbox">
                                <button type="submit" class="btn btn-primary btn-block" value="Login">
                                    Login
                                </button>
                                <hr>
                                <p class="text-center">
                                    Belum punya akun?
                                    <a href="{{route('register')}}">
                                        Register
                                    </a>
                                    sekarang!
                                </p>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>

</html>