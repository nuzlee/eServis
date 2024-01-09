<?php

namespace App\Http\Controllers;
use App\Models\Minyak;
use App\Models\Kenderaan;
use Illuminate\Http\Request;

class MinyakController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dataMinyak = Minyak::orderBy('id','asc')->paginate(5);
        return view('minyak.index',compact('dataMinyak'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kenderaan = Kenderaan::all();
        return view('minyak.create', compact('kenderaan'));
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

        $minyak->kenderaan  = $request->Kenderaan;
        $minyak->kuantiti   = $request->Kuantiti;
        $minyak->jenis      = $request->Jenis;
        $minyak->tarikh     = $request->Tarikh;
        $minyak->harga      = $request->Harga;

// dd($servis);

        $minyak->save();

        return redirect()
                ->route('minyak.index')
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
    public function edit($id)
    {

        //data dropdown
        $kenderaan  = Kenderaan::all();
        $minyak     = Minyak::find($id);

        // dd($minyak);

        return view('minyak.edit', compact('kenderaan','minyak'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $minyak)
    {

        $request->validate([
            'Kenderaan'     => 'required',
            'Kuantiti'      => 'required',
            'Jenis'         => 'required',
            'Tarikh'        => 'required',
            'Harga'         => 'required',


        ],[
            'Kenderaan.required'    => 'Sila Pilih KENDERAAN',
            'Kuantiti.required'     => 'Masukkan KUANTITI MINYAK (liter) ',
            'Jenis.required'        => 'Masukkan JENIS MINYAK yang diisi',
            'Tarikh.required'       => 'Masukkan TARIKH isi MINYAK',
            'Harga.required'        => 'Masukkan HARGA MINYAK',



        ]);

        $minyakUpdate = Minyak::find($minyak);

        //nama->database = $request->form

        $minyakUpdate->kenderaan    = $request->get('Kenderaan');
        $minyakUpdate->kuantiti     = $request->get('Kuantiti');
        $minyakUpdate->jenis        = $request->get('Jenis');
        $minyakUpdate->tarikh       = $request->get('Tarikh');
        $minyakUpdate->harga        = $request->get('Harga');

// dd($servis);

        $minyakUpdate->save();

        return redirect()
		        ->route('minyak.index')
                ->with('success', 'Maklumat Berjaya di Simpan');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $minyak = Minyak::find($id);
        $minyak ->delete();
        return redirect()
                ->route('minyak.index')
                ->with('success', 'Data Minyak berjaya dipadam');
    }
}
