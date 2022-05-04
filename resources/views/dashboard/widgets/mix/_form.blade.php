<form action="{{route('mix.update',$group->id)}}" method="post">
    @method('PATCH')
    @csrf

    @foreach ($mixs as $m)

    <input name="id[]" type="hidden" value="{{$m->id}}">

    <label for="orden">Orden</label>
    <input name="orden[]" type="number" class="form-control" id="orden" value="{{$m->orden}}">

    <label for="Widget">Widget</label>
    <select name="widget[]" id="widget" class="form-control">

        <optgroup label="Botón">
            @foreach ($buttons as $b)
            <option {{$b->id == $m->widget_id && $m->widget =="button" ? "selected" : ""}} value="button_{{$b->id}}">{{$b->label}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Imagenes">
            @foreach ($images as $i)
            <option {{$b->id == $m->widget_id && $m->widget =="image" ? "selected" : ""}} value="image_{{$i->id}}">{{$i->name}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Texto">
            @foreach ($texts as $t)
            <option {{$b->id == $m->widget_id && $m->widget =="text" ? "selected" : ""}} value="text_{{$t->id}}">{{$t->text}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Chip">
            @foreach ($chips as $c)
            <option {{$b->id == $m->widget_id && $m->widget =="chip" ? "selected" : ""}} value="chip_{{$c->id}}">{{$c->label}}</option>
            @endforeach
        </optgroup>

    </select>
    <hr>
    @endforeach

    <button class="btn btn-success mt-2 mb-5" type="submit">Actualizar</button>

</form>

<hr>
<h3>Crear Mix</h3>

<form action="{{route('mix.store',$group->id)}}" method="post">
    @csrf

    <label for="orden">Orden</label>
    <input name="orden" type="number" class="form-control" id="orden">

    <label for="Widget">Widget</label>
    <select name="widget" id="widget" class="form-control">

        <optgroup label="Botón">
            @foreach ($buttons as $b)
            <option value="button_{{$b->id}}">{{$b->label}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Imagenes">
            @foreach ($images as $i)
            <option value="image_{{$i->id}}">{{$i->name}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Texto">
            @foreach ($texts as $t)
            <option value="text_{{$t->id}}">{{$t->text}}</option>
            @endforeach
        </optgroup>

        <optgroup label="Chip">
            @foreach ($chips as $c)
            <option value="chip_{{$c->id}}">{{$c->label}}</option>
            @endforeach
        </optgroup>

    </select>

    <button class="btn btn-success mt-2" type="submit">Crear</button>

</form>
