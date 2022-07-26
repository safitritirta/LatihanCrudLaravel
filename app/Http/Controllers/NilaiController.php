<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nilai;


class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function indeks_nilai($nilai) {

        if($nilai <= 100 && $nilai >= 90) {
            $grade = "A";
        } elseif($nilai < 90 && $nilai >= 80) {
            $grade = "B";
        } elseif($nilai < 80 && $nilai >= 70) {
            $grade = "C";
        } elseif($nilai < 70 && $nilai >= 50) {
            $grade = "D";
        } elseif($nilai < 50 && $nilai >= 30) {
            $grade = "E";
        } elseif($nilai < 30 && $nilai >= 0) {
            $grade = "F";
        } else {
            $grade = "Grade Tidak Ada!";
        }
        
        return $grade;
    }

    public function index()
    {
        //
        $nilai = Nilai::all();
        return view('nilai.index', ['nilai' => $nilai]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //        
        return view('nilai.create');

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
        $validate = $request->validate([
            'nis' => 'required|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
            
        ]);

        $nilai= new Nilai();
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        $nilai->indeks_nilai = $this->indeks_nilai($nilai->nilai);

        $nilai->save();

        return redirect()->route('nilai.index')->with('succes','Data berhasil dibuat!');
 
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
        $nilai = Nilai::FindOrFail($id);
        return view('nilai.show', compact('nilai'));
 
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
        $nilai = Nilai::FindOrFail($id);
        return view('nilai.edit', compact('nilai'));

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
        $validate = $request->validate([
            'nis' => 'required|max:255',
            'kode_mata_pelajaran' => 'required',
            'nilai' => 'required',
            
        ]);

        $nilai= Nilai::findOrFail($id);
        $nilai->nis = $request->nis;
        $nilai->kode_mata_pelajaran = $request->kode_mata_pelajaran;
        $nilai->nilai = $request->nilai;
        $nilai->indeks_nilai = $this->indeks_nilai($nilai->nilai);

        $nilai->save();

        return redirect()->route('nilai.index')->with('succes','Data berhasil dibuat!');
 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $nilai = Nilai::FindOrFail($id);
        $nilai->delete();
        return redirect()->route('nilai.index')->with('succes',
        'Data berhasil dihapus!');

    }
}
