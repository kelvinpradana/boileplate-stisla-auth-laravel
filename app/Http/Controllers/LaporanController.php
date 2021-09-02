<?php

namespace App\Http\Controllers;

use App\diklat;
use App\prolat;
use App\transaksi;
use Illuminate\Http\Request;
use DB;
use DataTables;
use PDF;

class LaporanController extends Controller
{
    public function index()
    {
        $diklats = diklat::all();
        return view('laporan.index',compact('diklats'));
    }

    public function data(Request $request){
        
        if ($request->ajax()) {

            $tahun = prolat::where('status',1)->first();

            $data = DB::table('transaksis')
            ->select('diklats.nama as diklat',DB::raw("count(transaksis.sub_diklat_id) as qty"),'transaksis.status','sub_diklats.nama','transaksis.sub_diklat_id')
            ->leftJoin('sub_diklats','sub_diklats.id','transaksis.sub_diklat_id')
            ->leftJoin('diklats','diklats.id','transaksis.diklat_id')
            ->orderBy('qty','DESC')
            ->where('transaksis.status','1')
            ->where('tahun',$tahun->tahun);
           
            if($request->id != 'all'){
                $data->where('transaksis.diklat_id',$request->id);
            }
            $data->groupBy('transaksis.sub_diklat_id')
            ->orderBy('qty','DESC')
            ->get();
            return Datatables::of($data)
                    ->addColumn('action', function ($row) {
                        $action = '';
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->sub_diklat_id}' onclick='Laporan(this);'><i class='fa fa-file-alt'></i></a>&nbsp;";
                        return $action;
                    })
                    ->rawColumns(['action'])
                    ->addIndexColumn()
                    ->make(true);
        }
    }

    public function detail(Request $request, $id)
    {
        if($request->ajax()) {
            $tahun = prolat::where('status',1)->first();
            $data = DB::table('transaksis')
            ->select('users.name as nama_user','users.kanwil_id','kanwils.nama as kanwil','upts.nama as upt','users.nik')
            // ->leftJoin('sub_diklats','sub_diklats.id','transaksis.sub_diklat_id')
            ->leftJoin('users','users.id','transaksis.user_id')
            ->leftJoin('kanwils','kanwils.id','users.kanwil_id')
            ->leftJoin('upts','upts.id','users.upt_id')
            // ->orderBy('qty','DESC')
            ->where('transaksis.status','1')
            ->where('tahun',$tahun->tahun);
           
           
            $data->where('transaksis.sub_diklat_id',$id);

            $data->get();

            return Datatables::of($data)
                ->addColumn('nama_user', function ($row) {
                    $mesin = $row->nama_user;
                    return $mesin;
                })
                ->escapeColumns([])
                ->addIndexColumn()
                ->make(true);
        }
    }

    public function print(Request $request, $id)
    {
        $tahun = prolat::where('status',1)->first();
        $pelatihan = '';
        $usulan = '';
        if($id == 'all' || $id != 'usulan'){

            if($id == 'all'){
                $pelatihan = DB::table('transaksis as t')
                ->select('sub_diklats.nama as pelatihan','diklats.nama as nama_diklat','t.jumlah','t.tahun',
                'users.name as nama_user','users.kanwil_id','kanwils.nama as kanwil','upts.nama as upt','users.nik'
                )
                ->leftJoin('sub_diklats','sub_diklats.id','t.sub_diklat_id')
                ->leftJoin('diklats','diklats.id','t.diklat_id')
                ->leftJoin('users','users.id','t.user_id')
                ->leftJoin('kanwils','kanwils.id','users.kanwil_id')
                ->leftJoin('upts','upts.id','users.upt_id')
                ->where('t.status','1')
                // ->where('t.diklat_id',$id)
                ->where('tahun',$tahun->tahun)->get();
            }
            else {
                $pelatihan = DB::table('transaksis as t')
                ->select('sub_diklats.nama as pelatihan','diklats.nama as nama_diklat','t.jumlah','t.tahun',
                'users.name as nama_user','users.kanwil_id','kanwils.nama as kanwil','upts.nama as upt','users.nik'
                )
                ->leftJoin('sub_diklats','sub_diklats.id','t.sub_diklat_id')
                ->leftJoin('diklats','diklats.id','t.diklat_id')
                ->leftJoin('users','users.id','t.user_id')
                ->leftJoin('kanwils','kanwils.id','users.kanwil_id')
                ->leftJoin('upts','upts.id','users.upt_id')
                ->where('t.status','1')
                ->where('t.diklat_id',$id)
                ->where('tahun',$tahun->tahun)->get();
            }
        }
        if($id == 'usulan' || $id == 'all'){
            $usulan = DB::table('usulans as t')
                ->select('t.jumlah','t.tahun',
                    'users.name as nama_user','users.kanwil_id','kanwils.nama as kanwil',
                    'upts.nama as upt','users.nik','t.usulan'
                )
                ->leftJoin('users','users.id','t.user_id')
                ->leftJoin('kanwils','kanwils.id','users.kanwil_id')
                ->leftJoin('upts','upts.id','users.upt_id')
                ->where('t.status','1')
                ->where('tahun',$tahun->tahun)
                ->get();
        }
        
        $pdf = PDF::loadview('laporan.laporan_pdf',['pelatihan'=>$pelatihan,'id'=>$id,'usulan'=>$usulan]);
        return $pdf->stream('laporan.pdf');
    }
}
