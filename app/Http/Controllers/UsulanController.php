<?php

namespace App\Http\Controllers;

use App\usulan;
use App\prolat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use DB;
use DataTables;

class UsulanController extends Controller
{
    //
    public function store(Request $request){
        $validated = $request->validate([
            'usulan' => 'required|array|max:10'
        ],[
            'usulan.max' => 'Maksimal 10 Usulan!'
        ]);
        DB::beginTransaction();
        try {

            $user_id = auth::user()->id;
            
            $usulan = $request->usulan;
            $id = $request->id;

            $tahun = prolat::where('status',1)->first()->tahun;

            $usulans = usulan::where('user_id',$user_id)->delete();;
            $i=0;
            for($y=0;$y<count($usulan);$y++){ 
                $insert[] = [
                    'usulan' => $usulan[$i],
                    'tahun' => $tahun,
                    'user_id' => $user_id,
                    'status' => 0
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

            $usulan = usulan::where('user_id',$user_id,)->where('status',0);
            $usulan->delete();

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil direset....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
