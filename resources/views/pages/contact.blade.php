@extends('frontend.layouts.app')


@section('content')

<section class="page-info">
    <div class="auto-container">
        <!--Breadcrumb-->
        <div class="breadcrumb-outer">
            <ul class="bread-crumb clearfix">
                <li><a href="{{route('home')}}">الرئيسية</a></li>
                <li class="active">تواصل معنا</li>
            </ul>
        </div>
    </div>
</section>

<section class="contact-section-two">
    <div class="auto-container">

        
        <div class="title-box">
            <h4>احصل على منزل أحلامك</h4>
            <h2>تواصل معنا</h2>
        </div>
        
        <div class="info-container">
            <div class="row clearfix">
                <!--Info Block-->
                <div class="info-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon"><span class="flaticon-home-1"></span></div>
                            <h4>العنوان</h4>
                            <ul>
                                <li>شارع العنوان - مدينة العنوان</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--Info Block-->
                <div class="info-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon"><span class="flaticon-envelope"></span></div>
                            <h4>البريد الإلكتروني</h4>
                            <ul>
                                <li>info@sama-sa.com </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                <!--Info Block-->
                <div class="info-block col-md-4 col-sm-6 col-xs-12">
                    <div class="inner-box">
                        <div class="inner">
                            <div class="icon"><span class="flaticon-technology-6"></span></div>
                            <h4>رقم الهاتف</h4>
                            <ul>
                                <li>+96655555</li>
                            </ul>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        
        
        <!--Form Container-->
        <div class="form-container" dir="rtl">
            <div class="default-form contact-form">
                <form method="post" id="contact-us" action="">
                    @csrf
                    @auth
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    @endauth

                    <div class="row clearfix">
                            
                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                            <input type="text" name="name" placeholder="الإسم" required>
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                            <input type="email" name="email" value="" placeholder="البريد الإلكتروني" required>
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-6 col-xs-12">
                            <input type="text" name="phone" value="" placeholder="رقم الهاتف" required>
                        </div>
                          
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea id="message" name="message" placeholder="الرسالة" required></textarea>
                        </div>
                        
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <div class="text-center"><button type="submit" class="theme-btn btn-style-two" id="msgsubmitbtn" name="submit-form">إرسال الرسالة</button></div>
                        </div>
                        
                    </div>
                    <h1 class="text-center" id="result"></h1>

                    <p class="form-messege mb-0 mt-20"></p>

                </form>
            </div>
        </div><!--End Form Container-->
        
    </div>
</section>       


@endsection

@section('scripts')
    <script>

        $(function(){
            $(document).on('submit','#contact-us',function(e){
                e.preventDefault();

                var data = $(this).serialize();
                var url = "{{ route('contact.message') }}";
                var btn = $('#msgsubmitbtn');
                
                $.ajax({
                    type: 'POST',
                    url: url,
                    data: data,
                    beforeSend: function() {
                        $(btn).addClass('disabled');
                        $(btn).empty().append('جاري الإرسال');
                    },
                    success: function(data) {
                        if (data.message) {
                            $('#result').empty().append(data.message);
                        }
                    },
                    error: function(xhr) {
                        M.toast({html: 'ERROR: Failed to send message!', classes: 'red darken-4'})
                    },
                    complete: function() {
                        $('form#contact-us')[0].reset();
                        $(btn).removeClass('disabled');
                        $(btn).empty().append('إرسال');
                    },
                    dataType: 'json'
                });

            })
        })

    </script>
@endsection