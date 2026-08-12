<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use App\Http\Requests\StoreEditorialRequest;
use App\Http\Requests\UpdateEditorialRequest;
use Illuminate\http\JsonResponse;
use Illuminate\http\Request;

class EditorialController extends Controller
{
  public function listarTodos(): JsonResponse{
$editoriales = Editorial::with(['libros', 'pedidos'])->get();
        return response()->json($editoriales);
    }

    public function buscarPorId(int $id): JsonResponse {
        $editorial = Editorial::with(['libros', 'pedidos'])->findOrFail($id);
        return response()->json($editorial);
    }

    public function agregar(Request $request): JsonResponse {
        $data = $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:50',
        ]);

        $editorial = Editorial::create($data);
        return response()->json($editorial, 201);
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
    public function store(StoreEditorialRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Editorial $editorial)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Editorial $editorial)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateEditorialRequest $request, Editorial $editorial)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Editorial $editorial)
    {
        //
    }
}
