@extends('dashboard.widgets.master')

@section('content')

@include('dashboard.partials.validator')

        <div class="card">
            <div class="card-header">
                Actualizar Texto <strong>{{$text->label}}</strong>
            </div>
            <div class="card-body">
                <form action="{{route('text.update',$text->id)}}" method="post">
                    @method('PATCH')
                    @include('dashboard.widgets.text._form')
                    <button class="btn btn-success mt-2" type="submit">Actualizar</button>
                </form>
            </div>
        </div>

@endsection
