<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="images/favicon.ico">
    <title>Demo Laravel</title>
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
                <div class="collapse navbar-collapse" id="collapsingNavbar">
                    <ul class="navbar-nav ml-auto" style="width: 100%">
                        <li class="nav-item active"><a class="nav-link" href="#">
                                {{ @Auth::User()->name }}
                            </a></li>
                        <li class="nav-item active"><a class="nav-link" href="{{ route('front.post_listing') }}">Post Listing</a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.store_listing') }}">Store Listing </a></li>
                        <li class="nav-item"><a class="nav-link" href="{{ route('front.logout') }}">Logout </a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>

</header>
<!-- header end -->
<!-- mid part start -->
<div class="mid-start">
    <!-- about us start -->
    <div class="container">
        <div class="about-us">
            <div class="sec-title"><span class="color-red">Posts</span> <img src="images/plane-right.png" alt=""></div>
            <div class="row">
                @if($posts->count() > 0)
                    @foreach($posts as $post)

                        <div class="col-md-12" style="margin-top: 2em;">
                            <div class="blog-box">
                                <div class="bb-img">
                                    @if($post->gift_image)
                                        <img src=" {{ asset('storage/gift_image/'.'/'.$post->gift_image) }}" alt="" style="max-width: 100px;max-height: 100px;">
                                        @else
                                        <img src=" {{ asset('uploads/gift_image/default.png') }}" alt="" style="max-width: 100px;max-height: 100px;">
                                    @endif

                                </div>
                                <div class="bb-detail">
                                    <div class="bb-title">
                                        {{$post->gift_name}}
                                    </div>

                                    <div class="bb-title">
                                       <span>
                                       <?php
                                           $totalLikes = \App\UserLike::where('gift_id', $post->id)->get()->count();
                                           echo $totalLikes;
                                       ?>
                                       </span> <i class="fa fa-lightbulb-o"></i>
                                    </div>
                                    <div class="bb-subTitle">{{ $post->created_at  }}</div>
                                    {{ strip_tags($post->description) }}
                                    <a href="designs#" class="bb-btn"><img src="images/right-arrow-white.png" alt=""></a>
                                </div>
                            </div>
                            <div class="bb-title">
                                <a href="{{ route('front.likepost', $post->id) }}">
                                   Like
                                </a>
                            </div>
                        </div><hr style="border: 1px solid #CCCCCC;">
                    @endforeach
                @else
                @endif

            </div>

            <div class="row">
            </div>
        </div>
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