<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\UserType;
use Mail;
use Session;
use Redirect;
use DB;
use Carbon\Carbon;

class UserTypeController extends Controller
{
  
    public function index()
    {
        $auth=Auth::user();
        $data=UserType::orderBy('id', 'DESC')
        ->get();
        return $data;
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        DB::beginTransaction();
        try {
        $auth_id=Auth::id();
        $response['data']=UserType::create(
            [
                'admin_id' => $auth_id,
                'name' => $request->name
            ]
        );
        DB::commit();
        $response['status'] = true;
        }
        catch (\Exception $e) 
        {
            $response['data']=$e->getMessage();
            $response['status'] = false;
            DB::rollback();
        }
        return response()->json($response);
    }

   
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

 
    public function update(Request $request, $id)
    {
        // dd($id);
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        DB::beginTransaction();
        try {
           UserType::where('id',$id)
             ->update(
            [
                'name' => $request->name
            ]
        );
        DB::commit();
        $response['data']=UserType::find($id);
        $response['status'] = true;
        } catch (\Exception $e) 
        {
            $response['data']=$e->getMessage();
            $response['status'] = false;
            DB::rollback();
        }
            
        return response()->json($response);
    }

    
    public function destroy($id)
    {
        $response=array();
        $response['status']=false;
        $response['data'] = UserType::find($id);
        
        if($response['data'])
        {
            $usercounter= \App\User::where('type',$id)->count();
            if($usercounter==0)
            {
                $response['data']=$response['data']->delete();
                $response['status']=true;
            }
            else
            {
                $response['data']="Users exist under this User Type";

            }   
        }
        else
        {
            $response['data']="Data Not deleted";  
        }
        return response()->json($response);
    }
}
