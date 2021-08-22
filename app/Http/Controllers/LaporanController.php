<?php

namespace App\Http\Controllers;

use App\diklat;
use App\prolat;
use Illuminate\Http\Request;
use DB;
use DataTables;

class LaporanController extends Controller
{
    public function index()
    {
        return view('laporan.index');
    }

    public function data(Request $request){
        
        if ($request->ajax()) {

            $tahun = prolat::where('status',1)->first();

            $data = DB::table('transaksis')
            ->select('diklats.nama as diklat',DB::raw("count(transaksis.sub_diklat_id) as qty"),'transaksis.status','sub_diklats.nama')
            ->leftJoin('sub_diklats','sub_diklats.id','transaksis.sub_diklat_id')
            ->leftJoin('diklats','diklats.id','transaksis.diklat_id')
            ->orderBy('qty','DESC')
            ->where('transaksis.status','1')
            ->where('tahun',$tahun->tahun)
            ->groupBy('transaksis.sub_diklat_id')
            ->orderBy('qty','DESC')
            ->get();
            return Datatables::of($data)
                    ->rawColumns([])
                    ->addIndexColumn()
                    ->make(true);
        }
    }
}
