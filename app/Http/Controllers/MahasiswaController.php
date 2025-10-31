<?php

namespace App\Http\Controllers;
use App\Models\Dosen;
use App\Models\Hobi;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;


class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mahasiswa = Mahasiswa::latest()->get();
        return view('mahasiswa.index', compact('mahasiswa'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $dosen = Dosen::all();
        $hobi =Hobi::all();
        return view('mahasiswa.create', compact('dosen' , 'hobi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama'=>'required',
            'nim'=>'required|',
            'id_dosen'=> 'required|exists:dosens,id',

        ]);

          $mahasiswa = new Mahasiswa();
          $mahasiswa->nama = $request->nama;
          $mahasiswa->nim = $request->nim;
          $mahasiswa->id_dosen = $request->id_dosen;
          $mahasiswa->save();
        //attach
        $mahasiswa->hobis()->attach($request->hobi);
          return redirect()->route('mahasiswa.index');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('mahasiswa.show', compact('mahasiswa'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $dosen = Dosen::all();
        $hobi=Hobi::all();
        return view('mahasiswa.edit', compact('mahasiswa','dosen','hobi'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
    'nama'     => 'required',
    'nim'      => 'required|unique:mahasiswas',
    'id_dosen' => 'required|exists:dosens,id',

      ]);

    $mahasiswa           = Mahasiswa::findOrFail($id);
    $mahasiswa->nama     = $request->nama;
    $mahasiswa->nim      = $request->nim;
    $mahasiswa->id_dosen = $request->id_dosen;
    $mahasiswa->save();
    //sync (memperbarui data yang di ubah dari many to many)
    $mahasiswa->hobis()->sync($request->hobi);
    return redirect()->route('mahasiswa.index');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $mahasiswa = Mahasiswa::findOrFail($id);
       //detach (menghapius data yang terkait dari mahasiswa dan hobi)
        //  menghapus data di relasi table pivot 
       $mahasiswa->hobis()->detach();
        $mahasiswa->delete();
        return redirect()->route('mahasiswa.index');
    }
}
