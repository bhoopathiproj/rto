@extends('layouts.base')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Vehicle Add</div>
                <form action="{{route('vehiclestore')}}" method="POST">
                    {{csrf_field()}}
                    <div class="card-body">
                        <div class="col-md-12">
                            <label>Vehicle Number</label>
                            <input type="text" name="vehicle_no" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Type</label>
                            <input type="text" name="vehicle_type" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle GCV</label>
                            <input type="text" name="vehicle_gcv" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Seater</label>
                            <input type="text" name="vehicle_seater" class="form-control" />
                        </div>

                        <div class="col-md-12">
                            <label>Vehicle Description</label>
                            <textarea name="vehicle_description" class="form-control"></textarea>
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
