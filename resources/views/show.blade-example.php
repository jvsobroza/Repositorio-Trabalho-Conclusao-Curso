@extends('aluno.layout')
   
@section('content')
<div class="card mt-5">
  <h2 class="card-header">Alunos</h2>
  <div class="card-body">
 
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <a class="btn btn-primary btn-sm" href="{{ route('aluno.index') }}"><i class="fa fa-arrow-left"></i> Retornar</a>
    </div>
 
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Matrícula:</strong> <br/>
                {{ $aluno->matricula }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Nome:</strong> <br/>
                {{ $aluno->nome }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 mt-2">
            <div class="form-group">
                <strong>CPF:</strong> <br/>
                {{ $aluno->cpf }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Email:</strong> <br/>
                {{ $aluno->email }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Telefone:</strong> <br/>
                {{ $aluno->telefone }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Curso:</strong> <br/>
                {{ $aluno->curso }}
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Foto:</strong><br/>
                <img src="/img/{{ $aluno->foto }}" width="200px">
            </div>
        </div>
    </div>
 
  </div>
</div>
@endsection
