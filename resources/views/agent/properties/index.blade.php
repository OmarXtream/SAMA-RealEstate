@extends('frontend.layouts.app')

@section('styles')
<link href="{{asset('frontend/css/styles.css')}}" rel="stylesheet">

@endsection

@section('content')

    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col s12 m9">

                    <h4 class="agent-title text-center my-5">قائمة عقاراتي</h4>
                    
                    <div class="agent-content">
                            <div class="ltn__myaccount-tab-content-inner">
                                <div class="table-responsive">

                        <table class="striped responsive-table table">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">العنوان</th>
                                    <th scope="col">النوع</th>
                                    <th scope="col">المدينة</th>
                                    <th scope="col">-</th>
                                </tr>
                            </thead>
                    
                            <tbody>
                                @foreach( $properties as $key => $property )
                                    <tr>
                                        <td class="right-align">{{$key+1}}.</td>
                                        <td>
                                            <span class="tooltipped" data-position="bottom" data-tooltip="{{$property->title}}">
                                                {{ str_limit($property->title,30) }}
                                            </span>
                                        </td>
                                        
                                        <td>{{ ucfirst($property->type) }}</td>
                                        <td>{{ ucfirst($property->city) }}</td>
    
                                        <td>
                                            <a href="{{route('property.show',$property->slug)}}" target="_blank">
                                                <i class="fa fa-eye" aria-hidden="true" title="معاينة"></i>
                                            </a>
                                            <button type="button" class="btn btn-sm" onclick="deleteProperty({{$property->id}})">
                                                <i class="fa fa-times text-danger" aria-hidden="true" title="حذف"></i>
                                            </button>
                                            <form action="{{route('agent.properties.destroy',$property->slug)}}" method="POST" id="del-property-{{$property->id}}" style="display:none;">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <div class="center">
                            {{ $properties->links() }}
                        </div>
                    </div>
        
                </div>

            </div>

        </div>

            </div>
        </div>
    </section>

@endsection

@section('scripts')
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function deleteProperty(id){
            swal({
            title: 'هل انت متاكد؟',
            text: "لا يمكنك استرجاع البيانات بعد الحذف",
            icon: 'warning',
            buttons: true,
            dangerMode: true,
            buttons: ["تراجع", "تأكيد الحذف"]
            }).then((value) => {
                if (value) {
                    document.getElementById('del-property-'+id).submit();
                    swal(
                    'تم التنفيذ',
                    'تم الحذف بنجاح.',
                    'success',
                    {
                        buttons: false,
                        timer: 1000,
                    })
                }
            })
        }
    </script>
@endsection