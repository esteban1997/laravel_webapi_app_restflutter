@extends('dashboard.widgets.master')

@section('content')

@include('dashboard.partials.validator')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                Actualizar chip <strong>{{$chip->label}}</strong>
            </div>
            <div class="card-body">
                <form action="{{route('chip.update',$chip->id)}}" method="post">
                    @method('PATCH')
                    @include('dashboard.widgets.chip._form')
                    <button class="btn btn-success mt-2" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
@include('dashboard.behavior._save',['label'=>$chip->label,"widget"=>$chip,'type'=>"chip"]);
</div>

@endsection
