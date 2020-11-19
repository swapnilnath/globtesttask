@extends('front.layout.app')
@section('content')
<section id="loginSection">
    <div class="container">
        <div class="row">
            <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12">
                <div class="login-box">
                    <div class="user-reg-form-ttl">
                        Forgot Password
                    </div>
                    <hr>
                    <div class="reg_box">
                        @if (session('status'))
                            <div class="alert bg-info alert-icon-left alert-dismissible mb-2" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ ucfirst(session('status')) }}
                            </div>
                        @endif

                        {!!
                            Form::open([
                                'route' => 'front.password.email',
                                'class' => 'form-horizontal'
                            ])
                        !!}
                            <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                <label class="control-label col-xl-3 col-lg-3 col-12 text-left">Email:</label>
                                <div class="col-xl-9 col-lg-9 col-12">
                                    <input type="email" class="form-control" name="email" placeholder="Email Address">
                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="text-center">
                                    <button type="submit" class="btn btn-gold">Submit</button>
                                </div>
                                <div class="text-center m-t-5">
                                    <a class="btn" href="{{ route('front.login') }}">
                                        <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Login
                                    </a>
                                </div>
                            </div>
                        {!!
                            Form::close()
                        !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
@section('styles')
    <style>
        #loginSection {
            padding: 100px 0px 235px 0px;
        }
        .m-t-5{
            margin-top: 50px !important;
        }
    </style>
@endsection
@section('scripts')
@endsection
