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
use Session;
use Redirect;
use DateTime;
use Mail;
class UserController extends Controller
{
    public function account()
    {
        $data=Auth::user();
        return $data;
    }

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
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
            $data->name=$request->input('name');
            $data->email=$request->input('email');
            $data->contact=$request->input('contact');
            $data->address=$request->input('address');
            $data->password=bcrypt($request->input('password'));
            $data->type=3;
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


   public function login(Request $request)
   {
    //    dd($request->all());
        $http = new \GuzzleHttp\Client;
        try {
            $response = $http->post(config('app.url').'/oauth/token', [
                'form_params' => [
                    'grant_type' => 'password',
                    'client_id' => 4,
                    'client_secret' => config('app.passport'),
                    'username' => $request->email,
                    'password' => $request->password,
                ]
            ]);
            return $response->getBody();
        } catch (\GuzzleHttp\Exception\BadResponseException $e) {
            if ($e->getCode() === 400) {
                return response()->json([
                    'message' => 'Invalid Request. Please enter a username or a password.',
                    'access_token' => false
                ], 200);
            } else if ($e->getCode() === 401) {
                return response()->json([
                    'message' => 'Your credentials are incorrect. Please try again',
                    'access_token' => false
                ],200);
            }
            return response()->json([
                'message' => $e->getMessage(),
                'access_token' => false
            ], 200);
        }
    }


    public function logout()
    {

        $response=array();
        $response['status']=false;
        $response['data']='';
        try {
            $user = Auth::user()->token();
            $response['data']=$user->revoke();
            $response['status']=true;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage();
            DB::rollback();
        }
        return response()->json($response);
    }

    
    public function update(Request $request, $id)
   {
       
        if(Auth::id()!=$id)
        {
            $response['data'] ='Auth id and Prams is didnt matched';
            return $response;

        }
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'contact' => ['required', 'string','min:8'],
        ]);
        if ($validator->fails()) {
            $response['data'] = $validator->errors();
            return response()->json($response);
        }
        DB::beginTransaction();
        try {
        
            $response['data']=User::where('id',$id)->update(
                [
                    'name' => $request->name,
                    'contact' => $request->contact,
                ]);
        
            DB::commit();
            $response['status']=true;
        } catch (\Exception $e) {
            $response['data']=$e->getMessage();
            DB::rollback();
        }
        return response()->json($response);

    }

    public function avatar(Request $request)
    {
        $user_id = Auth::id();
        //return $request->all();
        if($request->hasFile('image'))
         {
             $request->image->store('public/uploads/avatar');
             $pic= '/storage/uploads/avatar/'.$request->image->hashName();
         }               
        $update=User::where('id', $user_id)->update([
         'image' => $pic?URL::to('/').$pic:'/profile.png'
        ]);
        if($update)
        {
         return response()->json([
             'data' => $pic,
             'status' => true
         ],200);
         }
         return response()->json([
             'data' => 'Failed',
             'status' => false
         ],200);
    }

    public function changePass(Request $request)
    {
       $response=array();
       // dd($request->all());
       $validator = Validator::make($request->all(), [
           'newPassword' => ['required'],
            'confirmPassword' => ['same:newPassword'],
       ]);
       if ($validator->fails())
       {
           return response([
               'status' => 400 ,
               'message'=>$validator->errors()->all(),
               'data' => false,
           ], 422);
       }
       DB::beginTransaction();
       try {
        if(!Hash::check($request->oldPassword,Auth::user()->password))
        {
            return response()->json(
                [
                   'status' => 400 ,
                    'message'=> 'Current Password dose not matched',
                    'data' => false,
                ], 200);
        }
        else
        {                     
            $update=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newPassword)]);  
        }
        DB::commit();
           $response['status']= 200;
           $response['message']= 'Successfuly Done';
           $response['data'] = $update;
       } catch (\Exception $e) {
           $response['status']=$e->getStatusCode();
           $response['message'] = 'Not Successfull';
           $response['data'] = false;
           DB::rollback();
       } 
       return response()->json($response); 
    }

}
