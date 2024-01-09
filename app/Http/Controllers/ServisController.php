<?php

namespace App\Http\Controllers;
use App\Models\Kenderaan;
use App\Models\Servis;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ServisController extends Controller
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
        $dataServis = Servis::orderBy('id','asc')->paginate(5);
        return view('servis.index',compact('dataServis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kenderaan = Kenderaan::all();
        return view('servis.create', compact('kenderaan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'Kenderaan' => 'required',
            'Odometer' => 'required',
            'Tarikh' => 'required',
            'Harga' => 'required',


        ],[
            'Kenderaan.required' => 'Pilih KENDERAAN',
            'Odometer.required' => 'Masukkan MILAGE kenderaan',
            'Tarikh.required' => 'Masukkan TARIKH Servis',
            'Harga.required' => 'Masukkan HARGA servis',



        ]);

        $servis = new Servis;

        //nama->database = $request->form

        $servis->kenderaan = $request->Kenderaan;
        $servis->odometer = $request->Odometer;
        $servis->tarikh = $request->Tarikh;
        $servis->harga = $request->Harga;

// dd($servis);

        $servis->save();

        return redirect()->route('servis.index')
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
        $kenderaan = Kenderaan::all();
        $servis = Servis::find($id);

        // dd($minyak);

        return view('servis.edit', compact('kenderaan','servis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       $request->validate([
            'Kenderaan' => 'required',
            'Odometer' => 'required',
            'Tarikh' => 'required',
            'Harga' => 'required',


        ],[
            'Kenderaan.required' => 'Pilih KENDERAAN',
            'Odometer.required' => 'Masukkan MILAGE kenderaan',
            'Tarikh.required' => 'Masukkan TARIKH Servis',
            'Harga.required' => 'Masukkan HARGA servis',



        ]);

        $servisUpdate = Servis::find($id);

        //nama->database = $request->form

        $servisUpdate->kenderaan = $request->get('Kenderaan');
        $servisUpdate->odometer = $request->get('Odometer');
        $servisUpdate->tarikh = $request->get('Tarikh');
        $servisUpdate->harga = $request->get('Harga');

// dd($servis);

        $servis->save();

        return redirect()
                    ->route('servis.index')
                    ->with('Maklumat Berjaya di Simpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $servis)
    {
        $minyak = Minyak::find($servis);
        $minyak->delete();
        return redirect()->route('minyak.index')->with('success', 'Data Minyak berjaya dipadam');
    }
}
