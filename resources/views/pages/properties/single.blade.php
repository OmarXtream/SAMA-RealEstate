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
                <li class="active">{{ $property->title }}</li>
            </ul>
        </div>
    </div>
</section>


<section class="property-info-section">
    <div class="auto-container">
        
        <div class="row clearfix">
            <!--Left Column-->
            <div class="left-column col-md-6 col-sm-12 col-xs-12">
                <!--Product Carousel-->
                <div class="product-carousel-outer">
                    <!--Product image Carousel-->
                    <ul class="prod-image-carousel">

                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)

                        <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="gallery" href="{{Storage::url('property/'.$property->image)}}" title="{{$property->title}}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></a></figure></li>

                        @else
                        
                        <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="gallery" href="{{$property->image}}" title="{{$property->title}}"><img src="{{$property->image}}" alt="{{$property->title}}"></a></figure></li>
                        @endif
        
                        @if(!$property->gallery->isEmpty())

                        @foreach($property->gallery as $gallery)
            
                        <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="gallery" href="{{Storage::url('property/gallery/'.$gallery->name)}}" title="{{$property->title}}"><img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$property->title}}"></a></figure></li>
                        @endforeach

                        @else

                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)

                        <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="gallery" href="{{Storage::url('property/'.$property->image)}}" title="{{$property->title}}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></a></figure></li>
                        @else
                        <li><figure class="image"><a class="lightbox-image option-btn" data-fancybox-group="gallery" href="{{$property->image}}" title="{{$property->title}}"><img src="{{$property->image}}" alt="{{$property->title}}"></a></figure></li>
                        @endif
        
                        @endif

                    </ul>
                    
                    <!--Product Thumbs Carousel-->
                    <div class="prod-thumbs-carousel">

                        @if(!$property->gallery->isEmpty())

                        @foreach($property->gallery as $gallery)
                        <div class="thumb-item"><figure class="thumb-box"><img src="{{Storage::url('property/gallery/'.$gallery->name)}}" alt="{{$property->title}}"></figure></div>
                        @endforeach

                        @else

                        @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)

                        <div class="thumb-item"><figure class="thumb-box"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{$property->title}}"></figure></div>
                        @else
                        <div class="thumb-item"><figure class="thumb-box"><img src="{{$property->image}}" alt="{{$property->title}}"></figure></div>
                        @endif
        
                        @endif


                    </div>
                    
                </div><!--End Product Carousel-->
            </div><!--Left Column-->
            
            <!--Right Column-->
            <div class="right-column col-md-6 col-sm-12 col-xs-12">
                <!--Title Style One-->
                <div class="title-style-one extended left-aligned">
                    <div class="title"><h2>{{$property->title}}</h2></div>
                    <div class="sub-title">{{ $property->address }} -  {{ $property->city }} </div>
                </div>
                
                <div class="content">
                    <div class="text">{!! $property->description !!}</div>
                    
                    <div class="row clearfix">
                        <div class="col-md-12 col-sm-12 col-xs-12">
                            <ul class="list-style-one">
                                @foreach($property->features as $feature)
                                <li>{{$feature->name}}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>                    
                    
                    <div class="form-column">
                		<h3 class="text-center"><span class="theme_color">طلب</span> العقار</h3>
                        <!--Contact Form-->
                        <div class="default-form contact-form">
                            <form class="agent-message-box" action="" method="POST">
                                @csrf
                                <input type="hidden" name="agent_id" value="{{ $property->user->id }}">
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="property_id" value="{{ $property->id }}">

                                <div class="row clearfix">
                                        
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="text" name="name" value="" placeholder="الإسم" required>
                                    </div>
                                    
                                    <div class="form-group col-md-6 col-sm-6 col-xs-12">
                                        <input type="email" name="email" value="" placeholder="البريد الإلكتروني" required>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <input type="text" name="phone" value="" placeholder="رقم الهاتف">
                                    </div> 
                                      
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <textarea name="message" placeholder="الرسالة" required></textarea>
                                    </div>
                                    
                                    <div class="form-group col-md-12 col-sm-12 col-xs-12">
                                        <div class="text-center"><button id="msgsubmitbtn" type="submit" class="theme-btn btn-style-one message-btn"><span class="fa fa-paper-plane"></span>&ensp; إرسال الطلب</button></div>
                                    </div>
                                    
                                </div>
                            </form>
                        </div><!--End Contact Form-->
                    </div>
                </div>
            </div><!--Right Column-->
        </div>
        
     
    </div>
</section>

<section class="floor-planning no-padding-top no-border text-center">
    <div class="auto-container">

<div class="right-column col-lg-12 col-md-12 col-sm-12 col-xs-12">
    <div class="tabs-content">
        <!--Tab / Active Tab-->
        <div class="tab active-tab" id="first-floor">
            <!--Specs Listing-->
            <div class="specs-listing">
                <div class="row clearfix">
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon flaticon-double-king-size-bed"></span> {{ $property->bedroom}} غرف</h3>
                    </div>
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon flaticon-bathtub"></span> {{ $property->bathroom}} دورات مياه</h3>
                    </div>
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon fa fa-bullhorn"></span> {{ $property->purpose }}</h3>
                    </div>
                </div>
            </div><!--End Specs Listing-->
        </div>


        <div class="tab active-tab" id="first-floor">
            <!--Specs Listing-->
            <div class="specs-listing">
                <div class="row clearfix">
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon fa fa-square-o"></span> {{ $property->bedroom}} متر مربع</h3>
                    </div>
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon fa fa-info-circle"></span> {{ $property->status}} </h3>
                    </div>
                    <!--Spect COlumn-->
                    <div class="spec-column col-md-4 col-sm-4 col-xs-12" dir="rtl">
                        <h3><span class="icon fa fa-money"></span> {{ $property->price}} ريال</h3>
                    </div>
                </div>
            </div><!--End Specs Listing-->
        </div>

    </div>
</div>
</div>
</section>

<section class="text-center">
    <div class="auto-container d-flex justify-content-center">
<center>
<div class="group-title">
    <h4 class="text-center">مشاركة - مفضلة </h4>
</div>

    <div class ="frame mb-5 mx-auto">
        <a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u={{Request::url()}}" class="share-button">
     <i class="fa fa-facebook-f" style="color: #3b5998;"></i>
    </a>
        <a target="_blank" href="https://twitter.com/intent/tweet?text={{Request::url()}}" class="share-button">
      <i class="fa fa-twitter" style="color: #00acee;"></i>
    </a>
        <a target="_blank" href="whatsapp://send?text={{Request::url()}}" class="share-button">
     <i class="fa fa-whatsapp" style="color: #ea4c89;"></i>
    </a>

    @if(!$fav)
        <a href="{{route('favorite.create',$property->id)}}" title="المفضلة" class="share-button">
        <i class="fa fa-heart" style="color:#0e76a8;"></i>
        </a>
    @else
         <a href="{{route('favorite.delete',$property->id)}}" title="الغاء من المفضلة" class="share-button">
            <i class="fa fa-heart" style="color:#0e76a8;"></i>
        </a>
    @endif


    </div>
</center>
</div>

</section>

@endsection

@section('scripts')

    <script>
        $(function(){

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

    
          

            // MESSAGE
            $(document).on('submit','.agent-message-box',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('property.message') }}";
                var btn = $('#msgsubmitbtn');

                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('جاري الإرسال..');
                    },
                    success: function(data) {
                        if (data.message) {
                        $('form.agent-message-box')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('تم الإرسال');
                        }
                    },
                    error: function(xhr) {
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إعادة الإرسال');
                    },
                    complete: function() {
                        $('form.agent-message-box')[0].reset();
                    },
                    dataType: 'json'
                });

            })
        })
    </script>
@endsection