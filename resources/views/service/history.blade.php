@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <span class="pull-left">Service History</span>
                    <span class="pull-right"><a href="{{route('serviceindex')}}">< Back</a></span>
                </div>
                
                <div class="card-body">
                    <div class="col-md-4">
                        <label>Service Type:</label>
                        <span>{{$service->servicestype->service_name}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>Service Charge:</label>
                        <span>{{$service->service_charge}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>Amount:</label>
                        <span>{{$service->amount}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>Total:</label>
                        <span>{{$service->total}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>Customer Name:</label>
                        <span>{{$service->servicescustomer->customer_name}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>From date:</label>
                        <span>{{date('d-m-Y',strtotime($service->from_date))}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>To date:</label>
                        <span>{{date('d-m-Y',strtotime($service->to_date))}}</span>
                    </div>

                    <div class="col-md-4">
                        <label>Status:</label>
                        @if($service->status==0) <span style="color: Red;">Not Paid</span> @else <span style="color: Green;">Paid</span> @endif
                    </div>
                </div>
                
                <br>

                <div class="card-body">
                    <table class="table">
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
