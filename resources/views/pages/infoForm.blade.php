@extends('frontend.layouts.app')

@section('content')


<section class="page-title" style="background-image:url(frontend/images/background/image-5.jpg);">
    <div class="overlay-layer"></div>
    <div class="auto-container">
        <div class="content-box">
            <h2>الحلول <span class="theme_color">التمويلية</span></h2>
        </div>
    </div>
</section>

<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">حلول تمويلية</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-section-two">
    <div class="auto-container">
            
        <div class="title-box">
            <h2>بيانات الطلب التمويلي</h2>
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
                <form method="POST" action="{{route('InfoForm.create')}}">
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
                            <input class="{{ $errors->has('Age') ? 'is-invalid' : '' }}" type="text" name="Age" placeholder="العمر" required>
                            @if ($errors->has('Age'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('Age') }}</strong>
                            </span>
                            @endif
    
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <select name="type" class="@if ($errors->has('type')) is-invalid @endif">
                                <option value="" disabled selected>* قطاع الوظيفة</option>
                                <option value="1">قطاع عسكري</option>
                                <option value="2">قطاع مدني</option>
                                <option value="3">قطاع خاص</option>
                            </select>
                            @if ($errors->has('type'))
                            <span class="text-danger">{{ $errors->first('type') }}</span>
                            @endif
        
                        </div>



                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('commitments') ? 'is-invalid' : '' }}" type="text" name="commitments" value="{{ old('commitments') }}" placeholder="الإلتزامات الشهرية" required>
                            @if ($errors->has('commitments'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('commitments') }}</strong>
                            </span>
                           @endif
    
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('bank') ? 'is-invalid' : '' }}" type="text" name="bank" value="{{ old('bank') }}" placeholder="البنك" required>
                            @if ($errors->has('bank'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('bank') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('salary') ? 'is-invalid' : '' }}" type="text" name="salary" value="{{ old('salary') }}" placeholder="الراتب الاساسي" required>
                            @if ($errors->has('salary'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('salary') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-6 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('salaryTotal') ? 'is-invalid' : '' }}" type="text" name="salaryTotal" value="{{ old('salaryTotal') }}" placeholder="الراتب الصافي" required>
                            @if ($errors->has('salaryTotal'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('salaryTotal') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('homeAllowance') ? 'is-invalid' : '' }}" type="text" name="homeAllowance" value="{{ old('homeAllowance') }}" placeholder="بدل السكن" required>
                            @if ($errors->has('homeAllowance'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('homeAllowance') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('Allowances') ? 'is-invalid' : '' }}" type="text" name="Allowances" value="{{ old('Allowances') }}" placeholder="بدلات اخرى" required>
                            @if ($errors->has('Allowances'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('Allowances') }}</strong>
                            </span>
                           @endif
                        </div>

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <select name="supported" class="nice-select @if ($errors->has('supported')) is-invalid @endif">
                                <option value="" disabled selected>* مدعوم من سكني؟</option>
                                <option value="1">لا</option>
                                <option value="2">نعم</option>
                            </select>
                            @if ($errors->has('supported'))
                            <span class="text-danger">{{ $errors->first('supported') }}</span>
                            @endif
                        </div>


                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea class="@if ($errors->has('notes')) is-invalid @endif" name="notes" placeholder="تفاصيل إضافيه" required>{{ old('notes') }}</textarea>
                            @if ($errors->has('notes'))
                            <span class="text-danger">{{ $errors->first('notes') }}</span>
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
