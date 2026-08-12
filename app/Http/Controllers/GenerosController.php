<?php

namespace App\Http\Controllers;

use App\Models\Generos;
use App\Http\Requests\StoreGenerosRequest;
use App\Http\Requests\UpdateGenerosRequest;
use Illuminate\http\JsonResponse;
use Illuminate\http\Request;

class GenerosController extends Controller
{
    public function listarTodos(): JsonResponse {
        $generos = Genero::with('libros')->get();
        return response()->json($generos);
    }

    public function buscarPorId(int $id): JsonResponse {
        $genero = Genero::with('libros')->findOrFail($id);
        return response()->json($genero);
    }

    public function agregar(Request $request): JsonResponse {
        $data = $request->validate([
            'nombre' => 'required|string|unique:generos,nombre|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $genero = Genero::create($data);
        return response()->json($genero, 201);
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
    public function store(StoreGenerosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Generos $generos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Generos $generos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateGenerosRequest $request, Generos $generos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Generos $generos)
    {
        //
    }
}
