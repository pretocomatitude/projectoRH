@extends('base.base')

@section('gestao')

@if(Session::has('Sucesso'))
<div class="alert alert-success">
    <p>{{ Session::get('Sucesso') }}</p>
</div>
@endif

@if(Session::has('Error'))
<div class="alert alert-danger">
    <p>{{ Session::get('Error') }}</p>
</div>
@endif

<div class="card">
    <div class="card-header">
        <h4>Lista de Recrutamentos</h4>
        <a href="#Cadastro" data-bs-toggle="modal"><i class="fa fa-circle-plus"></i></a>
    </div>
    <div class="card-body">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Nome</th>
                    <th>Categoria</th>
                    <th>Data de Nascimento</th>
                    <th>Telefone</th>
                    <th>Nº BI</th>
                    <th>Email</th>
                    <th>Gênero</th>
                    <th>#</th>
                </tr>
            </thead>
            <tbody>
                @foreach($recrutamentos as $recrutamento)
                <tr>
                    <td>{{ $recrutamento->nome }}</td>
                    <td>{{ $recrutamento->categoria }}</td>
                    <td>{{ $recrutamento->datanascimento }}</td>
                    <td>{{ $recrutamento->telefone }}</td>
                    <td>{{ $recrutamento->nbi }}</td>
                    <td>{{ $recrutamento->email }}</td>
                    <td>{{ $recrutamento->genero }}</td>
                    <td>
                        <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{ $recrutamento }})"><i class="fa fa-edit"></i></a>
                        <a href="{{ route('recrutamento.apagar', $recrutamento->id) }}"><i class="text-danger fa fa-trash"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="Cadastro" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Cadastro de Recrutamento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form action="{{ route('recrutamento.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" id="id">
                    <div class="form-group">
                        <label for="nome">Nome</label>
                        <input type="text" name="nome" id="nome" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="categoria">Categoria</label>
                        <input type="text" name="categoria" id="categoria" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="datanascimento">Data de Nascimento</label>
                        <input type="date" name="datanascimento" id="datanascimento" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="telefone">Telefone</label>
                        <input type="text" name="telefone" id="telefone" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="nbi">Nº BI</label>
                        <input type="text" name="nbi" id="nbi" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" name="email" id="email" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <label for="genero">Gênero</label>
                        <select name="genero" id="genero" class="form-control" required>
                            <option value="Masculino">Masculino</option>
                            <option value="Feminino">Feminino</option>
                        </select>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    function editar(recrutamento) {
        document.getElementById('id').value = recrutamento.id;
        document.getElementById('nome').value = recrutamento.nome;
        document.getElementById('categoria').value = recrutamento.categoria;
        document.getElementById('datanascimento').value = recrutamento.datanascimento;
        document.getElementById('telefone').value = recrutamento.telefone;
        document.getElementById('nbi').value = recrutamento.nbi;
        document.getElementById('email').value = recrutamento.email;
        document.getElementById('genero').value = recrutamento.genero;
    }
</script>

@endsection