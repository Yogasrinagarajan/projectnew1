<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
class TeamController extends Controller
{
    //
    function index()
    {
    	 $view = User::select('*')->where('role','emp')->get();
    	 $view1 = User::select('*')->where('role','cus')->get();
	     return view('admin/Team', ['view'=>$view,'view1'=>$view1,'view2'=>$view2]);
    }

    public function store(Request $request)
    {
    	 $team = new Team();
    	 $team->user_id='1';
    	 $team->staff_name='chgvdhg';
    	 $team->cutomers='fjvbhjfdbh';
    	 $team->save();
    	 return redirect('admin/Team')->with('message','Inserted Successfully');
    }
}
