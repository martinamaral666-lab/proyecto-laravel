<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    /** @use HasFactory<\Database\Factories\LibrosFactory> */
    use HasFactory;
    protected $fillable = ['titulo','autor','editorial_id','genero_id'];

    public function editorial()
    {
        return this->belongTo(editorial::class, 'editorial_id');
    }

    public function generos()
    {
        return this->belongTo(generos::class, 'genero_id');
    }

    public function pedidos()
    {
        return this->hasMany(pedidos::class);
    }
}
