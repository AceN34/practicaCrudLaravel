<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use App\Models\Alumno;
use App\Models\Productos;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductosController extends Controller
{
    public function index() {
        $campos = Schema::getColumnListing('productos');
        $exclude = ["created_at", "updated_at"];
        $campos = array_diff($campos, $exclude);
        $filas = Productos::select($campos)->get();
        //select id, nombre, cod, unidades, familia from productos
        return view('productos.index', compact('filas', 'campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("productos.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductosRequest $request)
    {
        $datos = $request->input();
        $productos = new Productos($datos);
        $productos->save();
        session()->flash("mensaje", "El producto '$productos->nombre' ha sido registrado correctamente"); //Es lo mismo que usar $_SESSION y hacer que se vaya al mostrarse
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $productos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        return view("productos.edit", compact('producto'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductosRequest $request, Productos $producto)
    {
        $producto->update($request->input());
        session()->flash("mensaje","Producto $producto->nombre actualizado");
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto) {
        $producto->delete();
        session()->flash("mensaje","Producto $producto->nombre eliminado");
        return redirect()->route('productos.index');
    }
}
