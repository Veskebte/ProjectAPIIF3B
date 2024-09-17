<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Prodi;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prodis = Mahasiswa::with('prodis')->get();
        $data['message'] = true;
        $data['result'] = $prodis;
        return response()->json($data, Response::HTTP_OK);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required'
        ]);

        $result = Mahasiswa::create($validate);
        if($result){
            $response['success'] = true;
            $response['message'] = 'Mahasiswa berhasil ditambahkan!';
            return response()->json($response, Response::HTTP_CREATED);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Mahasiswa $mahasiswa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'npm' => 'required',
            'nama' => 'required',
            'tanggal_lahir' => 'required',
            'tempat_lahir' => 'required',
            'alamat' => 'required',
            'prodi_id' => 'required'
        ]);

        $result = Mahasiswa::where('id', operator: $id)->update($validate);
        if($result){
            $data['success'] = true;
            $data['message'] = "Data Mahasiswa Berhasil di-Update.";
            $data['result'] = $result;
            return response()->json($data, Response::HTTP_OK);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $mahasiswas = Mahasiswa::find(id: $id);
        if($mahasiswas){
            $mahasiswas->delete(); // hapus data mahasiswa berdasarkan $id
            $data['success'] = true;
            $data['message'] = "Data Mahasiswa Berhasil Dihapus.";
            return response()->json($data, Response::HTTP_OK);
        } else{
            $data['success'] = false;
            $data['message'] = "Data Mahasiswa Tidak DItemukan.";
            return response()->json($data, Response::HTTP_NOT_FOUND);
        }
    }
}
