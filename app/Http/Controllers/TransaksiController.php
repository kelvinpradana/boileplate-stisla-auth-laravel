<?php

namespace App\Http\Controllers;

use App\diklat;
use App\subDiklat;
use App\transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class TransaksiController extends Controller
{
    public function index()
    {
        $diklats = diklat::all();
        return view('transaksi.index',compact('diklats'));
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
        // return $request->input('permission');
        // $this->validate($request, [
        //     'name' => 'required|unique:roles,name',
        //     'permission' => 'required',
        //     'keterangan' => 'required'
        // ], [
        //     'name.required' => 'Nama tidak boleh kosong',
        //     'name.unique' => 'Nama sudah ada',
        //     'permission.required' => 'Permission tidak boleh kosong',
        //     'keterangan.required' => 'Keterangan tidak boleh kosong'
        // ]);
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
            return response()->json(['status' => 'success', 'message' => $request->jml]);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
}
