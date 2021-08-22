<?php

namespace App\Http\Controllers;

use App\usulan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class UsulanController extends Controller
{
    //
    public function store(Request $request){
        
        DB::beginTransaction();
        try {

            $user_id = auth::user()->id;
            
            $usulan = $request->usulan;
            $id = $request->id;

            $usulans = usulan::where('user_id',$user_id)->delete();;
            $i=0;
            for($y=0;$y<count($usulan);$y++){ 
                $insert[] = [
                    'usulan' => $usulan[$i],
                    'tahun' => '2021',
                    'user_id' => $user_id
                ];
                $i++;
            }
            usulan::insert($insert);

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil disimpan....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function reset(Request $request){
        DB::beginTransaction();
        try {

            $user_id = auth::user()->id;

            $usulan = usulan::where('user_id',$user_id);
            $usulan->delete();

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil direset....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
