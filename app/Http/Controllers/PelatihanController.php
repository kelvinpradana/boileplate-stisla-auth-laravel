<?php

namespace App\Http\Controllers;

use App\diklat;
use App\subDiklat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class PelatihanController extends Controller
{
    public function index()
    {
        $diklats = diklat::all();
        return view('pelatihan',compact('diklats'));
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = subDiklat::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-danger'  data-id='{$row->id}' onclick='Delete(this);'><i class='fa fa-trash'></i></a>&nbsp;";

                        return $action;
                    })
                    ->editColumn('diklats', function($row) {
                        $roles = '';
                        
                        $roles .= "<label class='badge badge-primary'>{$row->getDiklat->nama}</label>&nbsp;";
                            
                        
                        return $roles;
                    })
                    ->rawColumns(['action','diklats'])
                    ->addIndexColumn()
                    ->make(true);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'diklat_id' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'diklat_id.required' => 'Diklat tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{

            $data = subDiklat::create([
                'nama' => $request->nama,
                'diklat_id' => $request->diklat_id,
              
            ]);
            DB::commit();
            
            return response()->json(['status' => 'success', 'message' => 'Berhasil menambahkan data!']);
        } catch(Exception $e){

            DB::rollback();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subDiklat = subDiklat::find($id);

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data!', 'data' => $subDiklat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validated = $request->validate([
            'nama' => 'required',
            'diklat_id' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'diklat_id.required' => 'Diklat tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{
            $user = subDiklat::find($id);
            $user->update([
                'nama' => $request->nama,
                'diklat_id' => $request->diklat_id,
            ]);
            DB::commit();
            
            return response()->json(['status' => 'success', 'message' => 'Berhasil mengubah data!']);
        } catch(Exception $e){

            DB::rollback();

            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        //
        $subDiklat = subDiklat::find($request->id);
        $subDiklat->update(['deleted_by' => Auth::user()->id]);
        $subDiklat->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
