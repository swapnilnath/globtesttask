<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Glob Test</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
<!-- header start -->
<header>
    <div class="header-bottom">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="index.html"><img src="images/logo.png" alt=""></a>
                <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </button>
            </div>
        </nav>
    </div>

</header>
<!-- header end -->
<!-- mid part start -->
<div class="mid-start">
    <!-- about us start -->
    <div class="container">
        <section id="loginSection">
            <div class="container">
                <div class="row">
                    <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12">
                        <div class="login-box">
                            <div class="user-reg-form-ttl">Login</div>
                            <hr>
                            @if(\Session::has('message'))
                                <div class="alert bg-{{ \Session::get('status') }} alert-icon-left alert-dismissible mb-2" role="alert">
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">×</span>
                                    </button>
                                    <strong>  {!! \Session::get('message')  !!} </strong>
                                </div>
                            @endif
                            <div class="reg_box">
                                {!! Form::open([
                                    'class' => 'form-horizontal',
                                    'route' => 'front.login',
                                ]) !!}
                                @if($errors->has('login_error'))
                                    <div class="alert bg-danger alert-icon-left alert-dismissible mb-2" role="alert">
                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                            <span aria-hidden="true">×</span>
                                        </button>
                                        <strong>  {{ $errors->first('login_error') }}</strong>
                                    </div>
                                @endif
                                <div class="form-group {{ $errors->has('login') ? ' has-error' : '' }}">
                                    <label class="control-label col-xl-4 col-lg-4 col-12 text-left">Email Address :</label>
                                    <div class="col-xl-8 col-lg-8 col-12">
                                        <input type="text" class="form-control" name="email" placeholder="Email Address / Username">
                                        @if ($errors->has('email'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group {{ $errors->has('password') ? ' has-error' : '' }}">
                                    <label class="control-label col-xl-4 col-lg-4 col-12 text-left">Password:</label>
                                    <div class="col-xl-8 col-lg-8 col-12">
                                        <input type="Password" class="form-control" name="password" placeholder="Password" />
                                        @if ($errors->has('password'))
                                            <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                        @endif
                                    </div>
                                </div>

                                <div class="form-group">
                                    <div class="text-center">
                                        <button type="submit" class="btn btn-gold">Login</button>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="row">
                                        <div class="col-lg-12 text-center">
                                            <a href="{{ route('front.register') }}">Don't have an account? Signup Now!</a>
                                        </div>
                                    </div>
                                </div>
                                {!! Form::close() !!}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <!-- about us start -->
</div>
<footer>
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-sm-6 col-md-3">
                    <div class="foo-logo"><img src="images/foo-logo.png" alt=""></div>
                    <div class="foo-address">

                    </div>
                    <div class="follow-us">
                        <div class="fu-title">Post Listing page</div>

                    </div>
                </div>
                <div class="col-sm-6 col-md-3">

                </div>
                <div class="col-sm-6 col-md-3">

                </div>
                <div class="col-sm-6 col-md-3">

                </div>
            </div>
        </div>
    </div>
    <div class="foo-botom">
        <div class="container">
            All rights reserved.
        </div>
    </div>
</footer>



<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/popper.min.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
<script type="text/javascript" src="js/moment.js"></script>
<script type="text/javascript" src="js/slick.min.js"></script>
<script type="text/javascript" src="js/jquery.slimscroll.js"></script>

</body>

</html>