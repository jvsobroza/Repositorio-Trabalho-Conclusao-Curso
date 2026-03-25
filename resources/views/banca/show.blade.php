@extends('banca.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Banca</h2>
        <div class="card-body">

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-primary btn-sm" href="{{ route('banca.index') }}"><i class="fa fa-arrow-left"></i>
                    Retornar</a>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Nome:</strong> <br />
                        {{ $banca->nome }}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Titulação:</strong> <br />
                        {{ $banca->titulacao }}
                    </div>
                </div>

            </div>

        </div>
    </div>
@endsection