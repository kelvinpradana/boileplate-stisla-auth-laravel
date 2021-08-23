<?php

namespace App\Http\Controllers;

use App\diklat;
use App\prolat;
use App\subDiklat;
use App\usulan;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $tahun = prolat::where('status',1)->first();

        $user_id = auth::user()->id;
        $diklats = DB::table('diklats')
                ->select('diklats.*','transaksi.qty')
                ->leftJoin(DB::raw(
                    "(select count(*) as qty, diklat_id 
                    from transaksis where user_id='$user_id' and status=0 and tahun = $tahun->tahun group by diklat_id ) as transaksi"
                    ), function($join){
                        $join->on("diklats.id","=","transaksi.diklat_id");
                    })
                ->get();
        $usulans = usulan::where('user_id',$user_id)->where('status',0)->where('tahun',$tahun->tahun)->count();
        return view('transaksi.index',compact('diklats','usulans','tahun'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function getSubDiklat(Request $request)
    {
        $id = $request->id;
        $subDiklats = subDiklat::where("diklat_id", $id)
            ->get();

        if (!$subDiklats) {
            return response()->json(['status' => 'error', 'message' => 'gagal mendapatkan data', 'data' => '']);
        }

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data', 'datas' => $subDiklats]);
    }

    public function getSubDiklatEdit(Request $request)
    {
        $id = $request->id;
        // $sub_diklat = $request->sub_diklat;
        $tahun = $request->tahun;
        $user_id = auth::user()->id;
        $data = transaksi::where("diklat_id", $id)->where('tahun',$tahun)->where('status',0)
        ->where('user_id',$user_id)->get();
        if (!$data) {
            return response()->json(['status' => 'error', 'message' => 'error data', 'data' => '']);
        }

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data', 'data' => $data]);
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        DB::beginTransaction();
        try {

            transaksi::where("diklat_id", $request->diklat_id)->where('tahun',$request->tahun)
            ->where('status',0) ->where('user_id',auth::user()->id)->delete();
            $jmls = $request->jml;
            $i=0;
            for($y=0;$y<count($jmls);$y++){
                
                if($jmls[$y] != 0 || !empty($jmls[$y])){
                    $pelatihans = $request->pelatihan;
                    $pelatihan[] = [
                        'diklat_id' =>  $request->diklat_id,
                        'sub_diklat_id' => $pelatihans[$i],
                        'jumlah' => $jmls[$y],
                        'tahun' =>  $request->tahun,
                        'status' =>  0,
                        'user_id' => auth::user()->id
                    ];
                    $i++;
                }
            }
            transaksi::insert($pelatihan);
           
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
            $diklat_id = $request->diklat_id;

            $transaksi = transaksi::where('user_id',$user_id)
                            ->where('diklat_id',$diklat_id)
                            ->where('status',0);
            $transaksi->delete();

            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil direset....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function saveAll(Request $request){
        DB::beginTransaction();
        try {

            $user_id = auth::user()->id;

            $transaksi = transaksi::where('user_id',$user_id)
                            ->where('status',0)->groupBy('diklat_id')
                            ->selectRaw('count(*) as num')
                            ->get();
            
            if(count($transaksi)>3){
                return response()->json(['status' => 'error', 'message' => 'Pilihan Diklat maksimal 3!']);
            }
                   
            $update = transaksi::where('user_id',$user_id)
                ->where('status',0);
            $update = $update->update([
                'status' => 1
            ]);

            $update2 = usulan::where('user_id',$user_id)
                ->where('status',0);
            $update2 = $update2->update([
                'status' => 1
            ]);
            
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil disimpan....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function resetAll(Request $request){
        DB::beginTransaction();
        try {

            $user_id = auth::user()->id;

            $transaksi = transaksi::where('user_id',$user_id)
                            ->where('status',0);
                            
            $update = $transaksi->delete();
            DB::commit();
            return response()->json(['status' => 'success', 'message' => 'Berhasil direset....']);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    function getUsulan(){
        $user_id = auth::user()->id;
        $usulans = usulan::where("user_id", $user_id)
            ->get();

        if (!$usulans) {
            return response()->json(['status' => 'error', 'message' => 'gagal mendapatkan data', 'data' => '']);
        }

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data', 'datas' => $usulans]);
    }
}
