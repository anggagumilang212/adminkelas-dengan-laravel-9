<?php

namespace App\Http\Controllers;
use App\Models\Uangkas;

use App\Models\Absensi;
use Illuminate\Http\Request;

class UangkasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uangkas = Uangkas::orderBy('id', 'DESC')->paginate(5);
        $absensi = absensi::all();
   
        return view('uangkas',compact('uangkas','absensi'));
    }
    public function store(Request $request)
    {
              $request->validate([
             'id_absensi' => 'required',
             'hari' => 'required',
             'tgl_bayar' => 'required',
             'jml_bayar' => 'required',
         
          ]);

        $uangkas = uangkas::create([
            
           
            'id_absensi' => $request->id_absensi,
            'hari' => $request->hari,
            'tgl_bayar' => $request->tgl_bayar,
            'jml_bayar' => $request->jml_bayar,
       
        ]);

        if ($uangkas) {
            return redirect('uangkas')->with('success', 'uangkas Berhasil Ditambahkan.');
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
             
            'id_absensi' => 'required',
            'hari' => 'required',
            'tgl_bayar' => 'required',
            'jml_bayar' => 'required',
         ]);

        $uangkas = uangkas::where('id', $request->id)->update([
          
            'id_absensi' => $request->id_absensi,
            'hari' => $request->hari,
            'tgl_bayar' => $request->tgl_bayar,
            'jml_bayar' => $request->jml_bayar,
        ]);


        if ($uangkas) {
            return redirect('uangkas')->with('success', 'uangkas Berhasil Diedit.');
        }
    }

    public function delete(Request $request)
    {
        $del = uangkas::where('id', $request->id)->delete();

        if ($del) {
            return redirect('uangkas')->with('success', 'Uangkas Berhasil Dihapus.');
        }
    }
}
