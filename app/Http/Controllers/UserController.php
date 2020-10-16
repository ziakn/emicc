<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use App\User;
use App\MentorUser;
use App\Articulat;
use Mail;
use Session;
use Redirect;
use Illuminate\Support\Facades\Hash;
use DB;
use Carbon\Carbon;
use Image;

class UserController extends Controller
{
    
    public function index(Request $request)
    {
        $auth=Auth::user();
        if($auth->type==1)
        {
            $data=User::with('user_type')->paginate(20);
        }
        if($auth->type==2)
        {
            $data=User::where('admin_id',$auth->id)->with('user_type')->paginate(20);
        }
       
        return $data;
    }

   
    public function getUserFilter()
    {
        $auth=Auth::user();
        if($auth->type==1)
        {
            $data=User::with('user_type')->get();
        }
        if($auth->type==2)
        {
            $data=User::where('admin_id',$auth->id)->get();
        }
       
        return $data;
    }

   
    public function store(Request $request)
    {
        $response=array();
        $response['status']=false;
        $response['data'] ='';
        DB::beginTransaction();
        try {
            $auth_id = Auth::id();
        $create=User::create(
        [
            'admin_id' => $auth_id,
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'type' => $request->type,
            'status' => $request->status,
            'password'=> bcrypt($request->password)
        ]);
            DB::commit();
            $response['data']=User::with('user_type')->find($create->id);
        
       
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
        User::where('id',$id)
       ->update(
        [
            'name' => $request->name,
            'email' => $request->email,
            'contact' => $request->contact,
            'address' => $request->address,
            'type' => $request->type,
            'status' => $request->status,
        ]
    );
    DB::commit();
    $response['data']=User::with('user_type')->find($id);
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
        $response=array();
        $response['status']=false;
        $response['data']  = User::find($id);
        if($response['data'])
        {
            $usercounter= \App\User::where('parent_id',$id)->get()->count();
            if($usercounter==0)
            {
                $response['data']=$response['data']->delete();
                $response['status']=true;
            }
            else
            {
                $response['data']="Executive/TeleSale exist under this User";
            }   
        }
        else
        {
            $response['data']="Data Not deleted";  
        }
        return response()->json($response);
    }

    public function logout()
    {  
        Auth::logout();
        Session::flush();
        return Redirect::to('/login');
    }

    public function profile()
    {
        $data=Auth::user();
        return $data;
    }

    public function changePass(Request $request)
    {
        

        $request->validate([
            'newPassword' => ['required'],
            'confirmPassword' => ['same:newPassword'],
        ]);
        if(!Hash::check($request->oldPassword,Auth::user()->password))
        {
            return response()->json(
                [
                    'status'=> false,
                    'message'=> 'Current Password dose not matched'
                ], 200);
        }
        else
        {                     
            $update=User::find(auth()->user()->id)->update(['password'=> Hash::make($request->newPassword)]);  
            if($update)   
            {
               
                return response()->json(
                    [
                        'status'=> true,
                        'message'=> 'Successfuly Changed'
                    ], 200);
            } 
            else
            {
                return response()->json(
                    [
                        'status'=> false,
                        'message'=> 'Failed, Try again'
                    ], 200);
            }

        }
    }

    public function updateUser(Request $request)
    {
        $update=User::where('id',$request->id)->update(
            [
                'name' => $request->name
            ]);
        return $update;
    }

    public function updatepassword(Request $request)
   {
        $update=User::where('id',$request->id)->update(
           [
               'password'=>bcrypt($request->password),
           ]
        );
       
       return $update;
   }

   public function avatar(Request $request)
   {
       $user_id = Auth::id();
       //return $request->all();
       $request->file('myFile')->store('public/uploads/avatar');
       $pic= '/storage/uploads/avatar/'.$request->myFile->hashName();   
       Image::make('storage/uploads/avatar/'.$request->myFile->hashName())->fit(600, 400, function($constraint) {
        $constraint->aspectRatio();})->save('storage/uploads/avatar/'.$request->myFile->hashName());              
       $update=User::where('id', $user_id)->update([
           'image' => $pic
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


   public function getMentor()
   {
       $data = User::where('type',2)->get();
       return $data;
   }

   public function getMentorUser()
   {
       $user_id = Auth::id();
       $data = MentorUser::where('user_id',$user_id)->first();
       return $data;
   }

   public function getusermentor(Request $request)
   {
       $type = Auth::user();
       if($type->type == 1)
       {
         $data2 = Articulat::with('user')->with('comunicate')->with('takecation');
         if(isset($request->user_id) && !empty($request->user_id))
        {
            $data2= $data2->where('user_id',$request->user_id);
        }
        if(isset($request->name) && !empty($request->name))
        {
            $name=$request->name;
            $data2= $data2->whereHas('user', function ($query) use ($name) {
                $query->where('name', '=', $name);
            });
        }
        $data2=$data2->paginate(20);
       }
       elseif($type->type ==2)
       {
        $id = Auth::id();
        $data = MentorUser::where('mentor_id',$id)->get();
         $user_id = array();
 
         foreach($data as $item)
         {
             array_push($user_id, $item['user_id']);
         }
         array_push($user_id, $id);
 
         $data2 = Articulat::with('user')->with('comunicate')->with('takecation');
         if(isset($request->user_id) && !empty($request->user_id))
        {
            $data2= $data2->where('user_id',$request->user_id);
        }
        else
        {
            $data2= $data2->wherein('user_id',$user_id);
        }
        if(isset($request->name) && !empty($request->name))
        {
            $name=$request->name;
            $data2= $data2->whereHas('user', function ($query) use ($name) {
                $query->where('name', '=', $name);
            });
        }
        else
        {
            $data2= $data2->wherein('user_id',$user_id);
        }


         $data2=$data2->paginate(20);
       }
      

       return $data2;
   }
   
    

}
