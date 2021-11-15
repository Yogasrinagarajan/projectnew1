<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $view=User::where('role','emp')->where('active_status','1')->get();
        return view('admin/Viewemployee',compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/addemployee');
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
        $employee->role='emp';
        $employee->password=Hash::make('1234567890');
        $employee->save();
        return redirect('admin/employee/create')->with('message','Inserted Successfully');
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
        return view('admin/editemployee',['data'=>$data]);
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
        return redirect('admin/employee/'.$data->id.'/edit')->with('message','Updated Successfully');
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
         $data=User::find($id);
         $data->active_status="0";
         $data->delete_status="1";
         $data->save();
         return redirect('admin/employee');
    }
}
