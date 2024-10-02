
@extends('base.base')

@section('titulo')
    Pagina Inicial
@endsection

@section('gestao')
    @if($nome >= 50)
    @foreach ([1,2,3,4,5,6,7] as $lista)
            <h4>{{$lista}} - {{$nome}}</h4>
    @endforeach
     
    @endif
@endsection