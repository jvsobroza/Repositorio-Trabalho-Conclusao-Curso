@extends('banca.layout')
@section('content')

    <div class="card mt-5">
        <h2 class="card-header bg-primary text-white">Banca e Professores</h2>
        <div class="card-body">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <div class="d-flex justify-content-between align-items-center gap-1">
                <a class="btn btn-primary btn-sm" href="{{ route('tcc.index') }}">
                    <i class="fa fa-arrow-left"></i> Ir para TCCs
                </a>
                <a class="btn btn-success btn-sm" href="{{ route('banca.create') }}"> <i class="fa fa-plus"></i> Inserir
                    Nova Banca/Professor</a>
            </div>


            <table class="table table-bordered table-striped mt-4 text-center align-middle">
                <thead>
                    <tr>
                        <th width="80px">cod</th>
                        <th>Nome</th>
                        <th>Titulação</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($banca as $ba)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $ba->nome }}</td>
                            <td>{{ $ba->titulacao }}</td>
                            <td>
                                <form action="{{ route('banca.destroy', $ba->id) }}" method="POST">
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a class="btn btn-info btn-sm" href="{{ route('banca.show', $ba->id) }}"><i
                                                class="fa-solid fa-list"></i> Visualizar</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('banca.edit', $ba->id) }}"><i
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

        {!! $banca->withQueryString()->links('pagination::bootstrap-5') !!}

    </div>
@endsection