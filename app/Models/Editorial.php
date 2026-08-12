<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Editorial extends Model
{
    /** @use HasFactory<\Database\Factories\EditorialFactory> */
    use HasFactory;
    protected $table = 'editoriales';
    protected $fillable = ['nombre','direccion','telefono'];

    public function libros()
    {
        return $this->hasMany(libros::class);
    }

    public function pedidos()
    {
        return $this->hasMany(pedidos::class);
    }
}
