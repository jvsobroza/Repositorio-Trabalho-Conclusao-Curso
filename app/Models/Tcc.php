<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tcc extends Model
{
    protected $fillable = ['titulo', 'paginas', 'data', 'hora', 'aluno', 'resumo', 'palavras_chave', 'pdf', 'orientador', 'banca_1', 'banca_2'];

    //UM tcc tem MUITAS pessoas da banca
    public function banca1()
    {
        return $this->belongsTo(Banca::class, 'banca_1');
    }
    public function banca2()
    {
        return $this->belongsTo(Banca::class, 'banca_2');
    }    
    public function getOrientador()
    {
        return $this->belongsTo(Banca::class, 'orientador');
    }
}
