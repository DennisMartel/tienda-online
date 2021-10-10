<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    protected $fillable = [
        "codigo",
        "nombre",
        "slug",
        "precio_venta",
        "descripcion_larga",
        "descripcion_corta",
        "status",
        "vendidos",
        "retorno",
        "departamento_id",
        "categoria_id",
        "subcategoria_id",
        "marca_id",
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
