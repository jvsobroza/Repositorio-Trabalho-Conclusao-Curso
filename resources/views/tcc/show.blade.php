@extends('tcc.layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fa-solid fa-graduation-cap me-2"></i>Detalhes do TCC</h4>
                <a class="btn btn-light btn-sm" href="{{ route('tcc.index') }}">
                    <i class="fa fa-arrow-left"></i> Retornar
                </a>
            </div>
            <div class="card-body p-4">

                {{-- Título e Aluno --}}
                <div class="mb-4">
                    <h5 class="text-primary fw-bold">{{ $tcc->titulo }}</h5>
                    <span class="text-muted">
                        <i class="fa-solid fa-user-graduate me-1"></i>{{ $tcc->aluno }}
                    </span>
                </div>

                <hr>

                {{-- Informações gerais --}}
                <div class="row g-3 mb-4">
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-calendar-day text-primary mb-1"></i>
                            <div class="small text-muted">Data</div>
                            <strong>{{ $tcc->data }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-clock text-primary mb-1"></i>
                            <div class="small text-muted">Hora</div>
                            <strong>{{ $tcc->hora }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-file-lines text-primary mb-1"></i>
                            <div class="small text-muted">Páginas</div>
                            <strong>{{ $tcc->paginas }}</strong>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-file-pdf text-danger mb-1"></i>
                            <div class="small text-muted">Arquivo</div>
                            <a class="btn btn-danger btn-sm mt-1" href="{{ asset('pdfs/' . $tcc->pdf) }}" target="_blank">
                                <i class="fa-solid fa-eye"></i> Visualizar
                            </a>
                        </div>
                    </div>
                </div>

                <hr>

                {{-- Resumo --}}
                <div class="mb-4">
                    <h6 class="text-uppercase text-muted fw-bold mb-2">Resumo</h6>
                    <p>{{ $tcc->resumo }}</p>
                </div>

                {{-- Palavras-chave --}}
                <div class="mb-4">
                    <h6 class="text-uppercase text-muted fw-bold mb-2">Palavras-Chave</h6>
                    @foreach(explode(',', $tcc->palavras_chave) as $palavra)
                        <span class="badge bg-primary me-1">{{ trim($palavra) }}</span>
                    @endforeach
                </div>

                <hr>

                {{-- Banca --}}
                <div class="mb-2">
                    <h6 class="text-uppercase text-muted fw-bold mb-3">Banca Examinadora</h6>
                    <div class="row g-3">
                        <div class="col-md-4">
                            <div class="p-3 border rounded text-center">
                                <i class="fa-solid fa-chalkboard-teacher text-success mb-1"></i>
                                <div class="small text-muted">Orientador</div>
                                <strong>{{ $tcc->getOrientador->nome }}</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded text-center">
                                <i class="fa-solid fa-user-tie text-secondary mb-1"></i>
                                <div class="small text-muted">Membro 1</div>
                                <strong>{{ $tcc->banca1->nome ?? '-' }}</strong>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="p-3 border rounded text-center">
                                <i class="fa-solid fa-user-tie text-secondary mb-1"></i>
                                <div class="small text-muted">Membro 2</div>
                                <strong>{{ $tcc->banca2->nome ?? '-' }}</strong>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection