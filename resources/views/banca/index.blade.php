@extends('banca.layout')
@section('content')

    <div class="page-content">
        <!-- Header -->
        <div class="mb-4">
            <h1 class="display-5 fw-bold text-dark">
                <i class="fas fa-users text-primary me-3"></i>Gestão de Banca e Professores
            </h1>
            <p class="text-secondary lead">Gerencie os professores e membros da banca avaliadora</p>
        </div>

        <!-- Alert Success -->
        @session('success')
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <i class="fas fa-check-circle me-2"></i>
                <strong>Sucesso!</strong> {{ $value }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endsession

        <!-- Action Buttons -->
        <div class="d-flex flex-wrap justify-content-between align-items-center gap-2 mb-4">
            <a class="btn btn-outline-primary" href="{{ route('tcc.index') }}">
                <i class="fas fa-arrow-left me-2"></i>Voltar para TCCs
            </a>
            <a class="btn btn-success btn-lg" href="{{ route('banca.create') }}">
                <i class="fas fa-plus me-2"></i>Adicionar Nova Banca/Professor
            </a>
        </div>

        <!-- Table Card -->
        <div class="card shadow-lg">
            <div class="card-header d-flex justify-content-between align-items-center">
                <span><i class="fas fa-list me-2"></i>Lista de Bancas e Professores</span>
                <span class="badge bg-primary rounded-pill">{{ count($banca) }} registros</span>
            </div>
            <div class="card-body p-0">
                @forelse ($banca as $ba)
                    @if ($loop->first)
                        <div class="table-responsive">
                            <table class="table table-hover mb-0">
                                <thead>
                                    <tr>
                                        <th class="text-center" width="80px">#</th>
                                        <th><i class="fas fa-user me-2"></i>Nome</th>
                                        <th><i class="fas fa-graduation-cap me-2"></i>Titulação</th>
                                        <th class="text-center" width="350px"><i class="fas fa-cog me-2"></i>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                    @endif

                    <tr class="align-middle">
                        <td class="text-center fw-bold text-primary">{{ ++$i }}</td>
                        <td>
                            <div class="d-flex align-items-center">
                                <div class="avatar rounded-circle bg-primary text-white d-flex align-items-center justify-content-center me-3" style="width: 40px; height: 40px;">
                                    <i class="fas fa-user-tie"></i>
                                </div>
                                <div>
                                    <p class="mb-0 fw-500">{{ $ba->nome }}</p>
                                </div>
                            </div>
                        </td>
                        <td>
                            <span class="badge bg-info text-dark">{{ $ba->titulacao }}</span>
                        </td>
                        <td>
                            <form action="{{ route('banca.destroy', $ba->id) }}" method="POST" class="d-inline">
                                <div class="d-flex flex-wrap justify-content-center gap-2">
                                    <a class="btn btn-sm btn-outline-info" href="{{ route('banca.show', $ba->id) }}" title="Visualizar">
                                        <i class="fas fa-eye"></i>
                                    </a>

                                    <a class="btn btn-sm btn-outline-primary" href="{{ route('banca.edit', $ba->id) }}" title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>

                                    @csrf
                                    @method('DELETE')

                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Excluir" onclick="return confirm('Tem certeza que deseja excluir este registro?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </div>
                            </form>
                        </td>
                    </tr>

                    @if ($loop->last)
                                </tbody>
                            </table>
                        </div>
                    @endif
                @empty
                    <div class="text-center py-5">
                        <i class="fas fa-inbox text-secondary" style="font-size: 3rem;"></i>
                        <p class="text-secondary mt-3">
                            <strong>Nenhum registro encontrado</strong><br>
                            <small>Comece adicionando uma nova banca/professor</small>
                        </p>
                    </div>
                @endforelse
            </div>

            <!-- Pagination -->
            @if ($banca->hasPages())
                <div class="card-footer bg-light">
                    <div class="d-flex justify-content-center">
                        {{ $banca->withQueryString()->links('pagination::bootstrap-5') }}
                    </div>
                </div>
            @endif
        </div>
    </div>

@endsection