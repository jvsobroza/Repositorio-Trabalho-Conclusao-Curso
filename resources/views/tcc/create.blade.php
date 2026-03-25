<a href="{{ route('tcc.create') }}">Novo Cliente</a>

@foreach($tcc as $t)
    <p>
        {{ $t->titulo }} - {{ $t->id }}

        <a href="{{ route('tcc.edit', $t->id) }}">Editar</a>

        <form method="POST" action="{{ route('tcc.destroy', $t->id) }}">
            @csrf
            @method('DELETE')
            <button>Excluir</button>
        </form>
    </p>
@endforeach
