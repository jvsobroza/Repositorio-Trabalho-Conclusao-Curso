<?php

namespace App\Http\Controllers;

use App\Models\Tcc;
use App\Http\Requests\StoreTccRequest;
use App\Http\Requests\UpdateTccRequest;
use App\Models\Banca;

class TccController extends Controller
{
    public function index()
    {
        $tcc = Tcc::latest()->paginate(5);
        return view('tcc.index', compact('tcc'))->with('i', (request()->input('page', 1) - 1) * 5);
    }


    /**
     * Exibir o formulário para criar um novo recurso.
     */
    public function create()
    {
        $banca = Banca::all(); //puxar todos os dados da tabela banca, usado no create Tcc
        return view('tcc.create', compact('banca'));

    }


    /**
     * Armazene um recurso recém-criado no armazenamento.
     */
    public function store(StoreTccRequest $request)
    {
        $dados = $request->except('pdf');

        if ($request->hasFile('pdf')) {
            $pdf = $request->file('pdf')->getClientOriginalName();
            $destino = base_path('public/pdfs');
            $request->file('pdf')->move($destino, $pdf);
            $dados['pdf'] = $pdf;
        }

        Tcc::create($dados);
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
        $banca = Banca::all();
        return view('tcc.edit', compact('tcc', 'banca'));
    }


    /**
     * Atualize o recurso especificado no armazenamento.
     */
    public function update(UpdateTccRequest $request, Tcc $tcc)
    {
        $dados = $request->except('pdf');

        if ($request->hasFile('pdf')) {
            $pdfAntigo = base_path('public/pdfs/' . $tcc->pdf);
            if (file_exists($pdfAntigo)) {
                unlink($pdfAntigo);
            }
            $pdf = $request->file('pdf')->getClientOriginalName();
            $destino = base_path('public/pdfs');
            $request->file('pdf')->move($destino, $pdf);
            $dados['pdf'] = $pdf;
        } else {
            $dados['pdf'] = $tcc->pdf;
        }

        $tcc->update($dados);
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


