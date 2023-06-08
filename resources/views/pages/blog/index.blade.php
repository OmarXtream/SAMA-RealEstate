@extends('frontend.layouts.app')


@section('content')



<section class="page-title" style="background-image:url(frontend/images/background/image-6.jpg);">
    <div class="overlay-layer"></div>
    <div class="auto-container">
        <div class="content-box">
            <h2>المدونة <span class="theme_color">العقارية</span></h2>
        </div>
    </div>
</section>


<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">المدونة</li>
            </ul>
        </div>
    </div>
</section>

<section class="default-news-section">
    <div class="auto-container">
        
        @forelse($posts as $post)

        <!--News Style Four-->
        <div class="news-style-four">
            <div class="inner-box">
                <div class="clearfix">
                    <div class="image-column pull-right col-lg-6 col-md-5 col-sm-6 col-xs-12">
                        <figure class="image-box"><a href="{{ route('blog.show',$post->slug) }}"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></a></figure>
                    </div>
                    <div class="content-column pull-left col-lg-6 col-md-7 col-sm-6 col-xs-12">
                        <div class="inner">
                            <div class="info"><a href="{{ route('blog.show',$post->slug) }}" class="cat-name">{{$post->title}}</a>     <span class="date">{{$post->created_at->diffForHumans()}}</span></div>
                            <h3><a href="{{ route('blog.show',$post->slug) }}">{{$post->title}}</a></h3>
                            <a href="{{ route('blog.show',$post->slug) }}" class="theme-btn btn-style-two">تفاصيل أكثر</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @empty
        <h1 class="text-center mb-5">لا يوجد اي منشورات حالياً</h1>
        @endforelse

    </div>
</section>




@endsection
