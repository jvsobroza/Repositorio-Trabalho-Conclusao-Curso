@extends('tcc.layout')

@section('content')
<div class="card mt-5">
  <h2 class="card-header">Editar TCC</h2>
  <div class="card-body">

    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('tcc.index') }}"><i class="fa fa-arrow-left"></i> Retornar</a>
    </div>

    <form action="{{ route('tcc.update', $tcc->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="inputTitulo" class="form-label"><strong>Título:</strong></label>
            <input
                type="text"
                name="titulo"
                maxlength="100"
                minlength="10"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('titulo') is-invalid @enderror"
                id="inputTitulo"
                value="{{ $tcc->titulo }}"
                required>
            @error('titulo')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPaginas" class="form-label"><strong>Páginas:</strong></label>
            <input
                type="number"
                name="paginas"
                class="form-control @error('paginas') is-invalid @enderror"
                id="inputPaginas"
                value="{{ $tcc->paginas }}"
                required>
            @error('paginas')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputData" class="form-label"><strong>Data:</strong></label>
            <input
                type="date"
                name="data"
                class="form-control @error('data') is-invalid @enderror"
                id="inputData"
                value="{{ $tcc->data }}"
                required>
            @error('data')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputHora" class="form-label"><strong>Hora:</strong></label>
            <input
                type="time"
                name="hora"
                class="form-control @error('hora') is-invalid @enderror"
                id="inputHora"
                value="{{ $tcc->hora }}"
                required>
            @error('hora')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputAluno" class="form-label"><strong>Aluno:</strong></label>
            <input
                type="text"
                name="aluno"
                maxlength="100"
                minlength="5"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('aluno') is-invalid @enderror"
                id="inputAluno"
                value="{{ $tcc->aluno }}"
                required>
            @error('aluno')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputResumo" class="form-label"><strong>Resumo:</strong></label>
            <textarea
                name="resumo"
                maxlength="200"
                minlength="10"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('resumo') is-invalid @enderror"
                id="inputResumo"
                required>{{ $tcc->resumo }}</textarea>
            @error('resumo')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPalavrasChave" class="form-label"><strong>Palavras-Chave:</strong></label>
            <input
                type="text"
                name="palavras_chave"
                maxlength="200"
                minlength="5"
                oninput="tamanhoMax(this), verificarMin(this)"
                class="form-control @error('palavras_chave') is-invalid @enderror"
                id="inputPalavrasChave"
                value="{{ $tcc->palavras_chave }}"
                required>
            @error('palavras_chave')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputPdf" class="form-label"><strong>PDF:</strong></label>
            @if($tcc->pdf)
                <div class="mb-2">
                    <span class="text-muted">Arquivo atual: </span>
                    <a href="{{ asset('pdfs/' . $tcc->pdf) }}" target="_blank">{{ $tcc->pdf }}</a>
                </div>
            @endif
            <input
                type="file"
                name="pdf"
                accept=".pdf"
                class="form-control @error('pdf') is-invalid @enderror"
                id="inputPdf">
            @error('pdf')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputOrientador" class="form-label"><strong>Orientador:</strong></label>
            <select
                name="orientador"
                id="inputOrientador"
                onchange="atualizarCadeia(0)"
                class="form-select @error('orientador') is-invalid @enderror"
                required>
                <option value="">Selecione um orientador</option>
                @foreach($banca as $ba)
                    <option value="{{ $ba->id }}" {{ $tcc->orientador == $ba->id ? 'selected' : '' }}>
                        {{ $ba->nome }}
                    </option>
                @endforeach
            </select>
            @error('orientador')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputBanca" class="form-label"><strong>Banca 1:</strong></label>
            <select
                name="banca_1"
                id="inputBanca"
                onchange="atualizarCadeia(1)"
                class="form-select @error('banca_1') is-invalid @enderror"
                required>
                <option value="">Selecione uma banca</option>
                @foreach($banca as $ba)
                    <option value="{{ $ba->id }}" {{ $tcc->banca_1 == $ba->id ? 'selected' : '' }}>
                        {{ $ba->nome }}
                    </option>
                @endforeach
            </select>
            @error('banca_1')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="inputBanca2" class="form-label"><strong>Banca 2:</strong></label>
            <select
                name="banca_2"
                id="inputBanca2"
                class="form-select @error('banca_2') is-invalid @enderror"
                required>
                <option value="">Selecione a segunda banca</option>
                @foreach($banca as $ba)
                    <option value="{{ $ba->id }}" {{ $tcc->banca_2 == $ba->id ? 'selected' : '' }}>
                        {{ $ba->nome }}
                    </option>
                @endforeach
            </select>
            @error('banca_2')
                <div class="form-text text-danger">{{ $message }}</div>
            @enderror
        </div>

        <button type="submit" class="btn btn-success"><i class="fa-solid fa-floppy-disk"></i> Salvar</button>
    </form>

  </div>
</div>
@endsection