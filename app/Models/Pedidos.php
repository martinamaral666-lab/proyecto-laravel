<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Pedidos extends Model
{

    use HasFactory;
    protected $fillable = ['fecha','estado','editorial_id','libro_id'];

    public function libros(): BelongsToMany
    {
        return $this->belongsToMany(Libros::class, 'libro_pedido');
    }


    public function editorial(): BelongsTo
    {
        return $this->belongsTo(Editorial::class, 'editorial_id');
    }
}
