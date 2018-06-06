<?php

namespace App\Http\Controllers;

use App\Prestasi;
use Session;
use Illuminate\Http\Request;

class PrestasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Prestasi::all();
        return view('prestasi.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('prestasi.create');
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
            'nama_prestasi' => 'required|',
            'ket_prestasi' => 'required|'
        ]);
        $a = new Prestasi;
        $a->nama_prestasi = $request->nama_prestasi;
        $a->ket_prestasi = $request->ket_prestasi;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_prestasi</b>"
        ]);
        return redirect()->route('prestasi.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function show(Request $prestasi, $id)
    {
        $a = Prestasi::findOrFail($id);
        return view('prestasi.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $prestasi, $id)
    {
        $a = Prestasi::findOrFail($id);
        return view('prestasi.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_prestasi' => 'required|',
            'ket_prestasi' => 'required|'
        ]);
        $a = Prestasi::findOrFail($id);
        $a->nama_prestasi = $request->nama_prestasi;
        $a->ket_prestasi = $request->ket_prestasi;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_prestasi</b>"
        ]);
        return redirect()->route('prestasi.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prestasi  $prestasi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $prestasi, $id)
    {
        $a = Prestasi::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('prestasi.index');
    }
}
