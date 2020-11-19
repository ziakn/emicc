<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Articulat;
use App\Comunicate;
use App\TakeAction;
use Mail;
use Session;
use Redirect;
use DB;
use Carbon\Carbon;

class ArticulatController extends Controller
{
    
    public function index()
    {
        $auth_id = Auth::id();
        $data = Articulat::orderBy('id','DESC')->where('user_id',$auth_id)->get();
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

        $auth_id = Auth::id();

        $create=Articulat::create(
        [
            'user_id' => $auth_id,
            'arta' => $request->arta,
            'artb' => $request->artb,
            'artc' => $request->artc,
            'date' => $request->date,
        ]);

        Comunicate::create(
            [
                'articulate_id' => $create->id,
                'user_id' => $auth_id,
                'arta1' => $request->arta1,
                'arta2' => $request->arta2,
                'arta3' => $request->arta3,
                'artb1' => $request->artb1,
                'artb2' => $request->artb2,
                'artb3' => $request->artb3,
                'artc1' => $request->artc1,
                'artc2' => $request->artc2,
                'artc3' => $request->artc3,
                'arta1status' => $request->arta1status,
                'arta2status' => $request->arta2status,
                'arta3status' => $request->arta3status,
                'artb1status' => $request->artb1status,
                'artb2status' => $request->artb2status,
                'artb3status' => $request->artb3status,
                'artc1status' => $request->artc1status,
                'artc2status' => $request->artc2status,
                'artc3status' => $request->artc3status,
            ]);
        
        TakeAction::create(
            [
                'articulate_id' => $create->id,
                'user_id' => $auth_id,
                'action_date' => $request->action_date,
                'repeattask' => $request->repeattask,
                'time' => $request->time,
                'repeat_flag' => $request->repeat_flag,
                'ringtone' => $request->ringtone,
                'actionstatus' => $request->actionstatus,
                'notification_frequency' => $request->notification_frequency==true?1:0,
                'notification' => $request->notification==true?1:0
            ]);


            DB::commit();
            $response['status'] = true;
            $response['status'] = Articulat::with('comunicate')->with('takecation')->find($create->id);
        } catch (\Exception $e) {
            $response['data']=$e->getMessage();
            $response['status'] = false;
            DB::rollback();
        }
        return response()->json($response);
    }

    
    public function show($id)
    {
        $data = Articulat::with('comunicate')->with('takecation')->find($id);
        return $data;
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

        Articulat::where('id', $id)->update(
        [
            'arta' => $request->arta,
            'artb' => $request->artb,
            'artc' => $request->artc,
            'date' => $request->date,
        ]);

        Comunicate::where('articulate_id',$id)->update(
            [
                'arta1' => $request->arta1,
                'arta2' => $request->arta2,
                'arta3' => $request->arta3,
                'artb1' => $request->artb1,
                'artb2' => $request->artb2,
                'artb3' => $request->artb3,
                'artc1' => $request->artc1,
                'artc2' => $request->artc2,
                'artc3' => $request->artc3,
                'arta1status' => $request->arta1status,
                'arta2status' => $request->arta2status,
                'arta3status' => $request->arta3status,
                'artb1status' => $request->artb1status,
                'artb2status' => $request->artb2status,
                'artb3status' => $request->artb3status,
                'artc1status' => $request->artc1status,
                'artc2status' => $request->artc2status,
                'artc3status' => $request->artc3status,
            ]);
        
        TakeAction::where('articulate_id',$id)->update(
            [
             
                'repeattask' => $request->repeattask,
                'time' => $request->time,
                'action_date' => $request->action_date,
                'repeat_flag' => $request->repeat_flag,
                'ringtone' => $request->ringtone,
                'actionstatus' => $request->actionstatus,
                'notification_frequency' => $request->notification_frequency==true?1:0,
                'notification' => $request->notification==true?1:0
            ]);


            DB::commit();
            $response['status'] = true;
            $response['status'] = Articulat::with('comunicate')->with('takecation')->find($id);
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
                $response['data'] = Articulat::find($id);
                if($response['data'])
                {
                    Comunicate::where('articulate_id',$id)->delete();
                    TakeAction::where('articulate_id',$id)->delete();
                    $response['data']=$response['data']->delete();
                    $response['status']=true;
                }
                else
                {
                    $response['data']="Data Not Found";  
                }
                return response()->json($response);
    }
}
