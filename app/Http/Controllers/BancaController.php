<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBancaRequest;
use App\Models\Tcc;
use App\Http\Requests\StoreTccRequest;
use App\Http\Requests\UpdateBancaRequest;
use App\Http\Requests\UpdateTccRequest;
use App\Models\Banca;

class BancaController extends Controller
{
    public function index()
    {
        $banca = Banca::all();
        return view('banca.index', compact('banca'));
    }


    /**
     * Exibir o formulário para criar um novo recurso.
     */
    public function create()
    {
        return view('banca.create');
       
    }


    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(StoreBancaRequest $request)
    {
        Banca::create($request->all());
        return redirect()->route('banca.index');
    }


    /**
     *Exibir o recurso especificado.
     */
    public function show(Banca $banca)
    {
        return view('banca.show', compact('banca'));
    }


    /**
     * Exibir o formulário para editar o recurso especificado.
     */
    public function edit($id)
    {
        $banca = Banca::findOrFail($id);
        return view('banca.edit', compact('banca'));
    }


    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(UpdateBancaRequest $request, $id)
    {
        $banca = Banca::findOrFail($id);
        $banca->update($request->all());


        return redirect()->route('banca.index');
    }


    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy($id)
    {
        Banca::destroy($id);
        return redirect()->route('banca.index');
    }
}


