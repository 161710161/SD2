<?php

namespace App\Http\Controllers;

use App\KategoriArtikel;
use Session;
use Illuminate\Http\Request;

class KategoriArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = KategoriArtikel::all();
        return view('kategoriartikel.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('kategoriartikel.create');
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
            'nama_artikel' => 'required|'
        ]);
        $a = new KategoriArtikel;
        $a->nama_artikel = $request->nama_artikel;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_artikel</b>"
        ]);
        return redirect()->route('kategoriartikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function show(KategoriArtikel $kategoriArtikel, $id)
    {
        $a = KategoriArtikel::findOrFail($id);
        return view('kategoriartikel.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function edit(KategoriArtikel $kategoriArtikel, $id)
    {
        $a = KategoriArtikel::findOrFail($id);
        return view('kategoriartikel.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, KategoriArtikel $kategoriArtikel, $id)
    {
        $this->validate($request,[
            'nama_artikel' => 'required|'
        ]);
        $a = KategoriArtikel::findOrFail($id);
        $a->nama_artikel = $request->nama_artikel;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_artikel</b>"
        ]);
        return redirect()->route('kategoriartikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\KategoriArtikel  $kategoriArtikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(KategoriArtikel $kategoriArtikel, $id)
    {
        $a = KategoriArtikel::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('kategoriartikel.index');
    }
}
