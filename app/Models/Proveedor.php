<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;
    // Especifica el nombre de la tabla para que no al detecte automaticamente como proveedors
    protected $table = 'proveedores';
    protected $fillable = ['nombre', 'email', 'telefono'];

    // Relación uno a muchos (Un proveedor tiene muchos productos)
    public function productos()
    {
        return $this->hasMany(Productos::class);
    }
}
