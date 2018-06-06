<?php

namespace App\Http\Controllers;

use App\Eskul;
use Session;
use Illuminate\Http\Request;

class EskulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $a = Eskul::all();
        return view('eskul.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('eskul.create');
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
            'nama_eskul' => 'required',
            'foto' => 'image|max:2048',
            'ket_eskul' => 'required'
        ]);
        $a = new Eskul;
        $a->nama_eskul = $request->nama_eskul;
        $a = Eskul::create($request->except('foto'));
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_foto->move($destinationPath, $filename);
            $a->foto = $filename;
        }
        $a->ket_eskul = $request->ket_eskul;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->nama_eskul</b>"
        ]);
        return redirect()->route('eskul.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function show(Request $eskul, $id)
    {
        $a = Eskul::findOrFail($id);
        return view('eskul.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $eskul, $id)
    {
        $a = Eskul::findOrFail($id);
        return view('eskul.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_eskul' => 'required|',
            'foto' => 'required|max:2048',
            'ket_eskul' => 'required|'
        ]);
        $a = Eskul::findOrFail($id);
        $a->nama_eskul = $request->nama_eskul;
        $a->update($request->all());
        if ($request->hasFile('foto')) {
            $uploaded_foto = $request->file('foto');
            $extension = $uploaded_foto->getClientOriginalExtension();
            $filename = md5(time()) . '.' . $extension;
            $destinationPath = public_path() . DIRECTORY_SEPARATOR . 'img';
            $uploaded_foto->move($destinationPath, $filename);
            $a->foto = $filename;
        }
        $a->ket_eskul = $request->ket_eskul;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->nama_eskul</b>"
        ]);
        return redirect()->route('eskul.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Eskul  $eskul
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $eskul, $id)
    {
        $a = Eskul::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('eskul.index');
    }
}
