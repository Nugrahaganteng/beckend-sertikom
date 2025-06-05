<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Lifehub;
use Illuminate\Http\Request;

class LifehubController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json(Lifehub::all(), 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'jenis_kegiatan' => 'required|string|max:255',
            'mood' => 'required|string|in:Sedih,Senang,Stress|max:255', // PERUBAHAN DI SINI
            'kegiatan' => 'required|string|min:1|max:120',
            'tanggal' => 'required|string|max:90',
        ]);

        $kegiatan = Lifehub::create($request->all());
        return response()->json($kegiatan, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $kegiatan= Lifehub::find($id);
        if (!$kegiatan) {
            return response()->json(['message' => 'Data tidak ada'], 404);
        }
        return response()->json($kegiatan);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $kegiatan = Lifehub::find($id);
        if (!$kegiatan) {
            return response()->json(['message' => 'Data tidak ditemukan '], 404);
        }  
        $request->validate([
            'jenis_kegiatan' => 'required|string|max:255',
            'mood' => 'required|string|in:Sedih,Senang,Stress|max:255', // PERUBAHAN DI SINI
            'kegiatan' => 'required|string|min:1|max:120',
            'tanggal' => 'required|string|max:90',
        ]);
        $kegiatan->update($request->all());
        return response()->json([
            'message' => 'kegiatan berhasil diupdate',
            'data' =>$kegiatan,
        ],status: 200);  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
       $kegiatan =Lifehub::find($id);
        if (!$kegiatan) {
            return response()->json(['message' => 'kegiatan tidak ada'], 404);
        }
      $kegiatan->delete();
        return response()->json(['message' => 'kegiatan berhasil dihapus'], 200);
    }
}