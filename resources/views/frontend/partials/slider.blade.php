    <!--Static Banner-->
    <section class="static-banner" style="background-image:url({{asset('frontend/images/main-slider/3.jpg')}});">
        <div class="overlay-layer"></div>
        <div class="auto-container">
            <div class="content-box">
                <h2>ابحث عن منزلك المثالي</h2>
                <a href="{{ route('property') }}" class="theme-btn btn-style-one">إبدا الآن</a>
            </div>
            
            <!--Search Style One-->
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
