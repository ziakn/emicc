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

}
