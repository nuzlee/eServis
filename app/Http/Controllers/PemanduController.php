<?php

namespace App\Http\Controllers;
use App\Models\Pemandu;
use App\Models\Kenderaan;
use Illuminate\Http\Request;

class PemanduController extends Controller
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
        $dataPemandu = Pemandu::all();
        return view('pemandu.index',compact('dataPemandu'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kenderaan = Kenderaan::all();
        return view('pemandu.create', compact('kenderaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Nama'      => 'required',
            'IC'        => 'required',
            'Kenderaan' => 'required',


        ],[
            'Nama.required'         => 'Sila masukkan NAMA PEMANDU',
            'IC.required'           => 'Sila masukkan NOMBOR KAD PENGENALAN',
            'Kenderaan.required'    => 'Sila masukkan JENIS KENDERAAN',



        ]);

        $pemandu = new Pemandu;

        //pemandu->database = $request->form

        $pemandu->nama      = $request->Nama;
        $pemandu->ic        = $request->IC;
        $pemandu->kenderaan = $request->Kenderaan;



        $pemandu->save();

        return redirect()->route('pemandu.index')
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
        $pemandu    = Pemandu::all();
        $kenderaan  = Kenderaan::all();

        $pemandu    = Pemandu::find($id);

        return view('pemandu.edit',compact('pemandu', 'kenderaan'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        // dd($request->all());

        $request->validate([
            'Nama'      => 'required',
            'IC'        => 'required',
            'Kenderaan' => 'required',


        ],[
            'Nama.required'         => 'Sila masukkan NAMA PEMANDU',
            'IC.required'           => 'Sila masukkan NOMBOR KAD PENGENALAN',
            'Kenderaan.required'    => 'Sila masukkan JENIS KENDERAAN',



        ]);

        $pemanduUpdate = Pemandu::find($id);

        //pemandu->database = $request->form

        $pemanduUpdate->nama        = $request->get('Nama');
        $pemanduUpdate->ic          = $request->get('IC');
        $pemanduUpdate->kenderaan   = $request->get('Kenderaan');



        $pemanduUpdate->save();

        return redirect()
                ->route('pemandu.index')
                ->with('Maklumat Berjaya di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pemandu = Pemandu::find($id);
        $pemandu->delete();
        return redirect()
                    ->route('pemandu.index')
                    ->with('success','data has been deleted successfully');


    }
}
