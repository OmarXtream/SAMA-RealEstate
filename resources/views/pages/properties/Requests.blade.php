@extends('frontend.layouts.app')

@section('content')

<section class="page-title" style="background-image:url(frontend/images/background/image-6.jpg);">
    <div class="overlay-layer"></div>
    <div class="auto-container">
        <div class="content-box">
            <h2>طلب <span class="theme_color">العقار</span></h2>
        </div>
    </div>
</section>

<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">طلب عقار</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-section-two">
    <div class="auto-container">
            
        <div class="title-box">
            <h2>بيانات الطلب</h2>
        </div>

        @if(Session::has('errors'))
        <div class="text-center alert alert-light">
            <h5 style="font-weight: bold;">* فضلاً قم بملىء كل الحقول</h5>
        @if($errors->any())
        {!! implode('', $errors->all('<p style="color:red">:message</p>')) !!}
        @endif
        </div>
        @endif
        @if (session()->has('message'))
        <div class="text-center alert alert-light">
            <h3 style="font-weight: bold; color:black">{{ session('message') }}</h3>
        </div>
        @endif
    
        <!--Form Container-->
        <div class="form-container" dir="rtl">
            <div class="default-form">
                <form method="POST" action="{{route('PropertieRequest.create')}}">
                    @csrf
                    <div class="row clearfix">

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" placeholder="الاسم" required>
                            @if ($errors->has('name'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('name') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
                            @if ($errors->has('email'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                           @endif
    
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" placeholder="رقم الهاتف" required>
                            @if ($errors->has('phone'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('phone') }}</strong>
                            </span>
                            @endif
    
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('type') ? 'is-invalid' : '' }}" type="text" name="type" value="{{ old('type') }}" placeholder="نوع العقار" required>
                            @if ($errors->has('type'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('type') }}</strong>
                            </span>
                           @endif
    
                        </div>



                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('city') ? 'is-invalid' : '' }}" type="text" name="city" value="{{ old('city') }}" placeholder="مدينة العقار" required>
                            @if ($errors->has('city'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('city') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('rooms') ? 'is-invalid' : '' }}" type="number" name="rooms" value="{{ old('rooms') }}" placeholder="عدد الغرف" required>
                            @if ($errors->has('rooms'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('rooms') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('baths') ? 'is-invalid' : '' }}" type="number" name="baths" value="{{ old('baths') }}" placeholder="دورات المياه" required>
                            @if ($errors->has('baths'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('baths') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('min_price') ? 'is-invalid' : '' }}" type="text" name="min_price" value="{{ old('min_price') }}" placeholder="أقل قيمة للعقار" required>
                            @if ($errors->has('min_price'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('min_price') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('max_price') ? 'is-invalid' : '' }}" type="text" name="max_price" value="{{ old('max_price') }}" placeholder="أعلى قيمة للعقار" required>
                            @if ($errors->has('max_price'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('max_price') }}</strong>
                            </span>
                           @endif
                        </div>



                        
                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('first_district') ? 'is-invalid' : '' }}" type="text" name="first_district" value="{{ old('first_district') }}" placeholder="الحي الاول" required>
                            @if ($errors->has('first_district'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('first_district') }}</strong>
                            </span>
                           @endif
                        </div>


                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('Second_district') ? 'is-invalid' : '' }}" type="text" name="Second_district" value="{{ old('Second_district') }}" placeholder="الحي الثاني" required>
                            @if ($errors->has('Second_district'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('Second_district') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('Third_district') ? 'is-invalid' : '' }}" type="text" name="Third_district" value="{{ old('Third_district') }}" placeholder="الحي الثالث" required>
                            @if ($errors->has('Third_district'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('Third_district') }}</strong>
                            </span>
                           @endif
                        </div>


                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('Fourth_district') ? 'is-invalid' : '' }}" type="text" name="Fourth_district" value="{{ old('Fourth_district') }}" placeholder="الحي الرابع" required>
                            @if ($errors->has('Fourth_district'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('Fourth_district') }}</strong>
                            </span>
                           @endif
                        </div>
                        


                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea class="@if ($errors->has('details')) is-invalid @endif" name="details" placeholder="تفاصيل إضافيه" required>{{ old('details') }}</textarea>
                            @if ($errors->has('details'))
                            <span class="text-danger">{{ $errors->first('details') }}</span>
                            @endif

                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" class="theme-btn btn-style-two">إرسال الطلب</button></div>
                        </div>
                        
                    </div>
                </form>

    
            </div>
        </div><!--End Form Container-->
        
    </div>
</section>   


@endsection
