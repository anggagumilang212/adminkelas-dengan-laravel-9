<?php

namespace App\Http\Controllers;

use App\Models\Namaguru;
use Illuminate\Http\Request;

class NamaguruController extends Controller
{
    public function index(Request $request)
    {
        if($request->has('search')){
            
            $namaguru  = namaguru::where('nama','LIKE','%'. $request->search.'%')->paginate(5);
        }else{
            $namaguru = namaguru::orderBy('id', 'ASC')->paginate(5);
 
        }
      
        return view('namaguru', compact('namaguru'));
    }
     
    public function store(Request $request)
    {
        $request->validate([
        
            'namaguru' => 'required',
            'nip' => 'required',
            'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
            'status' => 'required',
          
        ]);

        $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();

        $request->foto->move(public_path('fotoguru/'), $imageName);


        $namaguru = namaguru::create([
            
            'namaguru' => $request->namaguru,
            'nip' => $request->nip,
            'foto' => $imageName,
            'status' => $request->status,
           
           
            
            
        ]);

        if ($namaguru) {
            return redirect('namaguru')->with('success', 'Dataguru Berhasil Ditambahkan.');
        }
    }

    public function edit(Request $request)
    {    
        //  $request->validate([
           
        //     'namaguru' => 'required',
        //     'nip' => 'required',
        //     'foto' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp',
        //      'status' => 'required',
            
        //  ]);


        $imageName = $request->gambarLama;

        if ($request->hasFile('foto')) {
            $image = $request->file('foto');
            $imageName = time() . '_' . $request->file('foto')->getClientOriginalName();
            $image->move(public_path('fotoguru/'), $imageName);
        }

        $namaguru = namaguru::where('id', $request->id)->update([
            
            'namaguru' => $request->namaguru,
            'nip' => $request->nip,
            'foto' => $imageName,
            'status' => $request->status,
           
        ]);

        if ($namaguru) {
            return redirect('namaguru')->with('success', 'Dataguru Berhasil Diedit.');
        }
    }

    public function delete(Request $request)
    {
        $del = namaguru::where('id', $request->id)->delete();

        if ($del) {
            return redirect('namaguru')->with('success', 'Dataguru Berhasil Dihapus.');
        }
    }
}
