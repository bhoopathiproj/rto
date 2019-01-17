@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Service Add
                    <a  href="{{route('serviceindex')}}" > < Back</a>
                </div>

                <form action="{{route('servicestore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        
                        <div class="col-md-12">
                            <label>Service Type</label>
                            <select name="service_type_id" class="form-control" required onchange="myservicefunc(this.options[this.selectedIndex].value);">
                                <option value="">Select Service</option>
                                @foreach($servicetypes as $value)
                                    <option value="{{$value->id}}">{{$value->service_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Service Charge</label>
                            <input type="text" id="service_charge" class="form-control" value="0.00" readonly="">
                        </div>                       

                        <div class="col-md-12">
                            <label>Vehicle</label>
                            <select name="vehicle_id" class="form-control" required>
                                <option value="">Select Vehicle</option>
                                @foreach($vehicles as $value)
                                    <option value="{{$value->id}}">{{$value->vehicle_no}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-md-12">
                            <label>Term Period</label>
                            <select name="term_period" class="form-control" required>
                                <option value="">Select Term</option>
                                <option value="1">Quartely</option>
                                <option value="2">Halfyearly</option>
                                <option value="3">Annual</option>
                                <option value="4">5 Years</option>
                                
                            </select>
                        </div>
                        
                        <div class="col-md-12">
                            <label>From Date</label>
                            <input type="text" name="from_date" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>To Date</label>
                            <input type="text" name="to_date" class="form-control" required="" />
                        </div>

                        <div class="col-md-12">
                            <label>Amount</label>
                            <input type="text" id="service_amount" name="service_amount" class="form-control" required="" onfocusout="myamountcalcfunc()"/>
                        </div>

                        <div class="col-md-12">
                            <label>Total</label>
                            <input type="text" id="total" name="total" class="form-control" required="" readonly />
                        </div>

                        <div class="col-md-12">
                            <label>Paying Amount</label>
                            <input type="text" id="advance" name="advance" class="form-control" required="" onfocusout="mybalcalcfunc()"/>
                        </div>

                        <div class="col-md-12">
                            <label>Balance</label>
                            <input type="text" id="balance" name="balance" class="form-control" required="" readonly="" />
                        </div>                      

                        <div class="col-md-4"> 
                            <br>                      
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    
function mybalcalcfunc() {

    var n1=$('#total').val();
    var n2=$('#advance').val();
    var n3=parseFloat(n1)-parseFloat(n2);
    $('#balance').val(n3);
}

function myamountcalcfunc() {
    
    var n1=$('#service_charge').val();
    var n2=$('#service_amount').val();
    var n3=parseFloat(n1)+parseFloat(n2);
    $('#total').val(n3);
}

function myservicefunc(n) {
    
    //alert(n);
    $.ajax({
          url: "{{url('/getservicetypedetail')}}/"+n,
          type: "GET",
    }).done(function(response){
        
        $("#service_charge").val(response.service_charge);

    }).fail(function(jqXhr,status){

    });
}
</script>
@endsection
