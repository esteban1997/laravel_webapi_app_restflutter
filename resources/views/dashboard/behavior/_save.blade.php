
    <div class="col-md-5">
        <div class="card">
            <div class="card-header">
                Editar <strong>{{$label}}</strong>
            </div>
            <div class="card-body">
                <form action="{{route('behavior.save',[$type,$widget->id])}}" method="post">
                    @csrf
                    <label for="behavioral_model">Modelo</label>
                    <select name="behavioral_model" id="behavioral_model" class="form-control">
                        <option {{$widget->behavior && $widget->behavior->behavioral_model == "url" ? 'selected="selected"' : ""}} value="url">Url</option>
                        <option {{$widget->behavior && $widget->behavior->behavioral_model == "resource" ? 'selected="selected"' : ""}} value="resource">Recurso</option>
                        <option {{$widget->behavior && $widget->behavior->behavioral_model == "content" ? 'selected="selected"' : ""}} value="content">Contenido</option>
                    </select>

                    <label for="content1"> Contenido 1</label>
                    <input value="{{old('content1',$widget->behavior? $widget->behavior->content1 : '' )}}" type="text" name="content1" class="text form-control">

                    <label for="content2"> Contenido 2</label>
                    <input value="{{old('content2',$widget->behavior? $widget->behavior->content2 : '' )}}" type="text" name="content2" class="text form-control">
                    <button class="btn btn-success mt-2" type="submit">Guardar</button>
                </form>
            </div>
        </div>
    </div>
