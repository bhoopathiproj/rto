@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vehicle Edit <a  href="{{route('vehicleindex')}}" > < Back</a> </div>
                <form action="{{route('vehicleupdate',$vehicle->id)}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Company</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Select Customers</option>
                                @foreach($customers as $value)
                                    <option value="{{$value->id}}" @if($value->id==$vehicle->customer_id) selected @endif >{{$value->company_name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-md-12">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_no" class="form-control" value="{{$vehicle->vehicle_no}}" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Type</label>
                            <input type="text" name="vehicle_type" class="form-control"  value="{{$vehicle->vehicle_type}}"/>
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle GCV</label>
                            <input type="text" name="vehicle_gcv" class="form-control"  value="{{$vehicle->vehicle_gcv}}"/>
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Seater</label>
                            <input type="text" name="vehicle_seater" class="form-control"  value="{{$vehicle->vehicle_seater}}" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Description</label>
                            <textarea name="vehicle_description" class="form-control">{{$vehicle->vehicle_description}}</textarea>
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Status</label>
                            <select name="status" class="form-control">
                                <option value="0" @if($vehicle->status==0) selected @endif >Inactive</option>
                                <option value="1"  @if($vehicle->status==1) selected @endif >Active</option>
                            </select>
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
@endsection
