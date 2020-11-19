@extends('front.layout.app')

@section('content')
    <section id="loginSection">
        <div class="container">
            <div class="row">
                <div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-12">
                    <div class="login-box">
                        <div class="user-reg-form-ttl">
                            Reset Password
                        </div>
                        <hr>
                        <div class="reg_box p-10">
                            <div class="row">
                                <div class="col-md-12">
                                    @if (session('status'))
                                        <div class="alert bg-success alert-icon-left alert-dismissible mb-2" role="alert">
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">×</span>
                                            </button>
                                            <strong>{{ session('status') }}
                                        </div>
                                    @endif
                                    {!! Form::open([
                                            'class' => 'form-horizontal',
                                            'route' => 'front.password.update',
                                        ])
                                    !!}
                                        <input type="hidden" name="token" value="{{ $token }}">
                                        <div class="form-group {{ $errors->has('email') ? ' has-error' : '' }}">
                                            <label class="control-label col-xl-4 col-lg-4 col-12 text-left">Email Address:</label>
                                            <div class="col-xl-8 col-lg-8 col-12">
                                                <input type="text" class="form-control" name="email" placeholder="Email Address">
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
                                                {!!
                                                      Form::password('password',[
                                                          'class'         => 'form-control form-control-lg',
                                                          'id'            => 'password',
                                                          'placeholder'   => 'Enter password'
                                                      ])
                                                  !!}
                                                @if ($errors->has('password'))
                                                    <span class="help-block">
                                                        <strong>{{ $errors->first('password') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="control-label col-xl-4 col-lg-4 col-12 text-left">Confirm Password:</label>
                                            <div class="col-xl-8 col-lg-8 col-12">
                                                {!!
                                                     Form::password('password_confirmation',[
                                                         'class'           => 'form-control form-control-lg',
                                                         'id'              => 'password-confirm',
                                                         'placeholder'     => 'Confirm Password'
                                                     ])
                                                 !!}
                                            </div>
                                        </div>
                                        <div class="form-group text-center">
                                            <button type="submit" class="btn btn-gold">
                                                {{ __('Reset Password') }}
                                            </button>
                                        </div>
                                        <div class="text-center m-t-5">
                                            <a class="btn" href="{{ route('front.login') }}">
                                                <i class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to Login
                                            </a>
                                        </div>
                                    {!! Form::close() !!}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection

@section('styles')
    <style>
        .text-white{
            color:#fff !important;
        }
    </style>
@endsection
@section('scripts')
@endsection
