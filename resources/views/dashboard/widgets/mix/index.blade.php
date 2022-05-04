@extends('dashboard.widgets.master')

@section('content')
@include('dashboard.partials.validator')

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Nombre</th>
            <th >Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($groups as $g)
            <tr>
            <td>{{$g->id}}</td>
            <td>{{$g->name}}</td>
            <td><a class="btn btn-success" href="{{route('mix.edit',$g->id)}}">
                <i class="fa fa-edit"></i>
            </a>
        </tr>
            @endforeach
    </tbody>
</table>

{{$groups->links()}}

{{--  {{$buttons->links('pagination::bootstrap-5')}}  --}}


@endsection
