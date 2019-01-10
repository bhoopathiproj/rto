<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;

use App\Vehicle;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    // Vehicle Management - Start
    
    public function vehicleindex()
    {
        $user=Auth::user();
        $vehicles=Vehicle::where('user_id',$user->id)->get();
        return view('vehicle.index',compact('vehicles'));
    }

    public function vehicleadd()
    {
        
        return view('vehicle.add');
    }

    public function vehiclestore(Request $request){

        $this->validate($request, [               
            'vehicle_no' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'vehicle_type' => 'required',
            'vehicle_gcv' => 'required',
            'vehicle_seater' => 'required|numeric',
            'vehicle_description' => 'required',
        ]);

        try{

            $user=Auth::user();
            
            $vehicle=new Vehicle;
            $vehicle->user_id=$user->id;
            $vehicle->user_type=1;
            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->vehicle_type=$request->vehicle_type;
            $vehicle->vehicle_gcv=$request->vehicle_gcv;
            $vehicle->vehicle_seater=$request->vehicle_seater;
            $vehicle->vehicle_description=$request->vehicle_description;
            $vehicle->save();

            return back()->with('flash_success', 'Vehicle added successfully !');
            
        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function vehicleedit($id)
    {
        $vehicle=Vehicle::findOrFail($id);

        return view('vehicle.edit',compact('vehicle'));
    }

    public function vehicleupdate($id,Request $request){

        $this->validate($request, [               
            'vehicle_no' => 'required|regex:/^[a-zA-Z0-9 ]+$/u',
            'vehicle_type' => 'required',
            'vehicle_gcv' => 'required',
            'vehicle_seater' => 'required|numeric',
            'vehicle_description' => 'required',
        ]);

        try{

            $user=Auth::user();
            
            $vehicle=Vehicle::findOrFail($id);
            $vehicle->user_id=$user->id;
            $vehicle->user_type=1;            
            $vehicle->vehicle_no=$request->vehicle_no;
            $vehicle->vehicle_type=$request->vehicle_type;
            $vehicle->vehicle_gcv=$request->vehicle_gcv;
            $vehicle->vehicle_seater=$request->vehicle_seater;
            $vehicle->vehicle_description=$request->vehicle_description;
            $vehicle->status=$request->status;
            $vehicle->save();

            return back()->with('flash_success', 'Vehicle updated successfully !');

        } catch (Exception $e) {
            return back()->with('flash_error', 'Something went wrong !');
        }
        
    }

    public function vehicledelete($id)
    {
        $vehicle=Vehicle::findOrFail($id);
        $vehicle->status=0;
        $vehicle->save();

        return back()->with('flash_success', 'Vehicle deleted successfully !');
    }

    // Vehicle Management - End



}
