<?php

namespace App\Http\Controllers;

use App\Profile;
use Session;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         $a = Profile::all();
        return view('profile.index',compact('a'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('profile.create');
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
            'visimisi' => 'required|',
            'sejarah' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'lokasi' => 'required|'
        ]);
        $a = new Profile;
        $a->visimisi = $request->visimisi;
        $a->sejarah = $request->sejarah;
        $a->email = $request->email;
        $a->telepon = $request->telepon;
        $a->lokasi = $request->lokasi;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil menyimpan <b>$a->visimisi</b>"
        ]);
        return redirect()->route('profile.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function show(Request $profile, $id)
    {
        $a = Profile::findOrFail($id);
        return view('profile.show',compact('a'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $profile, $id)
    {
        $a = Profile::findOrFail($id);
        return view('profile.edit',compact('a'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'visimisi' => 'required|',
            'sejarah' => 'required|',
            'email' => 'required|',
            'telepon' => 'required|',
            'lokasi' => 'required|'
        ]);
        $a = Profile::findOrFail($id);
        $a->visimisi = $request->visimisi;
        $a->sejarah = $request->sejarah;
        $a->email = $request->email;
        $a->telepon = $request->telepon;
        $a->lokasi = $request->lokasi;
        $a->save();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Berhasil mengedit <b>$a->visimisi</b>"
        ]);
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Profile  $profile
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $profile, $id)
    {
        $a = Profile::findOrFail($id);
        $a->delete();
        Session::flash("flash_notification", [
        "level"=>"success",
        "message"=>"Data Berhasil dihapus"
        ]);
        return redirect()->route('profile.index');
    }
}
