<?php

namespace App\Http\Controllers;
use App\Models\Jadwalpelajaran;

use App\Models\Namaguru;
use Illuminate\Http\Request;

class JadwalpelajaranController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $jadwalpelajaran = Jadwalpelajaran::orderBy('id', 'DESC')->paginate(5);
        $namaguru = Namaguru::all();
   
        return view('jadwalpelajaran',compact('jadwalpelajaran','namaguru'));
    }
    public function store(Request $request)
    {
              $request->validate([
             'pelajaran' => 'required',
             'id_namaguru' => 'required',
             'waktu_mulai' => 'required',
             'waktu_selesai' => 'required',
             
         
          ]);

        $jadwalpelajaran = Jadwalpelajaran::create([
            
            'pelajaran' => $request->pelajaran,
            'id_namaguru' => $request->id_namaguru,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
       
        ]);

        if ($jadwalpelajaran) {
            return redirect('jadwalpelajaran')->with('success', 'Jadwalpelajaran Berhasil Ditambahkan.');
        }
    }

    public function edit(Request $request)
    {
        $request->validate([
             
            'pelajaran' => 'required',
            'id_namaguru' => 'required',
            'waktu_mulai' => 'required',
            'waktu_selesai' => 'required',
         ]);

        $jadwalpelajaran = Jadwalpelajaran::where('id', $request->id)->update([
          
               
            'pelajaran' => $request->pelajaran,
            'id_namaguru' => $request->id_namaguru,
            'waktu_mulai' => $request->waktu_mulai,
            'waktu_selesai' => $request->waktu_selesai,
       
        ]);


        if ($jadwalpelajaran) {
            return redirect('jadwalpelajaran')->with('success', 'jadwalpelajaranBerhasil DiEdit.');
        }
    }

    public function delete(Request $request)
    {
        $del = Jadwalpelajaran::where('id', $request->id)->delete();

        if ($del) {
            return redirect('jadwalpelajaran')->with('success', 'JadwalpelajaranBerhasil Dihapus.');
        }
    }
}
