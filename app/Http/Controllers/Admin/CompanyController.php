<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//use Illuminate\Http\Str;
use App\Models\CompanyMaster;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Carbon\Carbon;

class CompanyController extends Controller
{
    public function index(){
      $companies = CompanyMaster::all();
     
      if(count($companies) > 0) 
      {

        $company = CompanyMaster::find(1);        
        return view('admin.company.index',compact('companies','company'));

      }else { 
       
        return view('admin.company.index',compact('companies'));
        
      }
     
}


public function store(Request $request){
  $this->validate($request,[
    'company_name'=> 'required|string',
    //for image upload intervantional laravel package i installed via composer
    'company_logo' => 'required',
    'address'=> 'required',
    'company_city'=> 'required',
    'company_state'=> 'required',
    'company_pin'=> 'required',
    'company_country'=> 'required|string',
    'company_phone'=> 'required|string',
    'company_email'=> 'required|email',
    'company_gst'=> 'required|string',
  ]);
//slug is used for company name example Mahes INC => mahes_inc
  $slug = Str::slug($request->company_name);

  $image = $request->file('company_logo');
  if(isset($image)){ 
    //dd($image);
    //Carbon is default packagee
    $date = Carbon::now()->toDateString();
    $imageName = $slug . '-' . $date . '-' .uniqid() . '.' . $image->getClientOriginalExtension();

    if(!Storage::disk('public')->exists('company')){

      Storage::disk('public')->makeDirectory('company');

    }

    $companyLogo = Image::make($image)->save($image->getClientOriginalExtension());
    Storage::disk('public')->put('company/'.$imageName,$companyLogo);
  }
  else{
    $imageName = 'default.png';
  }

  $company = new CompanyMaster();
  $company->company_name = $request->company_name;
  $company->company_logo = $imageName;
  $company->address = $request->address;
  $company->company_city = $request->company_city;
  $company->company_state = $request->company_state;
  $company->company_pin = $request->company_pin;
  $company->company_country = $request->company_country;
  $company->company_phone = $request->company_phone;
  $company->company_email = $request->company_email;
  $company->company_gst = $request->company_gst;
$company->save();
return redirect()->back()->with('success','Company details saved successfully');
}

public function update(Request $request){

  $this->validate($request,[
    'company_name'=> 'required|string',
    //for image upload intervantional laravel package i installed via composer
    
    'address'=> 'required',
    'company_city'=> 'required',
    'company_state'=> 'required',
    'company_pin'=> 'required',
    'company_country'=> 'required|string',
    'company_phone'=> 'required|string',
    'company_email'=> 'required|email',
    'company_gst'=> 'required|string',
  ]);
  $company = CompanyMaster::find(1);
//slug is used for company name example Mahes INC => mahes_inc
  $slug = Str::slug($request->company_name);

  $image = $request->file('company_logo');
  if(isset($image)){ 
    //dd($image);
    //Carbon is default packagee
    $date = Carbon::now()->toDateString();
    $imageName = $slug . '-' . $date . '-' .uniqid() . '.' . $image->getClientOriginalExtension();

    if(!Storage::disk('public')->exists('company')){

      Storage::disk('public')->makeDirectory('company');

    }
    if(Storage::disk('public')->exists('company/'.$company->company_logo))
    {
    Storage::disk('public')->delete('company/'.$company->company_logo);
    }
    $companyLogo = Image::make($image)->save($image->getClientOriginalExtension());
    Storage::disk('public')->put('company/'.$imageName,$companyLogo);
   } else{
      $imageName = $company->company_logo;
      }
 

 
  $company->company_name = $request->company_name;
  $company->company_logo = $imageName;
  $company->address = $request->address;
  $company->company_city = $request->company_city;
  $company->company_state = $request->company_state;
  $company->company_pin = $request->company_pin;
  $company->company_country = $request->company_country;
  $company->company_phone = $request->company_phone;
  $company->company_email = $request->company_email;
  $company->company_gst = $request->company_gst;
$company->save();
return redirect()->back()->with('success','Company details updated successfully');

}
}