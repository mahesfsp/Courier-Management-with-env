<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Branch;

class BranchController extends Controller
{
    public function index(){

        $branches = Branch :: latest()->get();
        return view('admin.branch.index',compact('branches'));

    }

    public function add(){
               
        return view('admin.branch.add');

    }

    public function edit($id){

        $branch = Branch::find($id);               
        return view('admin.branch.edit',compact('branch'));

    }

    
    public function delete($id){
        
        Branch::find($id)->delete();               
        return redirect()->back()->with('success','Branch Delete successfully');

    }
}
