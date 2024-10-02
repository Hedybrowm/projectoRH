@extends('base.base')
@section('gestao')
    @if($valor >= 7000)
       <h4>{{$valor}}</h4>
    @endif
@endsection