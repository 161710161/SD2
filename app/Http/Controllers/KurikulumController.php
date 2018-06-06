<?php

namespace App\Http\Controllers;

use App\Kurikulum;
use App\Guru;
use App\Staf;
use Illuminate\Http\Request;

class KurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $kurikulum = Kurikulum::with('guru')->get();
        $kurikulum = Kurikulum::with('staf')->get();
        return view('kurikulum.index',compact('kurikulum'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $guru = Guru::all();
        $staf = Staf::all();
         return view('kurikulum.create',compact('guru','staf'));
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
            'nama_kurikulum' => 'required|',
            'ket_kurikulum' => 'required|',
            'nama_kepsek' => 'required',
            'nama_wkepsek' => 'required',
            'guru_id' => 'required',
            'staf_id' => 'required'
        ]);
        $kurikulum = new Kurikulum;
        $kurikulum->nama_kurikulum = $request->nama_kurikulum;
        $kurikulum->ket_kurikulum = $request->ket_kurikulum;
        $kurikulum->nama_kepsek = $request->nama_kepsek;
        $kurikulum->nama_wkepsek = $request->nama_wkepsek;
        $kurikulum->guru_id = $request->guru_id;
        $kurikulum->staf_id = $request->staf_id;
        $kurikulum->save();
        return redirect()->route('kurikulum.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(Request $kurikulum, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        return view('kurikulum.show',compact('kurikulum'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $kurikulum, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $guru = Guru::all();
        $selectedGuru = Kurikulum::findOrFail($id)->guru_id;
        $staf = Staf::all();
        $selectedStaf = Kurikulum::findOrFail($id)->fasilitas_id;
        return view('kurikulum.edit',compact('kurikulum','guru','selectedGuru','staf','selectedStaf')); 
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'nama_kurikulum' => 'required|',
            'ket_kurikulum' => 'required|',
            'nama_kepsek' => 'required',
            'nama_wkepsek' => 'required',
            'guru_id' => 'required',
            'staf_id' => 'required'
        ]);
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->nama_kurikulum = $request->nama_kurikulum;
        $kurikulum->ket_kurikulum = $request->ket_kurikulum;
        $kurikulum->nama_kepsek = $request->nama_kepsek;
        $kurikulum->nama_wkepsek = $request->nama_wkepsek;
        $kurikulum->guru_id = $request->guru_id;
        $kurikulum->staf_id = $request->staf_id;
        $kurikulum->save();
        return redirect()->route('kurikulum.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Kurikulum  $kurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $kurikulum, $id)
    {
        $kurikulum = Kurikulum::findOrFail($id);
        $kurikulum->delete();
        return redirect()->route('kurikulum.index');
    }
}
