<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\PasswordController;
use App\Http\Requests\StoreProductosRequest;
use App\Http\Requests\UpdateProductosRequest;
use App\Models\Productos;
use App\Models\Proveedor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Schema;

class ProductosController extends Controller
{
    public function index() {
        $campos = Schema::getColumnListing('productos');
        $exclude = ["created_at", "updated_at"];
        $campos = array_diff($campos, $exclude);
        $filas = Productos::select($campos)->get();
        //select id, nombre, cod, unidades, familia, proveedor_id from productos
        return view('productos.index', compact('filas', 'campos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $proveedores = Proveedor::all();
        return view("productos.create", compact('proveedores'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductosRequest $request)
    {
        $datos = $request->only("nombre","codigo","unidades","familia","proveedor_id"); //Le especifico los campos de la request
        $productos = new Productos($datos);
        $productos->save();

        session()->flash("mensaje", "El producto '$productos->nombre' ha sido registrado correctamente"); //Es lo mismo que usar $_SESSION y hacer que se vaya al mostrarse
        return redirect()->route('productos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Productos $producto)
    {
        // Cargar el proveedor relacionado con el producto
        $producto->load('proveedor');

        return view('productos.show', [
            'producto' => $producto,
            'proveedor' => $producto->proveedor, // Pasamos el proveedor desde la relación
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Productos $producto)
    {
        // Obtener todos los proveedores
        $proveedores = Proveedor::all();

        // Obtener el proveedor asociado al producto
        $proveedor_asociado = $producto->proveedor;

        // Retornar la vista con el producto, proveedores y proveedor asociado
        return view('productos.edit', compact('producto', 'proveedores', 'proveedor_asociado'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductosRequest $request, Productos $producto)
    {
        $datos = $request->only("nombre", "email", "f_nac", "dni", "proveedor_id"); //Le especifico los campos de la request
        $producto->update($datos); //Actualizamos datos
        session()->flash("mensaje","Producto $producto->nombre actualizado"); // Mensaje flotante
        return redirect()->route('productos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Productos $producto) {
        $proveedor = $producto->proveedor; // Obtener el proveedor del producto

        $producto->delete(); // Eliminar el producto

        // Si el proveedor ya no tiene más productos, lo eliminamos
        if ($proveedor && $proveedor->productos()->count() == 0) {
            $proveedor->delete();
        }

        session()->flash("mensaje", "Producto $producto->nombre eliminado" . ($proveedor ? " y su proveedor eliminado" : ""));
        return redirect()->route('productos.index');
    }
}
