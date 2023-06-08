@extends('backend.layouts.app')

@section('title', 'نظام الجدولة')

@push('styles')

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.css" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css" />

<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.24.0/moment.min.js"></script>

@endpush


@section('content')
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2 class="text-center">نظام الأجندة والملاحظات</h2>
                </div>
                <div class="body">
                    <h1 class="text-center">ادارة الجدولة والمواعيد</h1>
                    <div id='calendar'></div>
                
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.9.0/fullcalendar.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script>
    $(document).ready(function () {
       
      
    $.ajaxSetup({
        headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
      
    var calendar = $('#calendar').fullCalendar({
                        editable: true,
                        events: "{{route('admin.fullcalender.index')}}",
                        displayEventTime: false,
                        locale:"ar",
                        editable: true,
                        eventRender: function (event, element, view) {
                            if (event.allDay === 'true') {
                                    event.allDay = true;
                            } else {
                                    event.allDay = false;
                            }
                        },
                        selectable: true,
                        selectHelper: true,
                        select: function (start, end, allDay) {
                            var start = $.fullCalendar.formatDate(start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(end, "Y-MM-DD");

                            Swal.fire({
                            title: "إنشاء موعد جديد",
                            text: "قم بكتابة العنوان وتفاصيله",
                            input: 'text',
                            showCancelButton: true,
                            confirmButtonText: 'إنشاء',
                            cancelButtonText:'إلغاء'
     
                        }).then((result) => {

                            if (result.value) {

                                $.ajax({
                                    url: "{{route('admin.fullcalender.create')}}",
                                    data: {
                                        title: result.value,
                                        start: start,
                                        end: end,
                                        type: 'add'
                                    },
                                    type: "POST",
                                    success: function (data) {
                                        displayMessage("تمت الجدولة بنجاح");
      
                                        calendar.fullCalendar('renderEvent',
                                            {
                                                id: data.id,
                                                title: result.value,
                                                start: start,
                                                end: end,
                                                allDay: allDay
                                            },true);
      
                                        calendar.fullCalendar('unselect');
                                    }
                                });
                            }
                        });

                        },
                        eventDrop: function (event, delta) {
                            var start = $.fullCalendar.formatDate(event.start, "Y-MM-DD");
                            var end = $.fullCalendar.formatDate(event.end, "Y-MM-DD");
      
                            $.ajax({
                                url: "{{route('admin.fullcalender.create')}}",
                                data: {
                                    title: event.title,
                                    start: start,
                                    end: end,
                                    id: event.id,
                                    type: 'update'
                                },
                                type: "POST",
                                success: function (response) {
                                    displayMessage("تمت الجدولة بنجاح");
                                }
                            });
                        },
                        eventClick: function (event) {

                            Swal.fire({
                                title: 'هل انت متاكد من الحذف؟',
                                text: 'لا يمكنك التراجع بعد التأكيد',
                                type: 'warning',
                                showCancelButton: true,
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#d33',
                                confirmButtonText: 'نعم  , تأكيد',
                                cancelButtonText:'إلغاء',
                                }).then((result) => {
                                if (result.value) {
                                $.ajax({
                                    type: "POST",
                                    url: "{{route('admin.fullcalender.create')}}",
                                    data: {
                                            id: event.id,
                                            type: 'delete'
                                    },
                                    success: function (response) {
                                        calendar.fullCalendar('removeEvents', event.id);
                                        displayMessage("تم الحذف بنجاح");
                                    }
                                });

                            } 
                        });

                        }
     
                    });
     
    });
     
    function displayMessage(message) {
        toastr.success(message, 'الاجندة والملاحظات');
    } 
      
 
    </script>
    
@endpush
