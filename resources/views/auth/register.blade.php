@extends('frontend.layouts.app')
@section('content')


<section class="contact-section-two">
    <div class="auto-container">
        
        <div class="title-box">
            <h2>تسجيل حساب</h2>
            <h4>سجل الآن مع سما</h4>
        </div>
        
        
        
        <!--Form Container-->
        <div class="form-container">
            <div class="default-form contact-form">
                <form method="POST" action="{{ route('register') }}" id="contact-form">
                    <input type="hidden" name="agent" value="3" />

                    @csrf
                    <div class="row clearfix">
                            

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input class="{{ $errors->has('email') ? 'is-invalid' : '' }}" type="email" name="email" value="{{ old('email') }}" placeholder="البريد الإلكتروني" required>
                        @if ($errors->has('email'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                       @endif
                        </div>


                       <div class="form-group col-md-6 col-sm-6 col-xs-12">
                        <input class="{{ $errors->has('name') ? 'is-invalid' : '' }}" type="text" name="name" value="{{ old('name') }}" placeholder="الاسم" required>
                    
                        @if ($errors->has('name'))
                        <span class="helper-text" data-error="wrong" data-success="right">
                            <strong>{{ $errors->first('name') }}</strong>
                        </span>
                       @endif
    
                       </div>

                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="password" id="password_confirmation" name="password_confirmation" placeholder="تأكيد كلمة المرور" required>    
                        </div>


                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input class="{{ $errors->has('password') ? 'is-invalid' : '' }}" type="password" name="password" placeholder="كلمة المرور" required>
                            @if ($errors->has('password'))
                            <span class="helper-text" data-error="wrong" data-success="right">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                            @endif
    
                        </div>

                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" class="theme-btn btn-style-two">إنشاء حساب</button></div>
                        </div>
                        
                    </div>
                </form>

                <div class="col-lg-12">
                    <div class="account-create text-center pt-50">
                        لديك حساب بالفعل ؟  <a href="{{route('login')}}">دخول الآن</a>
                    </div>
                </div>
    
            </div>
        </div><!--End Form Container-->
        
    </div>
</section>       



@endsection
