<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\menu;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index(Request $request)
{
    $query = Pesanan::with('kategori')
        ->withCount('Harga');

    if ($request->filled('cari')) {
        $cari = $request->cari;

        $query->where(function ($q) use ($cari) {
            $q->where('Makanan', 'like', "%{$cari}%")
                ->orWhere('list_makanan', 'like', "%{$cari}%");
        });
    }

    if ($request->filled('kategori')) {
        $query->where('kategori_id', $request->kategori);
    }

    if ($request->filled('Makanan')) {
        $query->where('nama_makanan', $request->makanan);
    }

    $data = $query
        ->orderBy('created_at', 'desc')
        ->paginate(10)
        ->appends($request->query());

    return response()->json($data, 200);
}

    public function store( $request)
    {
        $makanan = Pesanan::create($request->validated());

        return response()->json([
            'message' => 'Makanan berhasil ditambahkan.',
            'data' => $buku,
        ], 201);
    }

    public function show(string $id)
    {
        $makanan = Pesanan::with('kategori')
            ->withCount('Makanan')
            ->find($id);

        if (!$buku) {
            return response()->json([
                'message' => 'Makanan tidak ditemukan.',
            ], 404);
        }

        return response()->json([
            'data' => $Makanan,
        ], 200);
    }

    public function update(
        $request,
        string $id
    ) {
        $makanan = Pesanan::find($id);

        if (!$makanan) {
            return response()->json([
                'message' => 'Makanan sedang habis.',
            ], 404);
        }

        $makanan->update($request->validated());

        return response()->json([
            'message' => 'Makanan sudah ready.',
            'data' => $makanan->fresh()->load('kategori'),
        ], 200);
    }

    public function destroy(string $id)
    {
        $makanan = Pesanan::find($id);

        if (!$makanan) {
            return response()->json([
                'message' => 'Makanan tidak ditemukan.',
            ], 404);
        }

        $makanan->delete();

        return response()->json([
            'message' => 'Buku berhasil dihapus.',
        ], 200);
    }
}