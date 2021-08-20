<?php

namespace App\Http\Controllers;

use App\kanwil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class KanwilController extends Controller
{
    public function index()
    {
        return view('kanwil');
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = kanwil::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
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
            'nama' => 'required',
        ],[
            'nama.required' => 'Nama tidak boleh kosong'
        ]);

        DB::beginTransaction();
        try{

            $data = kanwil::create([
                'nama' => $request->nama,
              
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
        $kanwil = kanwil::find($id);

        return response()->json(['status' => 'success', 'message' => 'Berhasil mengambil data!', 'data' => $kanwil]);
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
            $user = kanwil::find($id);
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
        $kanwil = kanwil::find($request->id);
        $kanwil->update(['deleted_by' => Auth::user()->id]);
        $kanwil->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
