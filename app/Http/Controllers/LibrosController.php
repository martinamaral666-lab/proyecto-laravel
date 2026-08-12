<?php

namespace App\Http\Controllers;

use App\Models\Libros;
use App\Http\Requests\StoreLibrosRequest;
use App\Http\Requests\UpdateLibrosRequest;
use Illuminate\http\JsonResponse;
use Illuminate\http\Request;

class LibrosController extends Controller
{
    public function listarTodos(): JsonResponse {
        $libros = Libro::with(['editorial', 'generos', 'pedidos'])->get();
        return response()->json($libros);
    }

    public function buscarPorId(int $id): JsonResponse {
        $libro = Libro::with(['editorial', 'generos', 'pedidos'])->findOrFail($id);
        return response()->json($libro);
    }

    public function agregar(Request $request): JsonResponse {
        $data = $request->validate([
            'editorial_id' => 'required|exists:editoriales,id',
            'titulo' => 'required|string|max:255',
            'autor' => 'required|string|max:255',
            'generos' => 'array',
            'generos.*' => 'exists:generos,id',
        ]);

        $libro = Libro::create([
            'editorial_id' => $data['editorial_id'],
            'titulo' => $data['titulo'],
            'autor' => $data['autor'],
        ]);

        if (isset($data['generos'])) {
            $libro->generos()->sync($data['generos']);
        }

        return response()->json($libro->load(['editorial', 'generos']), 201);
    }

    public function index()
    {
        //
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
    public function store(StoreLibrosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Libros $libros)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libros $libros)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateLibrosRequest $request, Libros $libros)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libros $libros)
    {
        //
    }
}
