@extends('tcc.layout')
@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Repositórios de TCCs</h2>
        <div class="card-body">

            <div class="d-flex justify-content-between align-items-center gap-1">
                <a class="btn btn-primary btn-sm" href="{{ route('banca.index') }}">
                    <i class="fa fa-arrow-left"></i> Ir para Banca
                </a>
                <a class="btn btn-success btn-sm" href="{{ route('tcc.create') }}"> <i class="fa fa-plus"></i> Inserir
                    Novo TCC</a>
            </div>

            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <!--Título
                    Páginas
                    data
                    hora
                    aluno
                    resumo
                    palavras chave -> sera feito com ,
                    arquivo (pdf) anexado
                    orientador
                    membros da banca - 1 obrigatório é o orientador então deixar de fora, os outros 2 sera com ,
                    -->
            <table class="table table-bordered table-striped mt-4 text-center align-middle">
                <thead>
                    <tr>
                        <th width="80px">cod</th>
                        <th>Título</th>
                        <th width="80px">Páginas</th>
                        <th width="80px">Data</th>
                        <th width="80px">Hora</th>
                        <th>Aluno</th>
                        <th>Resumo</th>
                        <th>Palavras-chave</th>
                        <th>Arquivo</th>
                        <th>Orientador</th>
                        <th>Membros da Banca</th>
                        <th width="100px">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($tcc as $t)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $t->titulo }}</td>
                            <td>{{ $t->paginas }}</td>
                            <td>{{ $t->data }}</td>
                            <td>{{ $t->hora }}</td>
                            <td>{{ $t->aluno }}</td>
                            <td>{{ $t->resumo }}</td>
                            <td>{{ $t->palavras_chave }}</td>
                            <td>
                                <a class="btn btn-secondary btn-sm" href="{{ asset('pdfs/' . $t->pdf) }}" target="_blank">
                                    <i class="fa-solid fa-file-pdf"></i> Visualizar PDF
                                </a>
                            </td>
                            <td>{{ $t->getOrientador->nome }}</td>
                            <td>{{ $t->banca1->nome . ', ' . $t->banca2->nome }}</td>
                            <td>
                                <form action="{{ route('tcc.destroy', $t->id) }}" method="POST">
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a class="btn btn-info btn-sm" href="{{ route('tcc.show', $t->id) }}"><i
                                                class="fa-solid fa-list"></i> Visualizar</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('tcc.edit', $t->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i> Editar</a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                            Excluir</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Dados inexistentes.</td>
                        </tr>
                    @endforelse
                </tbody>
        </div>

        {!! $tcc->withQueryString()->links('pagination::bootstrap-5') !!}
    </div>
@endsection