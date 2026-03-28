@extends('tcc.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Detalhes do TCC</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('tcc.index') }}"><i class="fa fa-arrow-left"></i>
                    Retornar</a>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Título:</strong> <br />
                        {{ $tcc->titulo }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Páginas:</strong> <br />
                        {{ $tcc->paginas }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
                    <div class="form-group">
                        <strong>Data:</strong> <br />
                        {{ $tcc->data }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Hora:</strong> <br />
                        {{ $tcc->hora }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Aluno:</strong> <br />
                        {{ $tcc->aluno }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Resumo:</strong> <br />
                        {{ $tcc->resumo }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Palavras-Chave:</strong> <br />
                        {{ $tcc->palavras_chave }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Arquivo:</strong> <br />
                        {{ $tcc->pdf }}
                        <a class="btn btn-secondary btn-sm" href="{{ asset('pdfs/' . $tcc->pdf) }}" target="_blank">
                            <i class="fa-solid fa-file-pdf"></i> Visualizar PDF
                        </a>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Orientador:</strong> <br />
                        {{ $tcc->getOrientador->nome }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Membros da banca:</strong> <br />
                        {{ $tcc->banca1->nome . ', ' . $tcc->banca2->nome }}
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection