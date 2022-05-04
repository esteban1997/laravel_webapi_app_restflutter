@extends('dashboard.widgets.master')

@section('content')
@include('dashboard.partials.validator')

<a class="mt-3 mb-2 btn btn-primary" href="{{route('image.create')}}">Crear</a>

<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Texto</th>
            <th >Acciones</th>
        </tr>
    </thead>
    <tbody>
            @foreach ($images as $i)
            <tr>
            <td>{{$i->id}}</td>
            <td>{{$i->url}}</td>
            <td><a class="btn btn-success" href="{{route('image.edit',$i->id)}}">
                <i class="fa fa-edit"></i></a>
                <a class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" href="#" data-id="{{$i->id}}" data-name="{{$i->name}}">
                    <i class="fa fa-trash"></i></a></td>
        </tr>
            @endforeach
    </tbody>
</table>

{{$images->links()}}

{{--  {{$buttons->links('pagination::bootstrap-5')}}  --}}

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Eliminar registro</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          Estas seguro de eliminar el registro?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>

          <form id="formDelete" action="{{route('image.destroy',0)}}" data-action="{{route('image.destroy',0)}}" method="post">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger" type="submit">Eliminar</button>
        </form>

        </div>
      </div>
    </div>
  </div>

  <script>
        var deleteModal = document.getElementById('deleteModal')
        deleteModal.addEventListener('show.bs.modal', function (event) {
        // Button that triggered the modal
        var button = event.relatedTarget
        // Extract info from data-bs-* attributes
        var id = button.getAttribute('data-id')
        var name = button.getAttribute('data-name')
        // If necessary, you could initiate an AJAX request here
        // and then do the updating in a callback.
        //
        // Update the modal's content.
        var modalTitle = deleteModal.querySelector('.modal-title')

        modalTitle.textContent = 'Borrar: ' + name


        var formDelete = document.getElementById('formDelete')
        action = formDelete.getAttribute("data-action").slice(0,-1)
        formDelete.setAttribute("action",action+id)
        })
  </script>

@endsection
