<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use App\Events\UserEvent;
use App\Models\User;
class EventController extends Controller
{
    //
    public function index(){

    	// $name=Auth()->user()->name;
    	// $email=Auth()->user()->email;
    	// $phone=Auth()->user()->phonenumber;
    	// event(new UserEvent($name,$email,$phone));
    	return view('admin/sendmail');
    }

    public function create(){
    	$email=request('email');
    	event (new UserEvent($email));
    	return redirect('admin/sendmail')->with('msg','send successfully');
    }
}
