@extends('dashboard.widgets.master')

@section('content')

@include('dashboard.partials.validator')

<div class="row">
    <div class="col-md-7">
        <div class="card">
            <div class="card-header">
                Actualizar Imagen <strong>{{$image->name}}</strong>
            </div>
            <div class="card-body">
                <form action="{{route('image.update',$image->id)}}" method="post" enctype="multipart/form-data">
                    @method('PATCH')
                    @include('dashboard.widgets.image._form')
                    <button class="btn btn-success mt-2" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
    @include('dashboard.behavior._save',['label'=>$image->label,"widget"=>$image,'type'=>"image"]);
</div>

    @endsection
