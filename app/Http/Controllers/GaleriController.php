<?php

namespace App\Http\Controllers;

use App\Galeri;
use App\KategoriGaleri;
use Session;
use Illuminate\Http\Request;

class GaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galeri = Galeri::with('kategorigaleri')->get();
        return view('galeri.index',compact('galeri'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategorigaleri = KategoriGaleri::all();
        return view('galeri.create',compact('kategorigaleri'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'judul_galeri' => 'required|',
            'ket_galeri' => 'required|',
            'kategorigaleri_id' => 'required|'
        ]);
        $galeri = new Galeri;
        $galeri->judul_galeri = $request->judul_galeri;
        $galeri->ket_galeri = $request->ket_galeri;
        $galeri->kategorigaleri_id = $request->kategorigaleri_id;
        $galeri->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$galeri->kategorigaleri_id</b>"
        ]);
        return redirect()->route('galeri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function show(Request $galeri, $id)
    {
        $galeri = Galeri::findOrFail($id);
        return view('galeri.show',compact('galeri'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $galeri, $id)
    {
        $galeri = Galeri::findOrFail($id);
        $kategorigaleri = KategoriGaleri::all();
        $selectedGtl = Galeri::findOrFail($id)->kategorigaleri_id;
        return view('galeri.edit',compact('kategorigaleri','galeri','selectedGtl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_galeri' => 'required|',
            'ket_galeri' => 'required|',
            'kategorigaleri_id' => 'required|'
        ]);
        $galeri = Galeri::findOrFail($id);
        $galeri->judul_galeri = $request->judul_galeri;
        $galeri->ket_galeri = $request->ket_galeri;
        $galeri->kategorigaleri_id = $request->kategorigaleri_id;
        $galeri->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$galeri->kategorigaleri_id</b>"
        ]);
        return redirect()->route('galeri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Galeri  $galeri
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $galeri, $id)
    {
        $galeri = Galeri::findOrFail($id);
        $galeri->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('galeri.index');
    }
}
