@extends('admin.layout.base')

@section('content')
<div class="container">
    <div class="row ">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Service Types Management</span>
                    <span class="pull-right"><a href="{{route('admin.servicetypesadd')}}" class="themeBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table datatableBx">
                        <thead>
                        <tr>
                            <th>S.No</th>
                            <th>Service Name</th>
                            <th>Service Charge</th>                           
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($servicetypes as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$value->service_name}}</td>
                                <td>{{$value->service_charge}}</td>
                                <td>
                                    @if($value->status==0) <span style="color: Red;">Inactive</span> @else <span style="color: Green;">Active</span> @endif
                                </td>
                                <td>
                                    <a href="{{route('admin.servicetypesedit',$value->id)}}" class="icoBtn" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>

                                   

                                    {{--<a href="{{route('admin.servicetypesdelete',$value->id)}}" class="">Delete</a>--}}
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

@section('scripts')

<script type="text/javascript">
$.noConflict();

    jQuery( document ).ready(function( $ ) {
        $('.datatableBx').DataTable({
            responsive: true,
        });
    });
</script>


@endsection
