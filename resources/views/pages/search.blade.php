@extends('frontend.layouts.app')



@section('content')


<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">قائمة العقارات</li>
            </ul>
        </div>
    </div>
</section>
<section class="properties-section-two">
    <div class="auto-container">

        <div class="search-style-one extended">
            <div class="search-outer">
                <div class="form-box search-form">
                    <form method="GET" action="{{ route('search')}}">
                        <div class="row clearfix">
                            <!--Form Group-->
                            <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                <div class="field-title">الموقع المطلوب</div>
                                <div class="field-inner">
                                    <input type="text" name="city" placeholder="مدينة-منطقة">
                                </div>
                            </div>
                            <!--Form Group-->
                            <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                <div class="field-title">اختر النوع</div>
                                <div class="field-inner">
                                    <select name="type" class="custom-select-box">
                                        <option value="شقة">شقة</option>
                                        <option value="بيت">بيت</option>
                                        <option value="ملحق">ملحق</option>
                                        <option value="عمارة">عمارة</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-3 col-sm-6 col-xs-12">
                                <div class="field-title">اختر الغرض</div>
                                <div class="field-inner">
                                    <select name="purpose" class="custom-select-box">
                                        <option value="ايجار">ايجار</option>
                                        <option value="بيع">بيع</option>
                                    </select>
                                </div>
                            </div>

                            <!--Form Group-->
                            <div class="form-group col-md-2 col-sm-6 col-xs-12">
                                <div class="field-title">اختر الغرف</div>
                                <div class="field-inner">
                                    <select class="custom-select-box">
                                        <option value="" disabled selected>عدد الغرف</option>
                                        @if(isset($bedroomdistinct))
                                             @foreach($bedroomdistinct as $bedroom)
                                                 <option value="{{$bedroom->bedroom}}">{{$bedroom->bedroom}}</option>
                                             @endforeach
                                         @endif
                                        </select>
                                </div>
                            </div>
                            <!--Form Group-->
                            <div class="form-group">
                                <div class="field-title">&nbsp;</div>
                                <div class="field-inner text-center mt-2"><button type="submit" class="theme-btn btn-style-one"><span class="icon fa fa-search"></span>بحث</button></div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div><!--Search Style One-->

    </div>
</section>


<div class="filter-list row clearfix">

    @foreach($properties as $property)

    <!--Property Block-->
    <div class="property-block-grid col-lg-4 col-md-6 col-xs-12 mix mix_all sell">
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
    @endforeach
    
</div>

<div class="styled-pagination text-center">
    {{ $properties->links() }}

</div>

        
@endsection



