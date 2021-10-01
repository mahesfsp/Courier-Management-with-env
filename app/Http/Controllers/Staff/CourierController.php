<?php

namespace App\Http\Controllers\Staff;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Courier\Courier;
use App\Models\Courier\Package;
use App\Models\Courier\Status;
use App\Models\Courier\CourierAction;
use Illuminate\Support\Facades\Auth;
use App\Models\Branch;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Route;
use Carbon\Carbon;

class CourierController extends Controller
{
  public function __construct()
    {
        //$this->middleware('auth')->except('courier_status');
       // $this->middleware('auth',['except'=>['track_no','courier_status']]);
        $this->middleware('staff',['except'=>['track','courier_status']]);
    }

  public function index()
  {

    $couriers = Courier::all();

    return view('staff.courier.index', compact('couriers'));
    // return view('staff.courier.index',compact('couriers'));
  }
  public function add()
  {
    $packages = Package::getallPackage();
    $branches = Branch::getallBranch();
    //dd($packages);
    return view('staff.courier.add', compact('packages', 'branches'));
  }
  public function store(Request $request)
  {
    try {
       // dd($request);
      $this->validate($request, [
        'sender_name' => 'required|string',
        'sender_contact' => 'required',
        'sender_address' => 'required',
        'sender_city' => 'required',
        'sender_state' => 'required',
        'sender_pin' => 'required',
        'sender_country' => 'required|string',
        'recipient_name' => 'required|string',
        'recipient_contact' => 'required',
        'recipient_address' => 'required',
        'recipient_city' => 'required',
        'recipient_state' => 'required',
        'recipient_pin' => 'required',
        'recipient_country' => 'required|string',
        'package_id' => 'required',
        'weight' => 'required'

      ]);
      //slug is used for company name example Mahes INC => mahes_inc
      $slug = Str::slug($request->company_name);

      $courier = new Courier();
      $courier->branch_id = auth()->user()->branch_id;
      $courier->tracking_no = time();
      $courier->sender_name = $request->sender_name;
      $courier->sender_contact = $request->sender_contact;
      $courier->sender_address = $request->sender_address;
      $courier->sender_city = $request->sender_city;
      $courier->sender_state = $request->sender_state;
      $courier->sender_pin = $request->sender_pin;
      $courier->sender_country = $request->sender_country;
      $courier->recipient_name = $request->recipient_name;
      $courier->recipient_contact = $request->recipient_contact;
      $courier->recipient_address = $request->recipient_address;
      $courier->recipient_city = $request->recipient_city;
      $courier->recipient_state = $request->recipient_state;
      $courier->recipient_pin = $request->recipient_pin;
      $courier->recipient_country = $request->recipient_country;
      $courier->courier_desc = $request->courier_desc;
      $courier->weight = $request->weight;
      $courier->lenght = $request->lenght;
      $courier->breadth = $request->breadth;
      $courier->height = $request->height;
      $courier->price = $request->price;
      $courier->from_location = $request->from_location;
      $courier->to_location = $request->to_location;
      $courier->package_id = $request->package_id;
      $courier->updated_by = auth()->user()->id;
      $courier->created_by = auth()->user()->id;
      $courier->save();
      return redirect()->back()->with('success', 'Courier details saved successfully');
    } catch (\Exception $e) {
      dd($e);
      return redirect()->back()->with('error', 'error:' . $e->getMessage());
    }
  }

  public function packageDetail()
  {
    try {

      $packages = Package::getallPackage();
      // dd($packages);  
      return view('staff.courier.package_details', compact('packages'));
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'error:' . $e->getMessage());
    }
  }

  public function addCourieraction($id)
  {
    try {
      
      $courier = Courier::find($id); 
     // 
      $status = Status::getallStatus();
      //dd($status);
      return view('staff.courier.courier_action', compact('courier','status'));
    } catch (\Exception $e) {
      return redirect()->back()->with('error', 'error:' . $e->getMessage());
    }
  }

  public function courierActionstore(Request $request)
  {
    try {
        // dd($request);
       $this->validate($request, [
        'remarks' => 'required',
        'days_remaining' => 'required',
      ]);
      //slug is used for company name example Mahes INC => mahes_inc
      $slug = Str::slug($request->remarks);

      $courier = new CourierAction();
    //  $courier->action_date ='2021-09-29 09:31:15';
      $courier->courier_id = 1;
      $courier->remarks = $request->remarks;
      $courier->days_remaining = $request->days_remaining;     
      $courier->status_id = $request->status_id;
      $courier->updated_by = auth()->user()->id;     
      $courier->save();
      return redirect()->back()->with('success', 'Courier Action details saved successfully');
    } catch (\Exception $e) {
      dd($e);
      return redirect()->back()->with('error', 'error:' . $e->getMessage());
    }
  }
}
