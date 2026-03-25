@php
    if (!empty($_GET['matricula'])) {
        require_once(app_path('libs/phpqrcode/qrlib.php'));
        $matricula = trim($_GET['matricula']);
        $arquivo = 'qrcode_' . $matricula . '.png';
        $tmp = public_path('temp/');
        $aluno = trim($_GET['nome']);
        $cpf = trim($_GET['cpf']);
        $email = trim($_GET['email']);
        $telefone = trim($_GET['telefone']);
        $curso = trim($_GET['curso']);
        $conteudo = "Matrícula: $matricula Nome: $aluno CPF: $cpf Email: $email Telefone: $telefone Curso: $curso";
        $tmpDir = $tmp . $arquivo;
        QRcode::png($conteudo, $tmpDir, QR_ECLEVEL_L, 10);

        if (file_exists($tmpDir)) {
            header('Content-Length: ' . filesize($tmpDir));
            header('Content-Encoding: none');
            header("Cache-Control: public");
            header("Content-Description: File Transfer");
            header("Content-Disposition: attachment; filename=$arquivo");
            header("Content-Type: application/zip");
            header("Content-Transfer-Encoding: binary");
            readfile($tmpDir);
            unlink($tmpDir);
            exit;
        }
    }
@endphp


@extends('aluno.layout')

@section('content')
    <div class="card mt-5">
        <h2 class="card-header">Banco e imagens</h2>
        <div class="card-body">

            @session('success')
                <div class="alert alert-success" role="alert"> {{ $value }} </div>
            @endsession

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <a class="btn btn-success btn-sm" href="{{ route('aluno.create') }}"> <i class="fa fa-plus"></i> Inserir
                    novo Aluno</a>
            </div>

            <table class="table table-bordered table-striped mt-4 text-center align-middle">
                <thead>
                    <tr>
                        <th width="80px">cod</th>
                        <th width="120px">Matrícula</th>
                        <th>Nome</th>
                        <th>CPF</th>
                        <th>Email</th>
                        <th>Telefone</th>
                        <th>Curso</th>
                        <th>Foto</th>
                        <th width="250px">Ação</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($alunos as $aluno)
                        <tr>
                            <td>{{ ++$i }}</td>
                            <td>{{ $aluno->matricula }}</td>
                            <td>{{ $aluno->nome }}</td>
                            <td>{{ $aluno->cpf }}</td>
                            <td>{{ $aluno->email }}</td>
                            <td>{{ $aluno->telefone }}</td>
                            <td>{{ $aluno->curso }}</td>
                            <td><img src="/img/{{ $aluno->foto }}" width="200px"></td>
                            <td>
                                <form action="{{ route('aluno.destroy', $aluno->id) }}" method="POST">
                                    <div class="d-flex flex-wrap justify-content-center gap-2">
                                        <a class="btn btn-info btn-sm" href="{{ route('aluno.show', $aluno->id) }}"><i
                                                class="fa-solid fa-list"></i> Visualizar</a>

                                        <a class="btn btn-primary btn-sm" href="{{ route('aluno.edit', $aluno->id) }}"><i
                                                class="fa-solid fa-pen-to-square"></i> Editar</a>

                                        <a class="btn btn-primary btn-sm"
                                            href="?matricula={{ $aluno->matricula }}&nome={{$aluno->nome}}&cpf={{$aluno->cpf}}&email={{$aluno->email}}&telefone={{$aluno->telefone}}&curso={{$aluno->curso}}">
                                            <i class="fa-solid fa-qrcode"></i> QRCODE
                                        </a>

                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa-solid fa-trash"></i>
                                            Excluir</button>
                                    </div>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="10">Dados inexistentes.</td>
                        </tr>
                    @endforelse
                </tbody>

            </table>

            {!! $alunos->withQueryString()->links('pagination::bootstrap-5') !!}

        </div>
    </div>
@endsection