@extends('banca.layout')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header bg-primary text-white">Adicionar novo Professor/Banca</h2>
  <div class="card-body">
 
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('banca.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
 
    <form action="{{ route('banca.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputNome class="form-label"><strong>Nome:</strong></label>
            <input
                type="text"
                oninput="tamanhoMax(this), verificarMin(this)"
                maxlength="100"
                minlength="10"
                name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                id="inputNome"
                required
                placeholder="Daniel Alarico">
            @error('nome')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputTitulacao" class="form-label"><strong>Titulação:</strong></label>
            <input
                type="text"
                name="titulacao"
                maxlength="50"
                minlength="5"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('titulacao') is-invalid @enderror"
                id="inputTitulacao"
                required
                placeholder="Mestrado em Engenharia de Software">
            @error('titulacao')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Cadastrar</button>
    </form>
 
  </div>
</div>
@endsection

<script>
    function tamanhoMax(e)
    {
        if (e.value.length > e.maxLength)
        e.value = e.value.slice(0, e.maxLength)
    }

    function verificarMin(e) {
        const min = e.getAttribute('minlength');
        if (e.value.length > 0 && e.value.length < min) {
            e.style.borderColor = "red";
            e.style.borderWidth = "2px"; 
        } else {
            e.style.borderColor = ""; 
            e.style.borderWidth = "";
        }
    }

    document.addEventListener("DOMContentLoaded", (event) => {
    const form = document.querySelector("form");
    const inputs = form.querySelectorAll("input");
    form.addEventListener("submit", function (event) {
            let formValid = true;
            inputs.forEach(e => {
                if (e.value.length > 0 && e.value.length < e.getAttribute('minlength')) {
                    formValid = false;
                }
            });
            if (!formValid) {
                event.preventDefault();
                alert("Preencha todos os campos corretamente!");
            }
        });
    });
</script>