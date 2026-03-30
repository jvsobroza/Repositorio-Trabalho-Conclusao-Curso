@extends('banca.layout')

@section('content')
    <div class="container mt-5">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
                <h4 class="mb-0"><i class="fa-solid fa-people-group me-2"></i>Detalhes da Banca</h4>
                <a class="btn btn-light btn-sm" href="{{ route('banca.index') }}">
                    <i class="fa fa-arrow-left"></i> Retornar
                </a>
            </div>
            <div class="card-body p-4">

                <div class="row g-3">
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-user text-primary mb-1"></i>
                            <div class="small text-muted">Nome</div>
                            <strong>{{ $banca->nome }}</strong>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="p-3 bg-light rounded text-center">
                            <i class="fa-solid fa-graduation-cap text-primary mb-1"></i>
                            <div class="small text-muted">Titulação</div>
                            <strong>{{ $banca->titulacao }}</strong>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection