<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Productos extends Model
{
    /** @use HasFactory<\Database\Factories\ProductosFactory> */
    use HasFactory;
    public $fillable=["nombre","codigo","unidades","familia","proveedor_id"];

    public function proveedor() {
        return $this->belongsTo(Proveedor::class, 'proveedor_id');
    }
}
