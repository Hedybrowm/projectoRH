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
                        <th>Número BI</th>
                        <th>Genero</th>
                        <th>Data Nascimento</th>
                        <th>Categoria</th>
                        <th>Vaga</th>
                        <th>Telefone</th>
                        <th>E-mail</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach ($recrutamentos as $recrut)
                        <tr>
                            <td>{{$recrut->id}}</td>
                            <td>{{$recrut->nbi}}</td>
                            <td>{{$recrut->genero}}</td>
                            <td>{{$recrut->datanascimento}}</td>
                            <td>{{$recrut->categoria}}</td>
                            <td>{{$recrut->vaga}}</td>
                            <td>{{$recrut->telefone}}</td>
                            <td>{{$recrut->email}}</td>
                            <td>
                                <a href="#Cadastro", data-bs-toggle="modal" onclick="editar({{$recrut}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('recrutamentos.apagar', $recrut->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
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
                        Recrutamento
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
                        <form action="{{route('recrutamentos.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">

                          
                            <div class="form-group">
                                <label for="">Número BI</label>
                                <input type="text" required name="nbi" id="nbi" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Genero</label>
                                <select name="genero" id="genero" class="form-control">
                                    <option value="Masculino">Masculino</option>
                                    <option value="Feminino">Feminino</option>
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Data de Nascimento</label>
                                <input type="date" required name="datanascimento" id="datanascimento" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Categoria</label>
                                <input type="text" required name="categoria" id="categoria" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Vaga</label>
                                <input type="text" required name="vaga" id="vaga" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Telefone</label>
                                <input type="text" required name="telefone" id="telefone" class="form-control">
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
        document.getElementById('nbi').value = valor.nbi
        document.getElementById('genero').value = valor.genero
        document.getElementById('datanascimento').value = valor.datanascimento
        document.getElementById('categoria').value = valor.categoria
        document.getElementById('vaga').value = valor.vaga
        document.getElementById('telefone').value = valor.telefone
        document.getElementById('email').value = valor.email
    }


     function limpar(){
        document.getElementById('id').value = ""
        document.getElementById('nbi').value = ""
        document.getElementById('genero').value = ""
        document.getElementById('datanascimento').value = ""
        document.getElementById('categoria').value = ""
        document.getElementById('vaga').value = ""
        document.getElementById('telefone').value = ""
        document.getElementById('email').value = ""
    }     
</script>
@endsection