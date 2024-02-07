<?php

namespace App\Http\Controllers;
use App\Models\Kenderaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class KenderaanController extends Controller
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
        if (Auth::user()->peranan == 1) { /** Jika pengguna peranan 1=Admin */
            $dataKenderaan = Kenderaan::all(); /** View semua content */
        }

        else /**jika pengguna selain Admin */

        {
            $dataKenderaan = Kenderaan::where('jenama', Auth::user()->jenama)->get();
            /** View pada jenama yang ditetapkan sahaja */
        }

        return view('kenderaan.index',compact('dataKenderaan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('kenderaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {


        $request->validate([
        'Jenis'     => 'required',
        'Jenama'    => 'required',
        'Model'     => 'required',


        ],[

        'Jenis.required'    => 'Sila masukkan JENIS kenderaan',
        'Jenama.required'   => 'Sila masukkan JENAMA',
        'Model.required'    => 'Sila masukkan MODEL',



        ]);

        $kenderaan = new Kenderaan;

        $kenderaan->jenis   = $request->Jenis;
        $kenderaan->jenama  = $request->Jenama;
        $kenderaan->model   = $request->Model;



        $kenderaan->save();

        return redirect()->route('kenderaan.index')
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
         //data dropdown
         $kenderaan = Kenderaan::all();
         $kenderaan = Kenderaan::find($id);

         // dd($kenderaan);

         return view('kenderaan.edit', compact('kenderaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'Jenis'     => 'required',
            'Jenama'    => 'required',
            'Model'     => 'required',


            ],[

            'Jenis.required'    => 'Sila masukkan JENIS kenderaan',
            'Jenama.required'   => 'Sila masukkan JENAMA',
            'Model.required'    => 'Sila masukkan MODEL',



            ]);

            $kenderaanUpdate = Kenderaan::find($id);

            // Check if the record exists
        if (!$kenderaanUpdate) {
        return redirect()->route('kenderaan.index')->with('error', 'Rekod tidak dijumpai');
        }

        //nama->database = $request->form

            // $kenderaanUpdate->kenderaan = $request->get('Kenderaan');
            // $kenderaanUpdate->jenis     = $request->Jenis;
            // $kenderaanUpdate->jenama    = $request->Jenama;
            // $kenderaanUpdate->model     = $request->Model;



            // $kenderaan->save();

            // return redirect()->route('kenderaan.index')
            //                         ->with('Maklumat Berjaya di Simpan');

        // Update the attributes
        $kenderaanUpdate->jenis   = $request->input('Jenis');
        $kenderaanUpdate->jenama  = $request->input('Jenama');
        $kenderaanUpdate->model   = $request->input('Model');

        // Save the updated record
        $kenderaanUpdate->save();

        return redirect()->route('kenderaan.index')
                        ->with('success', 'Maklumat Berjaya di Simpan');

        }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $kenderaan = Kenderaan::find($id);
        $kenderaan ->delete();
        return redirect()
                ->route('kenderaan.index')
                ->with('success', 'Data Kenderaan berjaya dipadam');
    }
}
