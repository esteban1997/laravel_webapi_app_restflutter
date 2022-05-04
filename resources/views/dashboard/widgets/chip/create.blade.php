@extends('dashboard.widgets.master')

@section('content')

@include('dashboard.partials.validator')

<div class="card">
    <div class="card-header">
        Crear chip
    </div>
    <div class="card-body">
    <form action="{{route('chip.store')}}" method="post">
        @include('dashboard.widgets.chip._form')
        <button class="btn btn-success mt-2" type="submit">Enviar</button>
    </form>
    </div>
</div>

@endsection
