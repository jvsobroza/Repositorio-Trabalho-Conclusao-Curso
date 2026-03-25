@extends('aluno.layout')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">adicionar novo aluno</h2>
  <div class="card-body">
 
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('aluno.index') }}"><i class="fa fa-arrow-left"></i> Back</a>
    </div>
 
    <form action="{{ route('aluno.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="inputMatricula" class="form-label"><strong>Matrícula:</strong></label>
            <input
                type="number"
                oninput="tamanhoMax(this), verificarMin(this)"
                maxlength="10"
                minlength="10"
                name="matricula"
                class="form-control @error('matricula') is-invalid @enderror"
                id="inputMatricula"
                placeholder="2024000000">
            @error('matricula')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputNome" class="form-label"><strong>Nome:</strong></label>
            <input
                type="text"
                name="nome"
                class="form-control @error('nome') is-invalid @enderror"
                id="inputNome"
                placeholder="Name">
            @error('nome')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
 
        <div class="mb-3">
            <label for="inputCpf" class="form-label"><strong>CPF:</strong></label>
            <input
                type="number"
                oninput="tamanhoMax(this), verificarMin(this)"
                maxlength = "11"
                minlength="11"
                name="cpf"
                class="form-control @error('cpf') is-invalid @enderror"
                id="inputCpf"
                placeholder="00000000000"></textarea>
            @error('cpf')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputEmail" class="form-label"><strong>Email:</strong></label>
            <input
                oninput="verificarMin(this)"
                type="email"
                minlength="10"
                name="email"
                class="form-control @error('email') is-invalid @enderror"
                id="inputemail"
                placeholder="Alarico@gmail.com">
            @error('email')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputTelefone" class="form-label"><strong>Telefone:</strong></label>
            <input
            oninput="tamanhoMax(this), verificarMin(this)"
                type="number"
                maxlength="11"
                minlength="11"
                name="telefone"
                class="form-control @error('telefone') is-invalid @enderror"
                id="inputTelefone"
                placeholder="(55) 99999-9999">
            @error('telefone')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <div class="mb-3">
            <label for="inputCurso" class="form-label"><strong>Curso:</strong></label>
            <input
                oninput="verificarMin(this)"
                type="text"
                minlength="3"
                name="curso"
                class="form-control @error('curso') is-invalid @enderror"
                id="inputCurso"
                placeholder="Analise e Desenvolvimento de Sistemas">
            @error('curso')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        
        <div class="mb-3">
            <label for="inputFoto" class="form-label"><strong>Foto:</strong></label>
            <input
                type="file"
                name="foto"
                class="form-control @error('foto') is-invalid @enderror"
                id="inputFoto">
            @error('foto')
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