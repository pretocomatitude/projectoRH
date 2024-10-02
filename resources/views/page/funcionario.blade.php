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
    <h4>Lista de Funcionario</h4>
    <a href="#Cadastro" data-bs-toggle="modal"><i class ="fa fa-circle-plus"></i></a>
</div>
<div class="card-body">
    <table class="table table-striped">
        <thead>
            <tr>
            <th>Imagem</th>
            <th>Nº Agente</th>
            <th>Nome Completo</th>
            <th>Email</th>
            <th>Categoria</th>
            <th>Cargo</th>
            <th>Tipo de Usuario</th>
            <th>#</th>
        </tr>
        <thead>
            <tbody>
                @foreach ($funcionario as $func)
                <tr>
                    <td><img src="{{asset('img/carregadas/'.$func->imagem)}}" style="width: 100px" alt=""></td>
                    <td>{{$func->nAgente}}</td>
                    <td>{{$func->nomeCompleto}}</td>
                    <td>{{$func->user->email}}</td>
                    <td>{{$func->categoria}}</td>
                    <td>{{$func->cargo}}</td>
                    <td>{{$func->user->name}}</td>
                    <td>
                        <a href="#Cadastro" data-bs-toggle="modal" onclick="editar({{$func}})"><i class="fa fa-edit"></a></a>
                        <a href="{{route('funcionario.apagar', $func->id)}}"><i class="text-danger"><i class="fa fa-trash"></a></a>
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
                    <form action="{{route('funcionario.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="id" id="id">
                        <div class='form-group'>
                            <label for="">Imagem</label>
                            <input type="file" name='imagem' id='imagem' class="form-control">
                            </div> 

                        <div class='form-group'>
                            <label for="">Nome Completo</label>
                            <input type="text" required name='nomeCompleto' id='nomeCompleto' class="form-control">
                            </div> 
                           
                        <div class='form-group'>
                            <label for="">Numero de Agente</label>
                            <input type="text" required name='nAgente' id='nAgente' class="form-control">
                            </div> 
                            <div class='form-group'>
                                <label for="">Cargo</label>
                                <input type="text" required name='cargo' id='cargo' class="form-control">
                                </div> 
                                <div class='form-group'>
                                    <label for="">Categoria</label>
                                    <input type="text" required name='categoria' id='categoria' class="form-control">
                                    </div> 
                                <div class='form-group'>
                                    <label for="">Email</label>
                                    <input type="text" name='email' id='email' class="form-control">
                                </div>
                            <!-- <div class='form-group'>
                                <label for="">Password</label>
                            <input type="text" name='password' id='password' class="form-control">     
                            </div>-->
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
        document.getElementById('id').value = valor.id 
        document.getElementById('nomeCompleto').value = valor.nomeCompleto
        document.getElementById('email').value = valor.email
        document.getElementById('cargo').value = valor.cargo
        document.getElementById('categoria').value = valor.categoria
        document.getElementById('nAgente').value = valor.nagente
    }
    function limpar (){
        document.getElementById('id').value = "" 
        document.getElementById('nomeCompleto').value = ""
        document.getElementById('email').value = ""
        document.getElementById('cargo').value = ""
        document.getElementById('categoria').value = ""
        document.getElementById('nAgente').value = ""
    }
  </script>  
@endsection