<?php

namespace App\Http\Controllers;

use App\KategoriGaleri;
use Session;
use Illuminate\Http\Request;

class KategoriGaleriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = KategoriGaleri::all();
        return view('kategorigaleri.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategorigaleri.create');
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
            'nama_galeri' => 'required|'
        ]);
        $a = new KategoriGaleri;
        $a->nama_galeri = $request->nama_galeri;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_galeri</b>"
        ]);
        return redirect()->route('kategorigaleri.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriGaleri $kategoriGaleri, $id)
    {
        $a = KategoriGaleri::findOrFail($id);
        return view('kategorigaleri.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriGaleri $kategoriGaleri, $id)
    {
        $a = KategoriGaleri::findOrFail($id);
        return view('kategorigaleri.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriGaleri $kategoriGaleri, $id)
    {
        $this->validate($request,[
            'nama_galeri' => 'required|'
        ]);
        $a = KategoriGaleri::findOrFail($id);
        $a->nama_galeri = $request->nama_galeri;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_galeri</b>"
        ]);
        return redirect()->route('kategorigaleri.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriGaleri  $kategoriGaleri
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriGaleri $kategoriGaleri, $id)
    {
        $a = KategoriGaleri::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kategorigaleri.index');
    }
}
