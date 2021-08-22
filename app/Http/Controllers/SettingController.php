<?php

namespace App\Http\Controllers;

use App\setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = setting::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        // $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-danger'  data-id='{$row->id}' onclick='Delete(this);'><i class='fa fa-trash'></i></a>&nbsp;";

                        return $action;
                    })
                    // ->editColumn('roles', function($row) {
                    //     $roles = '';
                    //     if(!empty($row->getRoleNames())){
                    //         foreach($row->getRoleNames() as $role){
                    //             $roles .= "<label class='badge badge-primary'>{$role}</label>&nbsp;";
                    //         }
                    //     }
                    //     return $roles;
                    // })
                    ->rawColumns(['action'])
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
            'pengumuman' => 'required',
        ],[
            'pengumuman.required' => 'pengumuman tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{

            $data = setting::create([
                'pengumuman' => $request->pengumuman,
              
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
        $diklat = setting::find($id);

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data!', 'data' => $diklat]);
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
            
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try{
            $user = diklat::find($id);
            $user->update([
                'nama' => $request->nama,
              
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
        $diklat = setting::find($request->id);
        $diklat->update(['deleted_by' => Auth::user()->id]);
        $diklat->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
