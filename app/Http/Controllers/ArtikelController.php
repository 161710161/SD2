<?php

namespace App\Http\Controllers;

use App\Artikel;
use App\KategoriArtikel;
use Session;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       $artikel = Artikel::with('KategoriArtikel')->get();
        return view('artikel.index',compact('artikel'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategoriartikel = KategoriArtikel::all();
        return view('artikel.create',compact('kategoriartikel'));
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
            'judul_artikel' => 'required|',
            'dibuat' => 'required|',
            'ket_artikel' => 'required|',
            'kategoriartikel_id' => 'required|'
        ]);
        $artikel = new Artikel;
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->dibuat = $request->dibuat;
        $artikel->ket_artikel = $request->ket_artikel;
        $artikel->kategoriartikel_id = $request->kategoriartikel_id;
        $artikel->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$artikel->kategoriartikel_id</b>"
        ]);
        return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function show(Request $artikel, $id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('artikel.show',compact('artikel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $artikel, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $kategoriartikel = KategoriArtikel::all();
        $selectedKatl = Artikel::findOrFail($id)->kategoriartikel_id;
        return view('artikel.edit',compact('kategoriartikel','artikel','selectedKatl'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'judul_artikel' => 'required|',
            'dibuat' => 'required|',
            'ket_artikel' => 'required|',
            'kategoriartikel_id' => 'required|'
        ]);
        $artikel = Artikel::findOrFail($id);
        $artikel->judul_artikel = $request->judul_artikel;
        $artikel->dibuat = $request->dibuat;
        $artikel->ket_artikel = $request->ket_artikel;
        $artikel->kategoriartikel_id = $request->kategoriartikel_id;
        $artikel->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$artikel->kategoriartikel_id</b>"
        ]);
        return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Artikel  $artikel
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $artikel, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('artikel.index');
    }
}
