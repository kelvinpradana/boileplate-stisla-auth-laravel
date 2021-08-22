<?php

namespace App\Http\Controllers;

use App\diklat;
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
            $data = DB::table('diklats as d')->leftJoin('sub_diklats','d.id','diklat_id')->get();
            var_dump($data);
                    // ->leftJoin(
                    //     DB::raw('(select count(diklat_id) as jml,diklat_id,sub_diklat_id from transaksis group by sub_diklat_id) as tr'),
                    //     'd.id', '=', 'tr.diklat_id'
                    // )->get();

            // DB::table('products')
            // ->join(
            //     DB::raw('(SELECT product_id, MIN(price) AS lowest FROM prices GROUP BY product_id) AS q1'),
            //     'products.id', '=', 'q1.product_id'
            // )
            // ->orderBy('q1.lowest')->get();


            // $data = diklat::join('diklat','id','diklat_id')
            //         ->join(
            //             DB:raw('(select count(diklat_id),diklat_id,sub_diklat_id from transaksis) as tr'),
            //             'diklat.id', '=', 'tr.diklat_id'
            //         );
            // return $data;

            return Datatables::of($data)
                    // ->editColumn('kanwils', function($row) {
                    //     $roles = '';
                        
                    //     $roles .= "<label class='badge badge-primary'>{$row->getKanwil->nama}</label>&nbsp;";
                    //     return $roles;
                    // })
                    // ->editColumn('upts', function($row) {
                    //     $upt = '';
                        
                    //     $upt .= "<label class='badge badge-primary'>{$row->getUp->nama}</label>&nbsp;";
                    //     return $upt;
                    // })
                    // ->editColumn('level', function($row) {
                    //     $level = '';
                    //     if($row->level == 0){
                    //         $level .= 'User';
                    //     }
                    //     else{
                    //         $level .= 'Admin';
                    //     }
                    //     return $level;
                    // })
                    ->rawColumns(['stok'])
                    ->addIndexColumn()
                    ->make(true);
        }
    }
}
