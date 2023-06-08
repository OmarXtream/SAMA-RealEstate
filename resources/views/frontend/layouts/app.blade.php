<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>{{ config('app.name', 'SAMA Real Estate') }}</title>
<!-- Stylesheets -->
<link href="{{asset('frontend/css/bootstrap.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/revolution-slider.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/jquery-ui.css')}}" rel="stylesheet">
<link href="{{asset('frontend/css/style.css')}}" rel="stylesheet">
<!--Favicon-->
<link rel="shortcut icon" href="{{asset('frontend/images/logo.png')}}" type="image/x-icon">
<link rel="icon" href="{{asset('frontend/images/logo.png')}}" type="image/x-icon">
<!-- Responsive -->
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<meta property="og:title" content="SAMA - سما" />
<meta property="og:site_name" content="SAMA" />
<meta property="og:type" content="realestate" />
<meta name="csrf-token" content="{{ csrf_token() }}">


<link href="{{asset('frontend/css/responsive.css')}}" rel="stylesheet">
<!--[if lt IE 9]><script src="https://cdnjs.cloudflare.com/ajax/libs/html5shiv/3.7.3/html5shiv.js"></script><![endif]-->
<!--[if lt IE 9]><script src="js/respond.js"></script><![endif]-->

@yield('styles')

</head>

<body>
<div class="page-wrapper">
 	
    <!-- Preloader -->
    <div class="preloader"></div>
 	
    <!-- Main Header / Header Style One-->
    <header class="main-header header-style-one">
        
        <!-- Header Top One-->
    	<div class="header-top-one">
        	<div class="auto-container">
            	<div class="clearfix">
                    
                    <!--Top Left-->
                    <div class="top-left">
                    	<!--social-icon-->
                        <ul class="social-links clearfix">
                        	<li><a href="#"><span class="fa fa-facebook-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-twitter-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-google-plus-square"></span></a></li>
                            <li><a href="#"><span class="fa fa-pinterest-square"></span></a></li>
                        </ul>
                    </div><!--Top Left-->
                    
                    <!--Top Right-->
                    <div class="top-right">
                    	<div class="clearfix">
                                                        
                            <div class="floated-link">
                                @guest

                            	<a href="{{route('login')}}"><span class="icon fa fa-key"></span> دخول</a>
                                @endguest

                                @auth

                                {{ ucfirst(Auth::user()->username) }}

                                <a style="display: inline;" class="dropdownitem indigo-text" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                                <i class="material-icons"></i><i class="fa fa-sign-out"></i>
                                </a>
    
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
    
                                @endauth

                            </div>
                            
                        </div>
                    </div><!--Top Right-->
                    
                </div>
            </div>
        </div><!-- Header Top End -->
        
    	<!--Header-Upper-->
        <div class="header-upper">
        	<div class="auto-container">
            	<div class="clearfix">
                	
                	<div class="logo-outer">
                    	<div class="logo"><a href="{{route('home')}}"><img width="200px" height="90px" src="{{asset('frontend/images/logo-head.png')}}" alt="Sama" title="Sama"></a></div>
                    </div>
                    
                    <div class="header-upper-right clearfix">
                    	
                        <!--Info Box-->
                        <div class="info-box">
                        	<div class="icon-box"><span class="fa fa-phone"></span></div>
                            <ul>
                            	<li>+96655555555</li>
                                <li><span class="theme_color">اتصل بنا</span></li>
                            </ul>
                        </div>
                        
                        <!--Info Box-->
                        <div class="info-box">
                        	<div class="icon-box"><span class="fa fa-clock-o"></span></div>
                            <ul>
                            	<li>الخميس-السبت</li>
                                <li>12.00 - 9.00</li>
                            </ul>
                        </div>
                        
                        <!--Info Box-->
                        <div class="info-box">
                        	<div class="icon-box"><span class="fa fa-map-marker"></span></div>
                            <ul>
                            	<li>جدة</li>
                                <li>الحي الفلاني , شارع فلاني</li>
                            </ul>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </div>
        

        @include('frontend.partials.navbar')

        @if(Request::is('/'))
            @include('frontend.partials.slider')
        @endif

        {{-- MAIN CONTENT --}}
        @yield('content')

        {{-- FOOTER --}}
        @include('frontend.partials.footer')

        @yield('scripts')

    </body>
    </html>
    