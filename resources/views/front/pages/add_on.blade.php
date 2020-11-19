@extends('front.layouts.app')
@section('title', 'Ship Visa')
@section('mainContent')

    <div class="header-bottom home-banner">
        <div class="banner-content">
            <div class="container">
                <div class="bc-title">Travel <span class="color-red">Visa</span> <br> Requirements</div>
                <div class="bc-small-text">Reference site about Lorem Ipsum, giving information on its origins, as well as a random Lipsum generator.</div>
            </div>
        </div>
    </div>
    </header>
    <!-- mid part start -->
    <div class="mid-start" style="padding: 60px 0;">
        <!-- Recommended Add start -->
        <div class="recommended-add">
            <div class="container">
                <div class="sec-title">Recommended Add <img src="{{asset('images/plane-right.png') }}" alt=""></div>
                <div class="ra-sub-title">You can get mailed the completed processed visa on your address by paying the shipping fee.</div>
                <div class="recommended-add-form">
                    {!!
                        Form::open([
                        'route'	=> ['front.submitShipvisa'],
                        'id'	=> 'checkvisarequirement',
                        'files' => 'true'
                        ])
                    !!}
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address line 1</label>
                                <input type="text" class="form-control" name="first_address" placeholder="Address line 1" required>
                                <span class="help-block">
                                    <font color="red"> {{ $errors->has('first_address') ? "".$errors->first('first_address')."" : '' }} </font>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Address line 2</label>
                                <input type="text" class="form-control" name="second_address" placeholder="Address line 2" required>
                                <span class="help-block">
                                    <font color="red"> {{ $errors->has('second_address') ? "".$errors->first('second_address')."" : '' }} </font>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" class="form-control" name="city" placeholder="City" required>
                                <span class="help-block">
                                    <font color="red"> {{ $errors->has('city') ? "".$errors->first('city')."" : '' }} </font>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Postal Code</label>
                                <input type="text" class="form-control" name="postal_code" placeholder="Postal Code" required>
                                <span class="help-block">
                                    <font color="red"> {{ $errors->has('postal_code') ? "".$errors->first('postal_code')."" : '' }} </font>
                                </span>
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label>Country</label>
                                {!! Form::select('country_id',$countries,null,[
                                'class'         => 'form-control custom-select select2',
                                'id'            => 'country',
                                'placeholder'   => 'Please Select Country', 'required'
                                ]) !!}
                                <span class="help-block">
                                    <font color="red"> {{ $errors->has('country_id') ? "".$errors->first('country_id')."" : '' }} </font>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="summary-payment hidden">
                        <div class="sp-title">
                            <div class="sec-title">Order summary</div>
                            <div class="shipping"><img src="{{asset('images/plane-red.png') }}" alt=""> Shipping Fee = AED <span class="amount"></span></div>
                        </div>
                        <div class="sp-title">
                            <div class="sec-title">Payment via</div>
                            <div class="shipping">Visa with card number 0011</div>
                        </div>
                        <input type="hidden" name="application_id" id="application_id" value="12">
                        <input type="hidden" name="amount" id="amount" value="">
                        <input type="hidden" name="status" id="status" value="">
                    </div>
                    <div class="recommended-add-btn">
                        <a href="javasvript:void(0)" class="arrow-btn shipvisa_a"><span class="ab-text">Pay and get visa shipped</span> <img src="images/right-arrow-white.png" alt=""></a>
                        <button type="submit" class="arrow-btn shipvisa_button hidden"><span class="ab-text">Pay and get visa shipped</span> <img src="{{asset('images/right-arrow-white.png') }}" alt=""></button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
        <!-- Recommended Add start -->

    </div>
@endsection
@section('styles')
    <style>
        .hidden{ display: none !important; }
        .mid-start{padding: 0;}
    </style>
@endsection
@section('scripts')
    <script>
        $(document).ready(function () {
            $('#electronic-tab').on('click', function () {
                $('#service_type').val('regular');
            });
            $('#e-visa-tab, .nav-express').on('click', function () {
                $('#service_type').val('express');
            });

            $('#country').on('change', function () {
                var country = $(this).val();
                if(country){
                    $.ajax({
                        url:"{{ route('front.getCountryPrice') }}",
                        type: 'post',
                        data: {
                            "_method": 'get',
                            'country':country,
                            {{--"_token": "{{ csrf_token() }}"--}}
                        },
                        success:function(result){
                            if(result.status === true){
                                $('.summary-payment').removeClass('hidden');
                                $('.amount').text(result.result.amount);
                                $('#amount').val(result.result.amount);
                                $('#status').val(result.result.status);
                                $('.shipvisa_button').removeClass('hidden');
                                $('.shipvisa_a').addClass('hidden');
                            }else{
                                if(!$('.summary-payment').hasClass("hidden")){
                                    $('.summary-payment').removeClass('hidden');
                                }
                            }
                        },
                        error:function(){
                            swal("Error!", 'Error in updated Record', "error");
                        }
                    });
                }
            });
        });
    </script>
@endsection
