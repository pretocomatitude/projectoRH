@extends('base.base')
@section('gestao')
@if(Session::has('Sucesso'))
<div class="alert alert-sucesso">
    <p>{{Session::get('Sucesso')}}</p>
</div>
@endif
@if(Session::has('Error'))
<div class="alert alert-danger">
    <p>{{Session::get('Error')}}</p>
</div>
@endif
<div class="Card">
<div class="card-header">
    <h4>Lista de Feria</h4>
    <a href="#Cadastro" data-bs-toggle="modal"><i class ="fa fa-circle-plus"></i></a>
</div>
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Funcionario</th>
            <th>Data de Inicio</th>
            <th>Data de Fim</th>
            <th>Aprovado Por</th>
            <th>Estado</th>
            </tr>
        <thead>
            <tbody>
                @foreach ($feria as $feria)
                <tr>
                    <td>{{$feria->funcionario->nome}}</td>
                    <td>{{$feria->data_inicio}}</td>
                    <td>{{$feria->data_fim}}</td>
                    <td>{{$feria->aprovado_por}}</td>
                    <td>{{$feria->estado}}</td>
                    <td>
                        @if($feria->estado == "Pendente")
                        <a href="{{route('feria.aprovado', $feria->id)}}" class="text-sucess" class="fa fa-check"></a></a>
                        <a href="{{route('feria.recusar', $feria->id)}}"><i class="text-danger"><i class="fa fa-circle-xmark"></a></a>
                        @endif
                        <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{$func}})"><i class="fa fa-edit"></a></a>
                        <a href="{{route('feria.apagar', $func->id)}}"><i class="text-danger"><i class="fa fa-trash"></a></a>
                    </td>
                </tr>
                @endforeach
            </tbody>

</div>

</div>
  <!-- Button trigger modal -->
  
  
  <!-- Modal -->
  <div
    class="modal fade"
    id="Cadastro"
    tabindex="-1"
    role="dialog"
    aria-labelledby="modalTitleId"
    aria-hidden="true"
  >
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">
                    Modal title
                </h5>
                <button
                    type="button"
                    class="btn-close"
                    data-bs-dismiss="modal"
                    aria-label="Close"
                ></button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <form action="{{route('feria.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class='form-group'>
                            <label for="">Funcionario</label>
                            <select name="funcionario_id" id="funcionario_id" class="form-control">
                                @foreach (App\Models\Funcionario::all() as $func)
                                <option value="{{$func->id}}">{{$func->nomeCompleto}}</option>
                                @endforeach
                        
                            </div> 

                        <div class='form-group'>
                            <label for="">Data de Inicio</label>
                            <input type="date" required name='data_inicio' id='data_inicio' class="form-control">
                            </div> 
                           
                        <div class='form-group'>
                            <label for="">Data de Fim</label>
                            <input type="date" required name='data_fim' id='data_fim' class="form-control">
                            </div> 
                            
                        </div>
                        <div class="modal-footer">
                            <button
                                type="button"
                                class="btn btn-secondary"
                                data-bs-dismiss="modal"
                            >
                                Close
                            </button>
                            <button type="submit" class="btn btn-primary">Save</button>
                        </div>
                 </div>
                 </div>

              
                </div>
            </div>
            
        </form>
        </div>
    </div>
  </div>
  
  <script>
    var modalId = document.getElementById('modalId');
  
    modalId.addEventListener('show.bs.modal', function (event) {
          // Button that triggered the modal
          let button = event.relatedTarget;
          // Extract info from data-bs-* attributes
          let recipient = button.getAttribute('data-bs-whatever');
  
        // Use above variables to manipulate the DOM
    });
  </script>
  <script>
    function editar(valor){
        document.getElementById('funcionario_id').value = valor.funcionario_id 
        document.getElementById('datainicio').value = valor.datainicio
        document.getElementById('datafim').value = valor.datafim
        document.getElementById('aprovadopor').value = valor.aprovadopor
        document.getElementById('estado').value = valor.estado
    }
    function limpar (){
        document.getElementById('funcionario_id').value = "" 
        document.getElementById('datainicio').value = ""
        document.getElementById('datafim').value = ""
        document.getElementById('aprovadopor').value = ""
        document.getElementById('estado').value = ""
    }s
  </script>  
@endsection