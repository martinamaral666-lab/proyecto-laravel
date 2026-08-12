<?php

namespace App\Http\Controllers;

use App\Models\Pedidos;
use App\Http\Requests\StorePedidosRequest;
use App\Http\Requests\UpdatePedidosRequest;
use Illuminate\http\JsonResponse;
use Illuminate\http\Request;

class PedidosController extends Controller
{
   public function listarTodos(): JsonResponse {
        $pedidos = Pedido::with(['editorial', 'libros.generos'])->get();
        return response()->json($pedidos);
    }

    public function buscarPorId(int $id): JsonResponse {
        $pedido = Pedido::with(['editorial', 'libros.generos'])->findOrFail($id);
        return response()->json($pedido);
    }

    public function agregar(Request $request): JsonResponse {
        $data = $request->validate([
            'editorial_id' => 'required|exists:editoriales,id',
            'fecha' => 'required|date',
            'estado' => 'required|in:activo,cancelado,enviado',
            'libros' => 'required|array|min:1',
            'libros.*' => 'exists:libros,id',
        ]);

        $pedido = Pedido::create([
            'editorial_id' => $data['editorial_id'],
            'fecha' => $data['fecha'],
            'estado' => $data['estado'],
        ]);

        $pedido->libros()->sync($data['libros']);

        return response()->json($pedido->load(['editorial', 'libros']), 201);
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
    public function store(StorePedidosRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Pedidos $pedidos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pedidos $pedidos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePedidosRequest $request, Pedidos $pedidos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pedidos $pedidos)
    {
        //
    }
}
