<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Http;
use DB;
use Auth;
use App\User;
use App\MentorUser;
use Session;
use Redirect;
use DateTime;
use URL;
use Mail;
class MentorController extends Controller
{
    
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'contact' => ['required', 'string','min:8'],
        ]);
        if ($validator->fails()) {
            return response()->json([
                'data' => $validator->errors(),
                'status' => false
           ],200);
        }
        DB::beginTransaction();
        try {
            $data=new User;
            $data->admin_id=1;
            $data->name=$request->input('name');
            $data->email=$request->input('email');
            $data->contact=$request->input('contact');
            $data->address=$request->input('address');
            $data->password=bcrypt($request->input('password'));
            $data->type=2;
            $data->status=1;
            $data->image='/profile.png';
            $data->save();    
            DB::commit();
            $status = true;  
        } catch (\Exception $e) {
            $data=$e->getMessage();
            $status = false;
            DB::rollback();
        }

        return response()->json([
            'data' => $data,
            'status' => $status
        ],200);
   }

   public function getMentor()
   {
       $data = User::where('type',2)->get();
       return $data;
   }

   public function getMentorUser()
   {
       $user_id = Auth::id();
       $data = MentorUser::where('user_id',$user_id)->with('mentor')->first();
       return $data;
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
        MentorUser::where('user_id',$auth_id)->delete();
        $create=MentorUser::create(
        [
            'user_id' => $auth_id,
            'mentor_id' => $request->mentor_id,
        ]);
            DB::commit();
            $response['status'] = true;
            $response['data'] =  $create;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage();
            $response['status'] = false;
            DB::rollback();
        }
        return response()->json($response);
    }

}
