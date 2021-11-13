<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
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
        return view('admin/viewcustomer',compact('view'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin/addcustomer');
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
        $request->validate([

            'fname'=>'required',
            'lname'=>'required',
            'email'=>'required',
            'phno'=>'required'

          ]);


          // insert into table  

           $add =new User();
           $fn=request('fname');
           $ln=request('lname');
           $name=$fn." ".$ln;
           $add->name=$name;
           // $add->lastname=request('lname');
           $add->email=request('email');
           $add->phonenumber=request('phno');
           $add->role='cus';
           $add->password=Hash::make('1234567890');
           $add->save();
           return redirect('customer/create')->with('message','Inserted Successfully');
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
        return view('admin/editcustomer',['data'=>$data]);
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
        return redirect('customer/'.$data->id.'/edit')->with('message','Updated Successfully');
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
         // $data->delete();
         // DB::update('update adds set active_status=?,delete_status = ? where id = ?',[0,1,$id]);
         $data->active_status="0";
         $data->delete_status="1";
         $data->save();
         return redirect('customer');
    }
}
