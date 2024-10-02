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
            <h4>Férias</h4>
            <a href="#Cadastro" data-bs-toggle="modal" onclick="limpar()"><i class="fa fa-circle-plus"></i></a>
        </div>
        <div class="card-body">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Funcionário</th>
                        <th>Início as Férias</th>
                        <th>Fim das Férias</th>
                        <th>Dias de Férias</th>
                        <th>Aprovado por</th>
                        <th>Estado</th>
                     </tr>
                </thead>
                <tbody>
                    @foreach ($ferias as $fe)
                        <tr>
                            <td>{{$fe->id}}</td>
                            <td>{{$fe->funcionario->nomeCompleto}}</td>
                            <td>{{$fe->data_inicio}}</td>
                            <td>{{$fe->data_fim}}</td>
                            <td>{{$fe->dias_ferias}}</td>
                            <td>{{$fe->aprovado_por}}</td>
                            <td>{{$fe->estado}}</td>
                            <td>
                                @if ($fe->estado == "Pendente")
                                    <a href="{{route('ferias.aprovado', $fe->id)}}" class="text-sucess"><i class="fa fa-check"></i></a>
                                    <a href="{{route('ferias.recusado', $fe->id)}}" class="text-danger"><i class="fa fa-circle-xmark"></i></a>
                                @endif
                                <a href="#Cadastro", data-bs-toggle="modal" onclick="editar({{$fe}})"><i class="fa fa-edit"></i></a>
                                <a href="{{route('ferias.apagar', $fe->id)}}" class="text-danger"><i class="fa fa-trash"></i></a>
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
                        Férias
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
                        <form action="{{route('ferias.store')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="id" id="id">

                            <div class="form-group">
                                <label for="">Funcionário</label>
                                <select name="id_funcionario" id="id_funcionario" class="form-control">
                                    @foreach (App\Models\Funcionario::all() as $fe)
                                        <option value="{{$fe->id}}">{{$fe->nomeCompleto}}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="">Inicio das Férias</label>
                                <input type="date" required name="data_inicio" id="data_inicio" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Fim das Férias</label>
                                <input type="date" min="{{date('Y-m-d')}}" required name="data_fim" id="data_fim" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="">Dias de Férias</label>
                                <input type="integer" required name="dias_ferias" id="dias_ferias" class="form-control">
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
        document.getElementById('data_inicio').value = valor.data_inicio
        document.getElementById('data_fim').value = valor.data_fim
        document.getElementById('dias_ferias').value = valor.dias_ferias
        document.getElementById('aprovado_por').value = valor.aprovado_por
        document.getElementById('estado').value = valor.estado
    }


     function limpar(){
        document.getElementById('id').value = ""
        document.getElementById('data_inicio').value = ""
        document.getElementById('data_fim').value = ""
        document.getElementById('ddias_ferias').value = ""
        document.getElementById('aprovado_por').value = ""
        document.getElementById('estado').value = ""
    }     
</script>
@endsection