<!doctype html>
<!--[if IE 9]><html class="ie9" lang="en"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
@include('front.includes.head')
<body>

    @include('front.includes.topNavigation')
    <div class="header-bottom">
        <nav class="navbar navbar-expand-md">
            <div class="container">
                <a class="navbar-brand" href="{{route('front.index')}}"><img src="{{ url(\Settings::get('slider_logo')) }}" alt=""></a>
                <button class="navbar-toggler navbar-toggler-right collapsed" type="button" data-toggle="collapse" data-target="#collapsingNavbar">
                    <span> </span>
                    <span> </span>
                    <span> </span>
                </button>
                <div class="collapse navbar-collapse" id="collapsingNavbar">
                    <ul class="navbar-nav ml-auto">
                        @if(\Auth::check())
                            <li class="nav-item active"><a class="nav-link" href="{{route('front.apply_now')}}">Apply For Visa</a></li>
                        @else
                            <li class="nav-item active"><a href="#login-modal" data-toggle="modal" class="nav-link" >Apply For Visa</a></li>
                        @endif

                        <li class="nav-item"><a class="nav-link" href="{{route('front.track_your_order')}}">Track Order Status </a></li>
                        @if(\Auth::check())
                            <li class="nav-item active"><a class="nav-link" href="{{route('front.offerdiscount')}}">Offer/Discounts</a></li>
                        @else
                            <li class="nav-item active"><a href="#login-modal" data-toggle="modal" class="nav-link" >Offer/Discounts</a></li>
                        @endif
                        <li class="nav-item"><a class="nav-link" href="{{route('front.cost_calculate')}}">Cost Calculate</a></li>
                        <li class="nav-item"><a class="nav-link menu-contact" href="{{route('front.contact')}}">Contact Us</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
    <div class="mid-start">
    @yield('mainContent')
    </div>
    @include('front.includes.footer')
    @include('front.includes.scripts')
 </body>
</html>
