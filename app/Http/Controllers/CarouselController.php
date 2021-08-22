<?php

namespace App\Http\Controllers;

use App\carousel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use DB;
use DataTables;

class CarouselController extends Controller
{
    public function index()
    {
        return view('carousel');
    }

    public function data(Request $request){

        if ($request->ajax()) {

            $data = carousel::all();

            return Datatables::of($data)
                    ->editColumn('action', function ($row) {
                        $action = '';
                        // if(Auth::user()->can(['role-list']))
                        // $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-primary' data-id='{$row->id}' onclick='Edit(this);'><i class='fa fa-edit'></i></a>&nbsp;";
                        $action .= "<a href='javascript:void(0)' class='btn btn-icon btn-danger'  data-id='{$row->id}' onclick='Delete(this);'><i class='fa fa-trash'></i></a>&nbsp;";

                        return $action;
                    })
                    ->editColumn('images', function ($row) {
                        $action = '';
                        $url= asset("img/$row->image");
                        return "<img src=".$url." width='200px' alt=''>";
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
                    ->rawColumns(['action','images'])
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
        $this->validate($request,[
            'img.*' => 'required|max:2048|mimes:jpeg,jpg,png'
        ],[
            'img.mimes' => 'Format salah'
        ]); 
        DB::beginTransaction();
        try{
            $foto = $request->img;
            $text_foto = str_replace(' ', '',$foto->getClientOriginalName());

            $nama_file_foto = time()."_".$text_foto;
            $data = carousel::create([
                'image' => $nama_file_foto,
              
            ]);
            DB::commit();   
            
            $foto->move(public_path('/img'),$nama_file_foto);
            
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
        $diklat = diklat::find($id);

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
        $diklat = carousel::find($request->id);
        $diklat->update(['deleted_by' => Auth::user()->id]);
        $diklat->delete();

        return response()->json(['status' => 'success', 'message' => 'Berhasil menghapus']);
    }
}
