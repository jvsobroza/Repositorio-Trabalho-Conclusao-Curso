<?php

namespace App\Http\Controllers;

use App\Models\Tcc;
use App\Http\Requests\StoreTccRequest;
use App\Http\Requests\UpdateTccRequest;

class TccController extends Controller
{
    public function index()
    {
        $tcc = Tcc::all();
        return view('tcc.index', compact('tcc'));
    }


    /**
     * Exibir o formulário para criar um novo recurso.
     */
    public function create()
    {
        return view('tcc.create');
       
    }


    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(StoreTccRequest $request)
    {
        Tcc::create($request->all());
        return redirect()->route('tcc.index');
    }


    /**
     *Exibir o recurso especificado.
     */
    public function show(Tcc $tcc)
    {
        return view('tcc.show', compact('tcc'));
    }


    /**
     * Exibir o formulário para editar o recurso especificado.
     */
    public function edit($id)
    {
        $tcc = Tcc::findOrFail($id);
        return view('tcc.edit', compact('tcc'));
    }


    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(UpdateTccRequest $request, $id)
    {
        $tcc = Tcc::findOrFail($id);
        $tcc->update($request->all());


        return redirect()->route('tcc.index');
    }


    /**
     * Remova o recurso especificado do armazenamento.
     */
    public function destroy($id)
    {
        Tcc::destroy($id);
        return redirect()->route('tcc.index');
    }
}


