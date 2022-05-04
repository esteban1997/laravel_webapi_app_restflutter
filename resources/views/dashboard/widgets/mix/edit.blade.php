@extends('dashboard.widgets.master')

@section('content')

@include('dashboard.partials.validator')

<div class="card">
    <div class="card-header">
        Gestionar<strong>{{$group->name}}</strong>
    </div>
    <div class="card-body">
        @include('dashboard.widgets.mix._form')
    </div>
</div>

@endsection
