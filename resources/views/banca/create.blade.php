@extends('banca.layout')
 
@section('content')
<div class="page-content">
    <!-- Header -->
    <div class="mb-4">
        <h1 class="display-5 fw-bold text-dark">
            <i class="fas fa-user-plus text-primary me-3"></i>Adicionar Professor/Banca
        </h1>
        <p class="text-secondary lead">Preencha os dados do novo membro da banca</p>
    </div>

    <!-- Back Button -->
    <div class="mb-3">
        <a class="btn btn-outline-primary" href="{{ route('banca.index') }}">
            <i class="fas fa-arrow-left me-2"></i>Voltar à Lista
        </a>
    </div>

    <!-- Form Card -->
    <div class="card shadow-lg">
        <div class="card-header">
            <i class="fas fa-form me-2"></i>Dados do Professor/Banca
        </div>
        <div class="card-body">
            <form action="{{ route('banca.store') }}" method="POST" enctype="multipart/form-data" class="needs-validation">
                @csrf

                <div class="mb-4">
                    <label for="inputNome" class="form-label">
                        <strong><i class="fas fa-user me-2 text-primary"></i>Nome Completo</strong>
                    </label>
                    <input
                        type="text"
                        maxlength="100"
                        minlength="10"
                        name="nome"
                        class="form-control form-control-lg @error('nome') is-invalid @enderror"
                        id="inputNome"
                        required
                        placeholder="Ex: Daniel Alarico da Silva"
                        oninput="tamanhoMax(this); verificarMin(this)">
                    <small class="form-text text-muted">Mínimo de 10 caracteres, máximo de 100</small>
                    @error('nome')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-4">
                    <label for="inputTitulacao" class="form-label">
                        <strong><i class="fas fa-graduation-cap me-2 text-primary"></i>Titulação</strong>
                    </label>
                    <input
                        type="text"
                        name="titulacao"
                        maxlength="50"
                        minlength="5"
                        class="form-control form-control-lg @error('titulacao') is-invalid @enderror"
                        id="inputTitulacao"
                        required
                        placeholder="Ex: Mestrado em Engenharia de Software"
                        oninput="tamanhoMax(this); verificarMin(this)">
                    <small class="form-text text-muted">Mínimo de 5 caracteres, máximo de 50</small>
                    @error('titulacao')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>

                <div class="d-flex gap-2 mt-4">
                    <button type="submit" class="btn btn-success btn-lg">
                        <i class="fas fa-check-circle me-2"></i>Cadastrar
                    </button>
                    <a href="{{ route('banca.index') }}" class="btn btn-outline-secondary btn-lg">
                        <i class="fas fa-times me-2"></i>Cancelar
                    </a>
                </div>
            </form>
        </div>
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