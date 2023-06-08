@extends('frontend.layouts.app')
@section('content')


<section class="contact-section-two">
    <div class="auto-container">
        
        <div class="title-box">
            <h2>تسجيل الدخول</h2>
            <h4>الدخول مع سما</h4>
        </div>
        
        
        
        <!--Form Container-->
        <div class="form-container">
            <div class="default-form contact-form">
                <form method="POST" action="{{ route('login') }}" id="contact-form">
                    @csrf
                    <div class="row clearfix">
                            
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
                        </div>
                        @if ($errors->has('email'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                       @endif

                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" placeholder="كلمة المرور" required>
                            @if ($errors->has('password'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
    
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" class="theme-btn btn-style-two">دخول</button></div>
                        </div>
                        
                    </div>
                </form>

                <div class="col-lg-12">
                    <div class="account-create text-center pt-50">
                        <h4>ليس لديك حساب ؟</h4>
                        <div class="btn-wrapper">
                            <a href="{{route('register')}}" class="theme-btn-1 btn black-btn">سجل الآن</a>
                        </div>
                    </div>
                </div>
    
            </div>
        </div><!--End Form Container-->
        
    </div>
</section>       



@endsection
