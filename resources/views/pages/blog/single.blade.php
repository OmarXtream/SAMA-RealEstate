@extends('frontend.layouts.app')

@section('styles')
<style>
    
.frame{
  display: flex;
  flex-direction: row;
  justify-content: space-around;
  align-items: center;
  height: 80px;
  width: 350px;
  position: relative;
   box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
   border-radius: 10px;
}

.share-button{
  height: 35px;
  width: 35px;
  border-radius: 3px;
  background: #e0e5ec;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
  -webkit-tap-highlight-color: rgba(0,0,0,0);
  -webkit-tap-highlight-color: transparent;
  box-shadow:
   -7px -7px 20px 0px #fff9,
   -4px -4px 5px 0px #fff9,
   7px 7px 20px 0px #0002,
   4px 4px 5px 0px #0001,
   inset 0px 0px 0px 0px #fff9,
   inset 0px 0px 0px 0px #0001,
   inset 0px 0px 0px 0px #fff9,        inset 0px 0px 0px 0px #0001;
 transition:box-shadow 0.6s cubic-bezier(.79,.21,.06,.81);
  font-size: 16px;
  color: rgba(42, 52, 84, 1);
  text-decoration: none;
}
.share-button:active{
  box-shadow:  4px 4px 6px 0 rgba(255,255,255,.5),
              -4px -4px 6px 0 rgba(116, 125, 136, .2), 
    inset -4px -4px 6px 0 rgba(255,255,255,.5),
    inset 4px 4px 6px 0 rgba(116, 125, 136, .3);
}
    </style>
@endsection

@section('content')

<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">{{$post->title}}</li>
            </ul>
        </div>
    </div>
</section>



<div class="sidebar-page-container">
    <div class="auto-container">
        <div class="row clearfix">
            
            <!--Content Side-->
            <div class="content-side col-lg-12 col-md-12 col-sm-12 col-xs-12" dir="rtl">
                
                <!--News Details Section-->
                <section class="news-detail-section">
                    <!--Main Image-->
                    <figure class="main-image"><img src="{{Storage::url('posts/'.$post->image)}}" alt="{{$post->title}}"></figure>
                    
                    <div class="content-container">

                        <h2 class="post-title">{{$post->title}}</h2>
                        <div class="info">{{$post->created_at->diffForHumans()}}</div>
                        
                        <div class="content">

                                                    {!! $post->body !!}

                        </div>
                    </div>
                    
                    <div class="post-options clearfix">
                        <!--Post Tags-->
                        <div class="post-tags">

                        @foreach($post->categories as $key => $category)
                            <a href="#">{{$category->name}}</a>
                        @endforeach
                        </div>

                        <div class="share-links">
                            <strong>مشاركة : </strong>
                            <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="facebook-share"><span class="fa fa-facebook-f"></span> فيس بوك</a>
                            <a target="_blank" href="https://twitter.com/intent/tweet?text=لا تفوتك هذي التدوينة الرهيبه ! {{Request::url()}}" class="twitter-share"><span class="fa fa-twitter"></span> تويتر</a>
                            <a target="_blank" href="whatsapp://send?text={{Request::url()}}" class="whatsapp-share"><span class="fa fa-whatsapp"></span> واتساب</a>
                        </div>
                    </div>
                    
                    <!--Comments Container-->
                    <div class="comments-container">
                        <div class="big-title">{{ $post->comments_count }} تعليقات</div>
                        <div class="comments-area">
                                   
                            @foreach($post->comments as $comment)
    
                            @if($comment->parent_id == NULL)

                            <!--Comment Box-->
                            <div class="comment-box">
                                <div class="inner-box">
                                    <figure class="comment-thumb"><img src="{{ Storage::url('users/'.$comment->users->image) }}" alt="{{ $comment->users->name }}"></figure>
                                    <div class="comment-info"><strong>{{ $comment->users->name }}</strong> <span class="time">{{ $comment->created_at->diffForHumans() }}</span></div>
                                    <div class="text">{{ $comment->body }}</div>
                                </div>
                            </div>
                            @endif
                            @endforeach

                            
                        </div>
                        
                        <div class="big-title">ترك تعليق</div>
                        <!--Reply Form-->
                        <div class="reply-form">
                            @auth

                            <form method="post" action="{{ route('blog.comment',$post->id) }}">
                                @csrf
                                <input type="hidden" name="parent" value="0">
                                <div class="row clearfix">
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="body" placeholder="اكتب تعليقك هنا.."></textarea>
                                    </div>
                                    
                                    <div class="form-group col-lg-12 col-md-6 col-sm-12 col-xs-12">
                                        <div class="text-right"><button type="submit" class="theme-btn btn-style-two">ارسال &ensp; <span class="fa fa-angle-right"></span></button></div>
                                    </div>
                                </div>
                                
                            </form>

                            @endauth

                            @guest 
                            <div class="text-center">
                                <a href="{{ route('login') }}">
                                <h6 class="text-bold" style="color:#000">سجل الدخول لترك تعليق</h6>
                                </a>
                            </div>
                        @endguest

                        </div>
                    </div>
                </section>

            </div>
            <!--Content Side-->
            
        </div>
    </div>
</div>



@endsection

@section('scripts')

@endsection