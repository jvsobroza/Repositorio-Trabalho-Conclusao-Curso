<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{
    protected $fillable = ['titulo', 'paginas', 'data', 'hora', 'aluno', 'palavras_chave', 'pdf', 'orientador', 'banca_1', 'banca_2'];

    //UM tcc tem MUITAS pessoas da banca
    public function banca()
    {
        return $this->hasMany(Banca::class);
    }
}
