@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Service Management</span>
                    <span class="pull-right"><a href="{{route('serviceadd')}}" class="themeBtn"><i class="fa fa-plus" aria-hidden="true"></i> Add</a></span>
                </div>

                <div class="card-body">
                    <table class="table datatableBx">
                        <thead>
                        <tr>
                            <th>S.No</th>                            
                            <th>Service Type</th>                            
                            <th>Customer Name</th>                            
                            <th>From date</th>                            
                            <th>To date</th>                            
                            <th>Service Charge</th>                           
                            <th>Amount</th>                            
                            <th>Total</th>                            
                            <th>Paid Amount</th>                            
                            <th>Balance</th>                            
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($services as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>          
                                <td>{{$value->servicestype->service_name}}</td>
                                <td>{{$value->servicescustomer->customer_name}}</td>
                                <td>{{date('d-m-Y',strtotime($value->from_date))}}</td>
                                <td>{{date('d-m-Y',strtotime($value->to_date))}}</td>
                                <td>{{$value->service_charge}}</td>
                                <td>{{$value->service_amount}}</td>
                                <td>{{$value->total}}</td>
                                <td>{{$value->advance}}</td>
                                <td>{{$value->balance}}</td>
                                <td>
                                    @if($value->status==0) <span style="color: Red;">Not Paid</span> @else <span style="color: Green;">Paid</span> @endif
                                </td>
                                <td>
                                    @if($value->status==0)
                                        <a href="{{route('serviceedit',$value->id)}}" class="icoBtn" title="Edit"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> 
                                    @endif

                                    <a href="{{route('servicehistory',$value->id)}}" class="icoBtn" title="History"><i class="fa fa-history" aria-hidden="true"></i></a> 

                                    <a href="{{route('servicedelete',$value->id)}}" class="icoBtn dangerTxt" title="Delete"><i class="fa fa-trash-o" aria-hidden="true"></i></a> 
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