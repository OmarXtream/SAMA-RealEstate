@extends('backend.layouts.app')

@section('title', 'Delegate')

@push('styles')

    <!-- JQuery DataTable Css -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/css/dataTables.bootstrap.css') }}">

@endpush

@section('content')

    <div class="block-header">
        <a href="{{route('admin.delegates.create')}}" class="waves-effect waves-light btn right m-b-15 addbtn">
            <i class="material-icons left">add</i>
            <span>إنشاء </span>
        </a>
    </div>

    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header bg-indigo">
                    <h2>قائمة المناديب</h2>
                </div>
                <div class="body">
                    <div class="table-responsive">
                        <table class="table table-bordered table-striped table-hover dataTable js-exportable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>المدينة</th>
                                    <th>الحي</th>
                                    <th>-</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th>#</th>
                                    <th>الاسم</th>
                                    <th>المدينة</th>
                                    <th>الحي</th>
                                    <th>-</th>
                                </tr>
                            </tfoot>
                            <tbody>
                                @foreach( $delegates as $delegate )
                                <tr>
                                    <td>{{$delegate->id}}</td>
                                    <td>{{$delegate->name}}</td>
                                    <td>{{$delegate->city}}</td>
                                    <td>{{$delegate->district}}</td>

                                    <td class="text-center">
                                        <button type="button" class="btn btn-danger btn-sm waves-effect" onclick="deleteFeature({{$delegate->id}})">
                                            <i class="material-icons">delete</i>
                                        </button>
                                        <form action="{{route('admin.delegates.destroy',$delegate->id)}}" method="POST" id="del-feature-{{$delegate->id}}" style="display:none;">
                                            @csrf
                                            @method('DELETE')
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection


@push('scripts')

    <!-- Jquery DataTable Plugin Js -->
    <script src="{{ asset('backend/plugins/jquery-datatable/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/skin/bootstrap/js/dataTables.bootstrap.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/dataTables.buttons.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.flash.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/jszip.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/pdfmake.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/vfs_fonts.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.html5.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/jquery-datatable/extensions/export/buttons.print.min.js') }}"></script>

    <!-- Custom Js -->
    <script src="{{ asset('backend/js/pages/tables/jquery-datatable.js') }}"></script>

    <script>
        function deleteFeature(id){
            
            swal({
            title: 'هل انت متاكد؟',
            text: "لا يمكنك التراجع بعد التأكيد",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'تأكيد الحذف'
            }).then((result) => {
                if (result.value) {
                    document.getElementById('del-feature-'+id).submit();
                    swal(
                    'تم التنفيذ',
                    'تم الحذف بنجاح',
                    'success'
                    )
                }
            })
        }
    </script>


@endpush