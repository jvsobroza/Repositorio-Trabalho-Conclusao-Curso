@extends('banca.layout')

@section('content')
    <div class="page-content">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="display-5 fw-bold text-dark">
                <i class="fas fa-user-tie text-primary me-3"></i>Detalhes da Banca
            </h1>
            <p class="text-secondary lead">Informações do professor/membro avaliador</p>
        </div>

        <!-- Back Button -->
        <div class="mb-3">
            <a class="btn btn-outline-primary" href="{{ route('banca.index') }}">
                <i class="fas fa-arrow-left me-2"></i>Voltar à Lista
            </a>
        </div>

        <!-- Details Card -->
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-address-card me-2"></i>Informações Completas</span>
                <div>
                    <a class="btn btn-sm btn-outline-primary me-2" href="{{ route('banca.edit', $banca->id) }}">
                        <i class="fas fa-edit me-1"></i>Editar
                    </a>
                    <form action="{{ route('banca.destroy', $banca->id) }}" method="POST" style="display:inline;">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                            <i class="fas fa-trash me-1"></i>Excluir
                        </button>
                    </form>
                </div>
            </div>
            <div class="card-body">
                <div class="row g-4">
                    <div class="col-md-6">
                        <div class="info-box bg-light p-4 rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-user-tie fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Nome</small>
                                    <strong class="fs-6">{{ $banca->nome }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="info-box bg-light p-4 rounded">
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded-circle bg-info text-white d-flex align-items-center justify-content-center me-3" style="width: 50px; height: 50px;">
                                    <i class="fas fa-graduation-cap fa-lg"></i>
                                </div>
                                <div>
                                    <small class="text-muted d-block">Titulação</small>
                                    <strong class="fs-6">{{ $banca->titulacao }}</strong>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <hr class="my-4">

                <div class="row mt-3">
                    <div class="col-12">
                        <small class="text-muted">
                            <i class="fas fa-clock me-1"></i>
                            Registrado em: {{ $banca->created_at->format('d/m/Y H:i') }}
                        </small>
                    </div>
                    @if($banca->updated_at != $banca->created_at)
                        <div class="col-12">
                            <small class="text-muted">
                                <i class="fas fa-sync me-1"></i>
                                Última atualização: {{ $banca->updated_at->format('d/m/Y H:i') }}
                            </small>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection