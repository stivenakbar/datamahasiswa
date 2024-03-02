<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Mahasiswa;

class MahasiswaController extends Controller
{
    /**
     * Display a lsiting of the resource
     * 
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['mahasiswa'] = Mahasiswa::all();
        return view('mahasiswa.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('mahasiswa.tambah');
    }
    
    /**
     * Store a newly created resource in storage.
     * 
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nim' => 'unique:mahasiswa,nim'
        ]);

        $data = [
            'nim' => $request->nim,
            'nama' => $request->nama,
            'prodi' => $request->prodi,
            'fakultas' => $request->fakultas,
            'jenis_kelamin' => $request->jenis_kelamin,
        ];

        Mahasiswa::create($data);

        return redirect()->route('mahasiswa.index')->with('berhasil', 'Data telah ditambahkan');
    }


/**
 * Display the specified resource.
 * 
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function show($id)
{
    //
}

/**
 * Show the form for editing the specified resource.
 * 
 * @param int $id
 * @return \Illuminate\Htpp\Response
 */
public function edit($id)
{
    $data['mahasiswa'] = Mahasiswa::find($id);

    return view('mahasiswa.edit', $data);
}

/**
 * Update the specified resource in storage.
 * 
 * @param \Illuminate\Http\Request $request
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function update(Request $request, $id)
{
    $mahasiswa = Mahasiswa::findOrFail($id);

    $request->validate([
        'nim' => "unique:mahasiswa,nim, $mahasiswa->id"
    ]);

    $data = [
        'nim' => $request->nim,
        'nama' => $request->nama,
        'prodi' => $request->prodi,
        'fakultas' => $request->fakultas,
        'jenis_kelamin' => $request->jenis_kelamin,
    ];

    $mahasiswa->update($data);

    return redirect()->route('mahasiswa.index')->with('berhasil', 'Data telah diupdate');
}


/**
 * Remove the specified resource from storage.
 * 
 * @param int $id
 * @return \Illuminate\Http\Response
 */
public function destroy($id)
{
    $mahasiswa = Mahasiswa::find($id);

    $mahasiswa->delete();

    return redirect()->route('mahasiswa.index')->with('berhasil', 'Data telah dihapus');
}
}