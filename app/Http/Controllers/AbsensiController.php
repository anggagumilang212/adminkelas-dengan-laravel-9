<?php

namespace App\Http\Controllers;
use App\Models\Absensi;

use Illuminate\Http\Request;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {  
        if($request->has('search')){
            
            $absensi  = Absensi::where('nama','LIKE','%'. $request->search.'%' )->paginate(5);
           
            
        }else{
            $absensi = Absensi::orderBy('id', 'DESC')->paginate(5);
 
        }
        
        return view('absensi',compact('absensi'));
    }
    public function store(Request $request)
    {
              $request->validate([
             
             'nama' => 'required',
            'kelas' => 'required',
              'jurusan' => 'required',
              'keterangan' => 'required',
            
          ]);

        $absensi = Absensi::create([
            
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'keterangan' => $request->keterangan,
           
        ]);

        if ($absensi) {
            return redirect('absensi')->with('success', 'Absensi Berhasil Ditambahkan.');
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
             
            'nama' => 'required',
            'kelas' => 'required',
              'jurusan' => 'required',
              'keterangan' => 'required',
         ]);

        $absensi = Absensi::where('id', $request->id)->update([
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'keterangan' => $request->keterangan,
        ]);


        if ($absensi) {
            return redirect('absensi')->with('success', 'Absensi Berhasil Diedit.');
        }
    }

    public function hapusAgama(Request $request)
    {
        $del = Absensi::where('id', $request->id)->delete();

        if ($del) {
            return redirect('absensi')->with('success', 'Absensi Berhasil Dihapus.');
        }
    }
}
