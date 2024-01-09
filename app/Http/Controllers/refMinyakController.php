<?php

namespace App\Http\Controllers;
use App\Models\refMinyak;
use App\Models\Kenderaan;
use Illuminate\Http\Request;

class refMinyakController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('minyak.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Kenderaan' => 'required',
            'Kuantiti'  => 'required',
            'Jenis'     => 'required',
            'Tarikh'    => 'required',
            'Harga'     => 'required',


        ],[
            'Kenderaan.required'    => 'Pilih KENDERAAN',
            'Kuantiti.required'     => 'Masukkan KUANTITI MINYAK (liter) ',
            'Jenis.required'        => 'Masukkan JENIS MINYAK yang diisi',
            'Tarikh.required'       => 'Masukkan TARIKH isi MINYAK',
            'Harga.required'        => 'Masukkan HARGA MINYAK',

        ]);

        $minyak = new Minyak;

        //nama->database = $request->form

        $minyak->kenderaan = $request->Kenderaan;
        $minyak->kuantiti = $request->Kuantiti;
        $minyak->jenis = $request->Jenis;
        $minyak->tarikh = $request->Tarikh;
        $minyak->harga = $request->Harga;

// dd($servis);

        $minyak->save();

        return redirect()->route('minyak.index')
                                ->with('Maklumat Berjaya di Simpan');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
