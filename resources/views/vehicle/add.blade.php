@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card formBox">
                <div class="card-header"> <a  href="{{route('vehicleindex')}}" class="bread_crum"> Vehicle Management &nbsp;<i class="fa fa-angle-right" aria-hidden="true"></i></a>&nbsp; Add</div>
                <form action="{{route('vehiclestore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="form-group">
                            <label>Customers</label>
                            <select name="customer_id" class="form-control" required>
                                <option value="">Select Customers</option>
                                @foreach($customers as $value)
                                    <option value="{{$value->id}}" @if(isset($_GET['cid'])) @if($_GET['cid']==$value->id) selected @endif @endif>{{$value->company_name}}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_no" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Vehicle Type</label>
                            <input type="text" name="vehicle_type" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Vehicle GCV</label>
                            <input type="text" name="vehicle_gcv" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Vehicle Seater</label>
                            <input type="text" name="vehicle_seater" class="form-control" required="" />
                        </div>

                        <div class="form-group">
                            <label>Vehicle Description</label>
                            <textarea name="vehicle_description" class="form-control" required=""></textarea>
                        </div>

                        <div class="form-group"> 
                        <br>                      
                            <button type="submit" class="btn btn-primary themeBtn">Save</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
