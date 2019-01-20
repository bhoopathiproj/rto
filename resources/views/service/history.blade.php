@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <a href="{{route('serviceindex')}}" class="bread_crum">Service Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>&nbsp; History
                    
                </div>
                
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Service Type:</label>
                                <span>{{$service->servicestype->service_name}}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Status:</label>
                                @if($service->status==0) <span style="color: Red;">Not Paid</span> @else <span style="color: Green;">Paid</span> @endif
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Customer Name:</label>
                                <span>{{$service->servicescustomer->customer_name}}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Service Charge:</label>
                                <span>{{$service->service_charge}}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Amount:</label>
                                <span>{{$service->amount}}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>Total:</label>
                                <span>{{$service->total}}</span>
                            </div>
                        </div>
                    
                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>From date:</label>
                                <span>{{date('d-m-Y',strtotime($service->from_date))}}</span>
                            </div>
                        </div>

                        <div class="col-sm-6 col-md-4">
                            <div class="overViewBox">
                                <label>To date:</label>
                                <span>{{date('d-m-Y',strtotime($service->to_date))}}</span>
                            </div>
                        </div>

                    </div>
                        
                </div>
                
                <br>

                <div class="card-body">
                    <table class="table datatableBx">
                        <thead>
                        <tr>
                            <th>S.No</th>          
                            <th>Paid Amount</th>                            
                            <th>Balance</th>
                            <th>Date</th>
                        </tr>
                        </thead>

                        <tbody>
                            @foreach($serviceschild as $index=>$value)
                            <tr>
                                <td>{{$index+1}}</td>
                                <td>{{$value->advance}}</td>
                                <td>{{$value->balance}}</td>
                                <td>
                                  {{date('d-m-Y',strtotime($service->created_at))}}  
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
