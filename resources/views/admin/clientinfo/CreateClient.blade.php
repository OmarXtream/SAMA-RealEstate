@extends('backend.layouts.app')

@section('title', 'Create Client Order')

@push('styles')
<link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.css" rel="stylesheet">

<style>



p {
    color: grey
}

#heading {
    text-transform: uppercase;
    color: #673AB7;
    font-weight: normal
}

#msform {
    text-align: center;
    position: relative;
    margin-top: 20px
}

#msform fieldset {
    background: white;
    border: 0 none;
    border-radius: 0.5rem;
    box-sizing: border-box;
    width: 100%;
    margin: 0;
    padding-bottom: 20px;
    position: relative
}

.form-card {
    text-align: left
}

#msform fieldset:not(:first-of-type) {
    display: none
}

#msform input,
#msform textarea {
    padding: 8px 15px 8px 15px;
    border: 1px solid #ccc;
    border-radius: 0px;
    margin-bottom: 25px;
    margin-top: 2px;
    width: 100%;
    box-sizing: border-box;
    font-family: montserrat;
    color: #2C3E50;
    background-color: #ECEFF1;
    font-size: 16px;
    letter-spacing: 1px
}

#msform input:focus,
#msform textarea:focus {
    -moz-box-shadow: none !important;
    -webkit-box-shadow: none !important;
    box-shadow: none !important;
    border: 1px solid #673AB7;
    outline-width: 0
}

#msform .action-button {
    width: 100px;
    background: #673AB7;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 0px 10px 5px;
    float: right
}

#msform .action-button:hover,
#msform .action-button:focus {
    background-color: #311B92
}

#msform .action-button-previous {
    width: 100px;
    background: #616161;
    font-weight: bold;
    color: white;
    border: 0 none;
    border-radius: 0px;
    cursor: pointer;
    padding: 10px 5px;
    margin: 10px 5px 10px 0px;
    float: right
}

#msform .action-button-previous:hover,
#msform .action-button-previous:focus {
    background-color: #000000
}

.card {
    z-index: 0;
    border: none;
    position: relative
}

.fs-title {
    font-size: 25px;
    color: #673AB7;
    margin-bottom: 15px;
    font-weight: normal;
    text-align: left
}

.purple-text {
    color: #673AB7;
    font-weight: normal
}

.steps {
    font-size: 25px;
    color: gray;
    margin-bottom: 10px;
    font-weight: normal;
    text-align: right
}

.fieldlabels {
    color: gray;
    text-align: left
}

#progressbar {
    margin-bottom: 30px;
    overflow: hidden;
    color: lightgrey
}

#progressbar .active {
    color: #673AB7
}

#progressbar li {
    list-style-type: none;
    font-size: 15px;
    width: 25%;
    float: left;
    position: relative;
    font-weight: 400
}

#progressbar #account:before {
    font-family: FontAwesome;
    content: "\f007"
}

#progressbar #personal:before {
    font-family: FontAwesome;
    content: "\f0d6"
}

#progressbar #payment:before {
    font-family: FontAwesome;
    content: "\f015"
}

#progressbar #confirm:before {
    font-family: FontAwesome;
    content: "\f164"
}

#progressbar li:before {
    width: 50px;
    height: 50px;
    line-height: 45px;
    display: block;
    font-size: 20px;
    color: #ffffff;
    background: lightgray;
    border-radius: 50%;
    margin: 0 auto 10px auto;
    padding: 2px
}

#progressbar li:after {
    content: '';
    width: 100%;
    height: 2px;
    background: lightgray;
    position: absolute;
    left: 0;
    top: 25px;
    z-index: -1
}

#progressbar li.active:before,
#progressbar li.active:after {
    background: #673AB7
}

.progress {
    height: 20px
}

.progress-bar {
    background-color: #673AB7
}

.fit-image {
    width: 100%;
    object-fit: cover
}



</style>
    
@endpush


@section('content')

    <div class="block-header">
        <a href="{{route('admin.clientinfo.index')}}" class="waves-effect waves-light btn btn-danger right m-b-15">
            <i class="material-icons left">arrow_back</i>
            <span>رجوع</span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2 class="text-center">إنشاء طلب متكامل للعميل</h2>
                </div>
                <div class="body">
                    @if(Session::has('errors'))
                    <div class="text-center alert alert-light">
                        {{-- <h5 style="font-weight: bold;color:black">* فضلاً قم بملىء كل الحقول</h5> --}}
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


                    <div class="container-fluid">
                        <div class="row justify-content-center">
                                    <form id="msform" action="{{route('admin.clientinfo.CreateClient.store')}}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <!-- progressbar -->
                                        <ul id="progressbar">
                                            <li class="active" id="account"><strong>المعلومات الشخصية</strong></li>
                                            <li id="personal"><strong>المعلومات المالية</strong></li>
                                            <li id="payment"><strong>تفاصيل الالتزام والعقار</strong></li>
                                            <li id="confirm"><strong>نتائج الحلول التمويلية</strong></li>
                                        </ul>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                                        </div> <br> <!-- fieldsets -->
                                        <fieldset>
                                            <div class="col-5">
                                                <h2 class="steps">الإجراء 1 - 4</h2>
                                            </div>

                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 style="float:right" class="fs-title">المعلومات الشخصية</h2>
                                                    </div>
                                                </div> 
                                                <label class="fieldlabels">الإسم *</label> <input type="text" name="name" placeholder="الإسم" /> 
                                                <label class="fieldlabels">البريد الإلكتروني *</label> <input type="text" name="email" placeholder="البريد الإلكتروني" /> 
                                                <label class="fieldlabels">رقم الهاتف *</label> <input type="text" name="phone" placeholder="رقم الهاتف" /> 
                                                <label class="fieldlabels">العمر *</label> <input type="number" name="Age" placeholder="العمر" />
                                            </div> 
                                            <label class="fieldlabels">قطاع الوظيفة *</label> 
                                            <select name="type" class="nice-select @if ($errors->has('type')) is-invalid @endif">
                                                <option value="" disabled selected>قطاع الوظيفة</option>
                                                <option value="1">قطاع عسكري</option>
                                                <option value="2">قطاع مدني</option>
                                                <option value="3">قطاع خاص</option>
                                            </select>


                                            <input type="button" name="next" class="next action-button" value="التالي" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="col-5">
                                                <h2 class="steps">الإجراء 2 - 4</h2>
                                            </div>

                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 style="float:right" class="fs-title">المعلومات المالية</h2>
                                                    </div>
                                                </div> 
                                                <label class="fieldlabels">الإلتزامات الشهرية *</label> <input type="text" name="commitments" placeholder="الإلتزامات الشهرية" /> 
                                                <label class="fieldlabels">البنك *</label> <input type="text" name="bank" placeholder="البنك" /> 
                                                <label class="fieldlabels">الراتب الاساسي *</label> <input type="text" name="salary" placeholder="الراتب الاساسي" /> 
                                                <label class="fieldlabels">الراتب الصافي *</label> <input type="text" name="salaryTotal" placeholder="الراتب الصافي" />
                                                <label class="fieldlabels">بدل السكن *</label> <input type="text" name="homeAllowance" placeholder="بدل السكن" />
                                                <label class="fieldlabels">بدلات اخرى *</label> <input type="text" name="Allowances" placeholder="بدلات اخرى" />
                                                <label class="fieldlabels">مدعوم من سكني؟ *</label> 
                                                <select name="supported" class="nice-select @if ($errors->has('supported')) is-invalid @endif">
                                                    <option value="" disabled selected>* مدعوم من سكني؟</option>
                                                    <option value="1">لا</option>
                                                    <option value="2">نعم</option>
                                                </select>
                                                <br><br>
                                                <label class="fieldlabels">تفاصيل إضافية</label> 
                                                <div class="form-group">
                                                    <textarea name="notes" class="summary-ckeditor"></textarea>
                                                </div>
                        
                                            </div> 
                                            <input type="button" name="next" class="next action-button" value="التالي" />
                                            <input type="button" name="previous" class="previous action-button-previous" value="السابق" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="row">
                                                <div class="col-5">
                                                    <h2 class="steps">الإجراء 3 - 4</h2>
                                                </div>
                                            </div>
                                            <div class="form-card">
                                               
                                                <div class="col-7">
                                                    <h2 style="float:right" class="fs-title">تفاصيل الالتزام والعقار</h2>
                                                </div>
    
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">التزام القسط الشهري </label>
                                                        <input type="text" name="monthly" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">الوقت المتبقي للقسط </label>
                                                        <input type="text" name="timeLeft" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">المبلغ المتبقى للقسط </label>
                                                        <input type="text" name="paymentLeft" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">البنك المعتمد</label>
                                                        <input type="text" name="Bank" class="form-control">
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">المندوب العقاري</label>

                                                        <select name="delegate" class=" show-tick">
                                                            <option value="">-- اختر --</option>
                                                            @foreach($delegates as $delegate)
                                                            <option value="{{$delegate->id}}" >{{$delegate->name}}</option>
                                                            @endforeach
                                                        </select>
                                                                                    
                                                    </div>
                                                </div>

                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">العقار المختار من العميل</label>
                                                        <input type="text" name="property" class="form-control">
                                                    </div>
                                                </div>
                                                <div class="form-group form-float">
                                                    <div class="form-line">
                                                        <label class="fieldlabels">موعد معاينة العقار</label>
                                                        <input type="datetime-local" name="dateToVisit" class="form-control">
                                                    </div>
                                                </div>
                        
                        
                                                <div class="form-group">
                                                    <label class="fieldlabels">ملف تعريف الراتب </label>
                                                    <input type="file" name="payCheckFile">
                        
                                                </div>
                                                
                            
                                                <div class="form-group">
                                                    <label for="details">تفاصيل طلب العميل</label>
                                                    <textarea name="details" class="summary-ckeditor">{{old('details')}}</textarea>
                                                </div>
                                                                                        </div> 
                                            
                                            <input type="button" name="next" class="next action-button" value="التالي" /> 
                                            <input type="button" name="previous" class="previous action-button-previous" value="السابق" />
                                        </fieldset>
                                        <fieldset>
                                            <div class="col-5">
                                                <h2 class="steps">الإجراء 4 - 4</h2>
                                            </div>

                                            <div class="form-card">
                                                <div class="row">
                                                    <div class="col-7">
                                                        <h2 style="float:right" class="fs-title">نتائج الحلول التمويلية</h2>
                                                    </div>
                                                </div> 
                                                
                                                <div class="form-group">
                                                    <label for="bank1">بنك الاهلي</label>
                                                    <textarea name="bank1" class="summary-ckeditor">{{old('bank1')}}</textarea>
                                                </div>
                        
                        
                                                <div class="form-group">
                                                    <label for="bank2">الراجحي</label>
                                                    <textarea name="bank2" class="summary-ckeditor">{{old('bank2')}}</textarea>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="bank3">البلاد</label>
                                                    <textarea name="bank3" class="summary-ckeditor">{{old('bank3')}}</textarea>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="bank4">بنك ساب</label>
                                                    <textarea name="bank4" class="summary-ckeditor">{{old('bank4')}}</textarea>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="bank5">الإنماء</label>
                                                    <textarea name="bank5" class="summary-ckeditor">{{old('bank5')}}</textarea>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="bank6">دار التمليك</label>
                                                    <textarea name="bank6" class="summary-ckeditor">{{old('bank6')}}</textarea>
                                                </div>
                        
                                                <div class="form-group">
                                                    <label for="bank7">بداية</label>
                                                    <textarea name="bank7" class="summary-ckeditor">{{old('bank7')}}</textarea>
                                                </div>
                        
                                                <button type="submit" class="btn btn-indigo btn-lg m-t-15 waves-effect">
                                                    <i class="material-icons">save</i>
                                                    <span>إرسال</span>
                                                </button>

                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>


                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>

<script src="https://unpkg.com/bs-stepper/dist/js/bs-stepper.min.js"></script>

<script>
    CKEDITOR.replaceAll( 'summary-ckeditor'); 

    $(document).ready(function(){

var current_fs, next_fs, previous_fs; //fieldsets
var opacity;
var current = 1;
var steps = $("fieldset").length;

setProgressBar(current);

$(".next").click(function(){

current_fs = $(this).parent();
next_fs = $(this).parent().next();

//Add Class Active
$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

//show the next fieldset
next_fs.show();
//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
next_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(++current);
});

$(".previous").click(function(){

current_fs = $(this).parent();
previous_fs = $(this).parent().prev();

//Remove class active
$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

//show the previous fieldset
previous_fs.show();

//hide the current fieldset with style
current_fs.animate({opacity: 0}, {
step: function(now) {
// for making fielset appear animation
opacity = 1 - now;

current_fs.css({
'display': 'none',
'position': 'relative'
});
previous_fs.css({'opacity': opacity});
},
duration: 500
});
setProgressBar(--current);
});

function setProgressBar(curStep){
var percent = parseFloat(100 / steps) * curStep;
percent = percent.toFixed();
$(".progress-bar")
.css("width",percent+"%")
}

$(".submit").click(function(){
return false;
})

});
   
</script>   

@endpush
