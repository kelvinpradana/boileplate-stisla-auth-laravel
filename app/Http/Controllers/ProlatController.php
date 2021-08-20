<?php

namespace App\Http\Controllers;

use App\prolat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class ProlatController extends Controller
{
    public function index()
    {
        return view('prolat');
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = prolat::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-danger'  data-id='{$row->id}' onclick='Delete(this);'><i class='fa fa-trash'></i></a>&nbsp;";

                        return $action;
                    })
                    ->editColumn('status', function($row) {
                        $roles = '';
                        if($row->status == 0){
                            $roles .= "<label class='badge badge-primary'>Non Aktif</label>&nbsp;";
                        }
                        else {
                            $roles .= "<label class='badge badge-primary'>Aktif</label>&nbsp;";
                        }
                        
                        return $roles;
                    })
                    ->rawColumns(['action','status'])
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
            'tahun' => 'required',
            'status' => 'required',
        ],[
            'tahun.required' => 'tahun tidak boleh kosong',
            'status.required' => 'Diklat tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{

            $data = prolat::create([
                'tahun' => $request->tahun,
                'status' => $request->status,
              
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
        $prolat = prolat::find($id);

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data!', 'data' => $prolat]);
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
            'tahun' => 'required',
            'status' => 'required',
        ],[
            'tahun.required' => 'tahun tidak boleh kosong',
            'status.required' => 'Diklat tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{
            $user = prolat::find($id);
            $user->update([
                'tahun' => $request->tahun,
                'status' => $request->status,
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
        $prolat = prolat::find($request->id);
        $prolat->update(['deleted_by' => Auth::user()->id]);
        $prolat->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
