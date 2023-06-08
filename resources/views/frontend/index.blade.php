@extends('frontend.layouts.app')

@section('content')
    
<section class="properties-section">
    <div class="auto-container">
        <!--Title Style One-->
        <div class="title-style-one extended text-center">
            <div class="title"><h2>العقارات</h2></div>
            <div class="sub-title">العقارات المميزه </div>
        </div>
        
        <div class="big-title"><h2>بيع وإيجار</h2></div>
        
        <!--Carousel-->
        <div class="properties-carousel three-items-carousel">

            @foreach($properties as $property)

            <div class="slide-item">
                <!--Property Block-->
                <div class="property-block-grid">
                    <div class="inner-box">
                        <div class="image-box">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <figure class="image"><a href="{{ route('property.show',$property->slug) }}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{ str_limit( $property->title, 18 ) }}"></a></figure>
                            @else
                            <figure class="image"><a href="{{ route('property.show',$property->slug) }}"><img src="{{$property->image}}" alt="{{ str_limit( $property->title, 18 ) }}"></a></figure>
                            @endif

                            <div class="ribbon">{{$property->purpose}} - {{$property->status}} </div>
                            <a href="{{ route('property.show',$property->slug) }}" class="read-more-link">تفاصيل اكثر</a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h3>
                            <div class="price">{{ $property->price }} ريال</div>
                            <div class="desc-text">{{ $property->address }} -  {{ $property->city }}</div>
                            <!--Specs List-->
                            <ul class="specs-list clearfix">
                                <li><div class="outer"><div class="icon"><span class="fa fa-expand"></span></div><div class="info">{{ $property->area}}</div></div></li>
                                <li><div class="outer"><div class="icon"><span class="fa fa-bed"></span></div><div class="info">{{ $property->bedroom}}</div></div></li>
                                <li><div class="outer"><div class="icon"><span class="flaticon-shape"></span></div><div class="info">{{ $property->bathroom}}</div></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        
    </div>
</section>


<section class="property-features">
    <div class="auto-container">
        <div class="row clearfix">
            <!--Left Column-->
            <div class="left-column col-md-6 col-sm-12 col-xs-12">
                <div class="image-box">
                    <div class="image-outer">
                        <figure class="image"><img src="{{asset('frontend/images/main-slider/1.jpg')}}" alt=""></figure>
                    </div>
                    <div class="link-box">
                        <a href="{{ route('property') }}" class="theme-btn btn-style-one">تصفح العقارات</a>
                    </div>
                </div>
            </div><!--Left Column-->
            
            <!--Right Column-->
            <div class="right-column col-md-6 col-sm-12 col-xs-12">
                <div class="inner">
                    <!--Title Style One-->
                    <div class="title-style-one right-aligned">
                        <div class="title"><h2>لماذا تختارنا؟ </h2></div>
                        <div class="sub-title">اختيارك الأمثل للعقارات المتميزة والخدمة المهنية </div>
                    </div>
                    
                    
                    <!--Tabs Box-->
                    <div class="tabs-box tabs-style-one">
                        <!--Tab Buttons-->
                        <ul class="tab-buttons">
                            <li class="tab-btn active-btn" data-tab="#tab-one">الحلول المالية</li>
                            <li class="tab-btn" data-tab="#tab-two">العقار المناسب</li>
                            <li class="tab-btn" data-tab="#tab-three">نصنع الحلم</li>
                        </ul>
                        
                        <!--Tabs Content-->
                        <div class="tabs-content">
                            <!--Tab / Active Tab-->
                            <div class="tab active-tab" id="tab-one">
                                <div class="content text-center">
                                    <div class="text">حلول مالية بأقل هامش ربح مع فائض</div>
                                 </div>
                            </div>
                            
                            <!--Tab-->
                            <div class="tab" id="tab-two">
                                <div class="content text-center">
                                    <div class="text">توفير العقار بالمواصفات المطلوبة</div>
                                </div>
                            </div>
                            
                            <!--Tab-->
                            <div class="tab" id="tab-three">
                                <div class="content text-center">
                                    <div class="text">فريق التمويل العقاري لضمان منزل أحلامك</div>
                                </div>
                            </div>
                            
                        </div>
                        
                    </div>
                    
                </div>
            </div><!--Right Column-->
            
            
        </div>
    </div>
</section>



<section class="properties-section">
    <div class="auto-container">
        <!--Title Style One-->
        <div class="title-style-one extended text-center">
            <div class="title"><h2>العقارات</h2></div>
            <div class="sub-title">تشكيلة واسعة من العقارات لتلبية مختلف الاحتياجات والتفضيلات </div>
        </div>
        
        <div class="big-title"><h2>بيع وإيجار</h2></div>
        
        <!--Carousel-->
        <div class="properties-carousel three-items-carousel">

            @foreach($Normalproperties as $property)

            <div class="slide-item">
                <!--Property Block-->
                <div class="property-block-grid">
                    <div class="inner-box">
                        <div class="image-box">
                            @if(Storage::disk('public')->exists('property/'.$property->image) && $property->image)
                            <figure class="image"><a href="{{ route('property.show',$property->slug) }}"><img src="{{Storage::url('property/'.$property->image)}}" alt="{{ str_limit( $property->title, 18 ) }}"></a></figure>
                            @else
                            <figure class="image"><a href="{{ route('property.show',$property->slug) }}"><img src="{{$property->image}}" alt="{{ str_limit( $property->title, 18 ) }}"></a></figure>
                            @endif

                            <div class="ribbon">{{$property->purpose}} - {{$property->status}} </div>
                            <a href="{{ route('property.show',$property->slug) }}" class="read-more-link">تفاصيل اكثر</a>
                        </div>
                        <div class="lower-content">
                            <h3><a href="{{ route('property.show',$property->slug) }}">{{ str_limit( $property->title, 18 ) }}</a></h3>
                            <div class="price">{{ $property->price }} ريال</div>
                            <div class="desc-text">{{ $property->address }} -  {{ $property->city }}</div>
                            <!--Specs List-->
                            <ul class="specs-list clearfix">
                                <li><div class="outer"><div class="icon"><span class="fa fa-expand"></span></div><div class="info">{{ $property->area}}</div></div></li>
                                <li><div class="outer"><div class="icon"><span class="fa fa-bed"></span></div><div class="info">{{ $property->bedroom}}</div></div></li>
                                <li><div class="outer"><div class="icon"><span class="flaticon-shape"></span></div><div class="info">{{ $property->bathroom}}</div></div></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach

        </div>
        
    </div>
</section>


<section class="property-to-sell mt-5">
    <div class="auto-container">
        <h3 class="text-center">شركائنا</h3>
        <ul class="image-carousel four-items-carousel">
    @foreach($partners as $partner)
    @if(Storage::disk('public')->exists('partners/'.$partner->img))

    <li class="slide-item"><a href="#" title="{{$partner->name}}" class="lightbox-image" data-fancybox-group="property-carousel"><img src="{{Storage::url('partners/'.$partner->img)}}" alt=""></a></li>
    @endif

    @endforeach
    
        </ul>
    </div>
</section>
@endsection