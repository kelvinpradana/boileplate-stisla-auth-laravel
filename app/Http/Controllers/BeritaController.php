<?php

namespace App\Http\Controllers;

use App\berita;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BeritaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $beritas = berita::all();
        return view('berita.index',compact('beritas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('berita.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $description=$request->input('isi');
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/img/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        $nama_file = '';
        if($request->has('img')){

            $this->validate($request, [
                'img' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('img');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'berita';
            $file->move($tujuan_upload,$nama_file);
        }
        berita::create([
            'judul' => $request->judul,
            'status' => $request->status,
            'isi' => $description,
            'tanggal' => $request->tanggal,
            'user_id' => Auth::user()->id,
            'user_update' => '1',
            'img' => $nama_file,
        ]);
        return redirect()->route('beritas.index');
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
        $data = berita::find($id);
        return view('berita.edit',compact('data'));
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
        // return $request->status;    
        $description=$request->input('isi');
        $dom = new \DomDocument();
        $dom->loadHtml($description, LIBXML_HTML_NOIMPLIED | LIBXML_HTML_NODEFDTD);    
        $images = $dom->getElementsByTagName('img');

        foreach($images as $k => $img){
            $data = $img->getAttribute('src');

            list($type, $data) = explode(';', $data);
            list(, $data)      = explode(',', $data);
            $data = base64_decode($data);

            $image_name= "/img/" . time().$k.'.png';
            $path = public_path() . $image_name;

            file_put_contents($path, $data);
            
            $img->removeAttribute('src');
            $img->setAttribute('src', $image_name);
        }

        $description = $dom->saveHTML();
        $nama_file = $request->img_e;
        if($request->has('img')){

            $this->validate($request, [
                'img' => 'file|image|mimes:jpeg,png,jpg|max:2048',
            ]);
    
            // menyimpan data file yang diupload ke variabel $file
            $file = $request->file('img');
    
            $nama_file = time()."_".$file->getClientOriginalName();
    
            // isi dengan nama folder tempat kemana file diupload
            $tujuan_upload = 'berita';
            $file->move($tujuan_upload,$nama_file);
        }
        $data = berita::find($id);

        $data->update([
            'judul' => $request->judul,
            'status' => $request->status,
            'isi' => $description,
            'tanggal' => $request->tanggal,
            'user_id' => Auth::user()->id,
            'user_update' => Auth::user()->id,
            'img' => $nama_file,
        ]);
        return redirect()->route('beritas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return $id;
        $data = berita::find($id);
        $data->delete();
        return redirect()->route('beritas.index');

    }

    public function hapus($id)
    {
        $data = berita::find($id);
        $data->delete();
        return redirect()->route('beritas.index');

    }

    public function detail($id)
    {
        $data = berita::find($id);
        $randoms = berita::where('status',1)->orderBy('tanggal','DESC')->take(4)->get();
        return view('berita.detail',compact('data','randoms'));

    }
}
