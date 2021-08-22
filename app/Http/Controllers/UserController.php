<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class UserController extends Controller
{
    public function index()
    {
        return view('user');
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = User::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
                        // $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-danger'  data-id='{$row->id}' onclick='Delete(this);'><i class='fa fa-trash'></i></a>&nbsp;";

                        return $action;
                    })
                    ->editColumn('kanwils', function($row) {
                        $roles = '';
                        
                        $roles .= "<label class='badge badge-primary'>{$row->getKanwil->nama}</label>&nbsp;";
                        return $roles;
                    })
                    ->editColumn('upts', function($row) {
                        $upt = '';
                        
                        $upt .= "<label class='badge badge-primary'>{$row->getUp->nama}</label>&nbsp;";
                        return $upt;
                    })
                    ->editColumn('level', function($row) {
                        $level = '';
                        if($row->level == 0){
                            $level .= 'User';
                        }
                        else{
                            $level .= 'Admin';
                        }
                        return $level;
                    })
                    ->rawColumns(['action','kanwils','upts'])
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
            'kanwil_id' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong',
            'kanwil_id.required' => 'Kanwil tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{

            $data = upt::create([
                'nama' => $request->nama,
                'kanwil_id' => $request->kanwil_id,
              
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
        $user = user::find($id);

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data!', 'data' => $user]);
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
            'level' => 'required',
        ],[
            'level.required' => 'Level tidak boleh kosong',
        ]);

        DB::beginTransaction();
        try{
            $user = user::find($id);
            $user->update([
                'level' => $request->level,
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
        $upt = upt::find($request->id);
        $upt->update(['deleted_by' => Auth::user()->id]);
        $upt->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
