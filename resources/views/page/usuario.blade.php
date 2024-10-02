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

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif


    <div class="card">
        <div class="card-header">
            <h4>Lista de Usuario</h4>
            <a href="#Cadastro" data-bs-toggle="modal" onclick="limpar()"><i class="fa fa-circle-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nome</th>
                        <th>E-mail</th>
                        <th>Tipo De usuario</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $use)
                        <tr>
                            <td>{{$use->id}}</td>
                            <td>{{$use->name}}</td>
                            <td>{{$use->email}}</td>
                            <td>{{$use->tipo}}</td>
                            <td>
                                <a href="#Cadastro", data-bs-toggle="modal" onclick="editar({{$use}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('user.apagar', $use->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
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
                        Modal title
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
                        <form action="{{route('user.store')}}" method="post">
                            @csrf
                            <input type="hidden" name="id" id="id">
                            <div class="form-group">
                                <label for="">Nome</label>
                                <input type="text" required name="name" id="name" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" required name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group">
                                <label for="">Tipo de Usuário</label>
                                <select name="tipo" id="tipo" class="form-control">
                                    <option value="Admin">Admin</option>
                                    <option value="Funcionario">Funcionario</option>
                                </select>
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
                        Close
                    </button>
                    <button type="submit" class="btn btn-primary">Save</button>
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
            document.getElementById('name').value = valor.name
            document.getElementById('email').value = valor.email
            document.getElementById('tipo').value = valor.tipo
            
        }
 
            function limpar(){
            document.getElementById('id').value = ""
            document.getElementById('name').value = ""
            document.getElementById('email').value = ""
            document.getElementById('tipo').value = ""
            
        }
    </script>
@endsection