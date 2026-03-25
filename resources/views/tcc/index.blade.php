@extends('tcc.layout')
@section('content')

    <div class="card mt-5">
        <h2 class="card-header">Repositórios de TCCs</h2>
        <div class="card-body">
            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession
            <a href="{{ route('tcc.create') }}">Nova Venda</a>

            @foreach($tcc as $t)
                <p>
                    Valor: {{ $v->valor_total }} <br>
                    Cliente: {{ $v->cliente->nome }}

                    <a href="{{ route('vendas.edit', $v->id) }}">Editar</a>

                <form method="POST" action="{{ route('vendas.destroy', $v->id) }}">
                    @csrf
                    @method('DELETE')
                    <button>Excluir</button>
                </form>
                </p>
            @endforeach
        </div>
    </div>
@endsection