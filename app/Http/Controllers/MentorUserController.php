<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\MentorUser;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Image;

class MentorUserController extends Controller
{
    
    public function index()
    {
        //
    }

    
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        // dd($request->all());
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        DB::beginTransaction();
        try {
        $auth_id = Auth::id();
        $create=MentorUser::create(
        [
            'user_id' => $auth_id,
            'mentor_id' => $request->mentor_id,
        ]);
            DB::commit();
            $response['status'] = true;
        } catch (\Exception $e) {
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
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        DB::beginTransaction();
        try {
        $auth_id = Auth::id();
        $create=MentorUser::where('user_id',$auth_id)
        ->update([
            'mentor_id' => $request->mentor_id,
        ]);
            DB::commit();
            $response['status'] = true;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage();
            $response['status'] = false;
            DB::rollback();
        }
        return response()->json($response);
    }

    
    public function destroy($id)
    {
        //
    }
}
