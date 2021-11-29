<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Emp;
use App\Models\Group;
use App\Models\Teammember;
use App\Models\Groupmember;
use Illuminate\Support\Facades\Gate;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\GroupMemberExport;
use App\Imports\GroupMemberImport;

class AdminTeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       //
           
          $users=User::where('assigned_status','1')->where('role','emp')->with('users')->get();
          return view('admin/teamview',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      

           //
         $view = User::select('*')->where('role','emp')->get();
         // $view1 = Emp::select('*')->get();
        $view1 = User::select('*')->where('role','cus')->where('assigned_status','0')->get();
         return view('admin/Team', ['view'=>$view,'view1'=>$view1]);
    }

    /*
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        // $team=new User();
        // $team->staff_name = '1';
        // $team->cutomers=$customers;
         // echo $staff;
        // $team->save();

        // $staff_name=$request->input('staff');
        // $customers=$request->input('customer');
        // $customers=implode(',',$customers);  
        // $user=User::find($staff_name); 
        // $user->emps()->attach($request->input('customer'));    
        // return redirect('admin/team')->with('message','Inserted Successfully');

        $staff_name=$request->input('staff');
        $customers=$request->input('customer');
        $customers=implode(',',$customers);  
        $user=User::find($staff_name); 
        $user->users()->attach($request->input('customer'));   

        //upadte assigned_status

        $data1=User::find($staff_name);
        $data1->assigned_status='1';
        $data1->save();

        $aa=$request->input('customer');
        foreach ($aa as $a) 
        {
            $data=User::find($a);
            $data->assigned_status='1';
            $data->save();
        }

        return redirect('admin/team/create')->with('message','Inserted Successfully');
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

    public function export(){

       return Excel::download(new GroupMemberExport,'GroupMember.xlsx');

    }
    public function importfile(){

       return view('admin/importfile');

    }
    public function import(){

       Excel::Import(new GroupMemberImport,request()->file('file'));
       return redirect()->back()->with('message','Imported Successfully');

    }
}
