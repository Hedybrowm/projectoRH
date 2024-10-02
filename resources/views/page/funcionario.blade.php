@extends('base.base')
@section('gestao')

@if (session('successo'))
    <div class="alert alert-success">
        {{ session('successo') }}
    </div>
@endif


@if (session('error'))
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif

    <div class="card">
        <div class="card-header">
            <h4>Lista de Usuário</h4>
            <a href="#Cadastro" data-bs-toggle="modal" onclick="limpar()"><i class="fa fa-circle-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Imagem</th>
                        <th>Nº de Agente</th>
                        <th>Nome Completo</th>
                        <th>Cargo</th>
                        <th>Categoria</th>
                        <th>Nome de Usuário</th>
                        <th>E-mail</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($funcionario as $func)
                        <tr>
                            <td>{{$func->id}}</td>
                            <td><img src="{{asset('img/carregadas/'.$func->imagem)}}" style="width: 50px" alt=""></td>
                            <td>{{$func->nAgente}}</td>
                            <td>{{$func->nomeCompleto}}</td>
                            <td>{{$func->cargo}}</td>
                            <td>{{$func->categoria}}</td>
                            <td>{{$func->user->name}}</td>
                            <td>{{$func->user->email}}</td>
                            <td>
                                <a href="#Cadastro", data-bs-toggle="modal" onclick="editar({{$func}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('funcionario.apagar', $func->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
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
            <div class="modal-content ">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTitleId">
                        Cadastrar Funcionário
                    </h5>
                    <button
                        type="button"
                        class="btn-close"
                        data-bs-dismiss="modal"
                        aria-label="Close"
                    ></button>
                </div>
                    <!-- Criação do formulário de cadastro-->
                <div class="modal-body">
                    <div class="container-fluid">
                        <form action="{{route('funcionario.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="">Imagem</label>
                                <input type="file" required name="imagem" id="imagem" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Nº de Agente</label>
                                <input type="text" required name="nAgente" id="nAgente" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Nome Completo</label>
                                <input type="text" required name="nomeCompleto" id="nomeCompleto" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Cargo</label>
                                <input type="text" required name="cargo" id="cargo" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Categoria</label>
                                <input type="text" required name="categoria" id="categoria" class="form-control">
                            </div>
                      
                            <div class="form-group">
                                <label for="">E-mail</label>
                                <input type="email" required name="email" id="email" class="form-control">
                            </div>         
                    </div>
                </div>

                 <!--Botão de cadastro-->
                <div class="modal-footer">
                    <button
                        type="button"
                        class="btn btn-secondary"
                        data-bs-dismiss="modal"
                    >
                        Fechar
                    </button>
                    <button type="submit" class="btn btn-primary">Gravar</button>
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
        
<!--Criamos função de edição e limpar dados-->
  <script>
        function editar(valor){
            document.getElementById('id').value = valor.id
            document.getElementById('nAgente').value = valor.nAgente
            document.getElementById('nomeCompleto').value = valor.nomeCompleto
            document.getElementById('cargo').value = valor.cargo
            document.getElementById('categoria').value = valor.categoria
            document.getElementById('email').value = valor.user.email
        }
 

         function limpar(){
            document.getElementById('id').value = ""
            document.getElementById('nAgente').value = ""
            document.getElementById('nomeCompleto').value = ""
            document.getElementById('cargo').value = ""
            document.getElementById('categoria').value = ""
            document.getElementById('email').value = ""
        }     
    </script>
@endsection