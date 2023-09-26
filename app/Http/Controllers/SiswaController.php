<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
class SiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $siswalist = Siswa::all();
        return view('master.siswa.index', compact('siswalist'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('master.siswa.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:5',
            'about' => 'required|string|min:5',
            'photo' => 'image|file',
        ]);
       
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->getData();
        
        $validatedData['photo'] = $request->file('photo')->store('photo');

        unset($validatedData['_token']);
        
        Siswa::create($validatedData);
        return redirect('/siswa')->with('success', 'Berhasil Menambahkan Data Siswa');
    }

    /**
     * Display the specified resource.
     */
    public function show(Siswa $siswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Siswa $siswa)
    {
        $siswa = Siswa::find($siswa->id);
        return view('master.siswa.edit', [
            "siswa" => $siswa
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Siswa $siswa)
    {
        $siswa = Siswa::find($siswa->id);
        

       $validator = Validator::make($request->all(),[
            'name' => 'required|string|min:5',
            'about' => 'required|string|min:5',
            'photo' => 'image|file',
       ]);

        if ($validator->fails()) {
        return redirect()->back()->withErrors($validator)->withInput();
        }
        
        $validatedData = $validator->getData();
        $validatedData['photo'] = $request->oldPhoto;
        
        if($request->photo) {
            if($request->oldPhoto) {
                Storage::delete($request->oldPhoto);
            }
            $validatedData['photo'] = $request->file('photo')->store('photo');

        } 

        unset($validatedData['_token']);
        unset($validatedData['_method']);
        unset($validatedData['oldPhoto']);

        Siswa::where('id',$siswa->id)->update($validatedData);
    
        return redirect('/siswa')->with('success', 'Berhasil Mengganti Data Siswa');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Siswa $siswa)
    {
        if($siswa->photo) {
            Storage::delete($siswa->photo);
        }
        Siswa::destroy($siswa->id);
        return redirect('/siswa')->with('success', 'Berhasil Menghapus Data Siswa');
    }
}