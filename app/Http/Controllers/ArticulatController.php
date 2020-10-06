<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
        $data = Articulat::orderBy('id','DESC')->get();
        return $data;
    }

   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
    //    dd($request->all());
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
                'status' => $request->status,
            ]);
        
        TakeAction::create(
            [
                'articulate_id' => $create->id,
                'user_id' => $auth_id,
                'saturday' => $request->saturday,
                'sunday' => $request->sunday,
                'monday' => $request->monday,
                'tuesday' => $request->tuesday,
                'wednesday' => $request->wednesday,
                'thursday' => $request->thursday,
                'friday' => $request->friday,
                'repeattask' => $request->repeattask,
                'time' => $request->time,
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
        $data = Articulat::with('comunicate')->with('takecation')->find($id);
        return $data;
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        // dd($request->all());
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
                'status' => $request->status,
            ]);
        
        TakeAction::where('articulate_id',$id)->update(
            [
                'saturday' => $request->saturday,
                'sunday' => $request->sunday,
                'monday' => $request->monday,
                'tuesday' => $request->tuesday,
                'wednesday' => $request->wednesday,
                'thursday' => $request->thursday,
                'friday' => $request->friday,
                'repeattask' => $request->repeattask,
                'time' => $request->time,
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
                    $response['data']="Data Not deleted";  
                }
                return response()->json($response);
    }
}
