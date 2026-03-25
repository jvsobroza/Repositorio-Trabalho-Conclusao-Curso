<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banca extends Model
{
    protected $fillable = ['titulacao', 'nome'];

    // UMA venda pertence a UM cliente
    public function cliente()
    {
        return $this->belongsToMany(Tcc::class);
    }
}
