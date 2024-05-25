@extends('layout.app')

@section('content')
        {!! csrf_field() !!}
        @include('usuario.form_usuario')
@endsection


