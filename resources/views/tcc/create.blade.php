@extends('tcc.layout')
 
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Adicionar novo TCC</h2>
  <div class="card-body">
 
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tcc.index') }}"><i class="fa fa-arrow-left"></i> Retornar</a>
    </div>
 
    <form action="{{ route('tcc.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-1">
            <label for="inputTitulo" class="form-label"><strong>Título:</strong></label>
            <input
                type="text"
                oninput="tamanhoMax(this), verificarMin(this)"
                maxlength="100"
                minlength="10"
                name="titulo"
                class="form-control @error('titulo') is-invalid @enderror"
                id="inputTitulo"
                required
                placeholder="Sistema de Gerenciamento de TCCs para Faculdade XYZ">
            @error('titulo')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputPaginas" class="form-label"><strong>Páginas:</strong></label>
            <input
                type="number"
                name="paginas"
                oninput="tamanhoMax(this), verificarMin(this)"
                minlength="2"
                maxlength="100"
                class="form-control @error('paginas') is-invalid @enderror"
                id="inputPaginas"
                required
                placeholder="10">
            @error('paginas')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputData" class="form-label"><strong>Data:</strong></label>
            <input
                type="date"
                name="data"
                class="form-control @error('data') is-invalid @enderror"
                id="inputData"
                required>
            @error('data')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputHora" class="form-label"><strong>Hora:</strong></label>
            <input
                type="time"
                name="hora"
                class="form-control @error('hora') is-invalid @enderror"
                id="inputHora"
                required>
            @error('hora')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputAluno" class="form-label"><strong>Aluno:</strong></label>
            <input
                type="text"
                name="aluno"
                maxlength="100"
                minlength="5"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('aluno') is-invalid @enderror"
                id="inputAluno"
                required
                placeholder="Alarico da Silva">
            @error('aluno')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputResumo" class="form-label"><strong>Resumo:</strong></label>
            <textarea
                name="resumo"
                maxlength="200"
                minlength="10"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('resumo') is-invalid @enderror"
                id="inputResumo"
                required
                placeholder="Resumo do TCC"></textarea>
            @error('resumo')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputPalavrasChave" class="form-label"><strong>Palavras-Chave:</strong></label>
            <input
                type="text"
                name="palavras_chave"
                maxlength="200"
                minlength="5"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('palavras_chave') is-invalid @enderror"
                id="inputPalavrasChave"
                required
                placeholder="Tecnologia, Educação, Inovação">
            @error('palavras_chave')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-1">
            <label for="inputPdf" class="form-label"><strong>PDF:</strong></label>
            <input
                type="file"
                name="pdf"
                class="form-control @error('pdf') is-invalid @enderror"
                id="inputPdf"
                required
                placeholder="Caminho para o arquivo PDF">
            @error('pdf')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <!-- https://www.youtube.com/watch?v=mhZAuaBZ_cA pesquisar por que não funciona
                             onchange="liberarProximo(this, 'inputBanca')"
-->
        <div class="mb-1">
            <label for="inputOrientador" class="form-label"><strong>Orientador:</strong></label>
                <select
                    name="orientador" 
                    id="inputOrientador" 
                    class="form-select @error('orientador') is-invalid @enderror" 
                    required>
                    <option value="">Selecione um orientador</option>
                    @foreach($banca as $ba)
                        <option value="{{ $ba->id }}">
                            {{ $ba->nome }}
                        </option>
                    @endforeach
                </select>
            @error('banca_id')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>        
        <!-- banca http://sitepoint.com/community/t/generate-html-so-that-second-dropdown-can-be-based-on-selected-value-of-first-dropdown/367771 
         onchange="liberarProximo(this, 'inputBanca2')"-->
        <div class="mb-1">
            <label for="inputBanca" class="form-label"><strong>Banca 1:</strong></label>
                <select 
                    name="banca_1" 
                    id="inputBanca" 
                    class="form-select @error('banca_1') is-invalid @enderror" 
                    required>
                    <option value="">Selecione uma banca</option>
                    @foreach($banca as $ba)
                        <option value="{{ $ba->id }}">
                            {{ $ba->nome }}
                        </option>
                    @endforeach
                </select>
            @error('banca_1')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>   
        <div class="mb-1">
            <label for="inputBanca2" class="form-label"><strong>Banca 2:</strong></label>
                <select 
                    name="banca_2" 
                    id="inputBanca2" 
                    class="form-select @error('banca_2') is-invalid @enderror" 
                    required>
                    <option value="">Selecione a segunda banca</option>
                    @foreach($banca as $ba)
                        <option value="{{ $ba->id }}">
                            {{ $ba->nome }}
                        </option>
                    @endforeach
                </select>
            @error('banca_2')
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
    
     /*function liberarProximo(atual, idProximo) {
            var proximo = document.getElementById(idProximo);
            var itemRemovido = document.createElement("option");
            itemRemovido.value = atual.value;
            itemRemovido.text = atual.text;
            if (atual.value !== "") {
                proximo.disabled = false;
                proximo.remove(atual.selectedIndex); 
            } else {
                proximo.disabled = true;
                proximo.add(itemRemovido);
                proximo.value = "";
            }
        }*/
</script>