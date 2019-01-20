@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header">
                    <a  href="{{route('serviceindex')}}" class="bread_crum" > Service Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>&nbsp; Edit
                </div>

                <form id="service_form" action="{{route('serviceupdate',$service->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        
                        <div class="form-group">
                            <label>Service Type</label>
                            <select class="form-control" readonly>
                                <option value="">Select Service</option>
                                @foreach($servicetypes as $value)
                                    <option value="{{$value->id}}" @if($service->service_type_id==$value->id) selected @endif  >{{$value->service_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Service Charge</label>
                            <input type="text" id="service_charge" value="{{$service->service_charge}}" class="form-control" readonly="">
                        </div>                       

                        <div class="form-group">
                            <label>Vehicle</label>
                            <select class="form-control" readonly>
                                <option value="">Select Vehicle</option>
                                @foreach($vehicles as $value)
                                    <option value="{{$value->id}}" @if($service->vehicle_id==$value->id) selected @endif >{{$value->vehicle_no}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Term Period</label>
                            <select class="form-control" readonly>
                                <option value="">Select Term</option>
                                <option value="1" @if($service->term_period==1) selected @endif>Quartely</option>
                                <option value="2" @if($service->term_period==2) selected @endif>Halfyearly</option>
                                <option value="3" @if($service->term_period==3) selected @endif>Annual</option>
                                <option value="4" @if($service->term_period==4) selected @endif>5 Years</option>
                                
                            </select>
                        </div>
                        
                        <div class="form-group">
                            <label>From Date</label>
                            <input type="text" value="{{date('d-m-Y',strtotime($service->from_date))}}" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label>To Date</label>
                            <input type="text" value="{{date('d-m-Y',strtotime($service->to_date))}}" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label>Amount</label>
                            <input type="text" id="service_amount" value="{{$service->service_amount}}" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label>Total</label>
                            <input type="text" id="total" value="{{$service->total}}" class="form-control" readonly />
                        </div>

                        <div class="form-group">
                            <label>Balance Need to Pay</label>
                            <input type="text" id="balance" value="{{$service->balance}}" class="form-control" readonly="" />
                        </div>

                        <div class="form-group">
                            <label>Paying Amount</label>
                            <input type="text" id="advance" name="advance" class="form-control" required="" onfocusout="mybalcalcfunc()"/>
                        </div>

                        <div class="form-group">
                            <label>Balance</label>
                            <input type="text" id="curr_balance" name="balance" class="form-control" required="" readonly="" />
                        </div>                      

                        <div class="form-group"> 
                                                
                            <button type="button" class="btn btn-primary themeBtn" onclick="myfuncsubmit();" >Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">

function myfuncsubmit() {

    var n1=$('#curr_balance').val();

    if(n1!=''){
        if(parseFloat(n1)>=0){
            $('#service_form').submit();
        }else{
            alert("Given amount is greater than balance");
        }
    }else{
        alert("Please enter amount, and try again");
    }
}    
    
function mybalcalcfunc() {

    var n1=$('#balance').val();
    var n2=$('#advance').val();

    if(n2!='0'){
        if(parseFloat(n1)>=parseFloat(n2)){
            var n3=parseFloat(n1)-parseFloat(n2);
            $('#curr_balance').val(n3);
        }else{
            alert("Given amount is greater than balance");
        }
    }else{
        alert("Given amount is greater than balance");
    }
}
</script>
@endsection
