<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
class Employee_CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $view=User::where('active_status','1')->where('role','cus')->get();
        return view('employee/customerdetails',compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
         return view('employee/addcustomer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $fn=request('fname');
        $ln=request('lname');
        $name=$fn." ".$ln;
        $employee=new User();
        $employee->name=$name;
        $employee->email=request('email');
        $employee->phonenumber=request('phno');
        $employee->role='cus';
        $employee->password=Hash::make('1234567890');
        $employee->save();
        return redirect('employee/create')->with('message','Inserted Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = User::find($id);
        return view('employee/editcustomer',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $data=User::find($request->id);
        $fn=request('fname');
        $ln=request('lname');
        $name=$fn." ".$ln;
        $data->name=$name;
        $data->email=$request->email;
        $data->phonenumber=$request->phno;
        $data->save();
        return redirect('employee/'.$data->id.'/edit')->with('status','Updated Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
