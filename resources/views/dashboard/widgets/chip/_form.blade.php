@csrf


<label for="color">Color</label>
<input name="color" type="color" class="form-control" id="color" value ="{{old('color',$chip->color)}}">

<label for="color_bg">Color Background</label>
<input name="color_bg" type="color" class="form-control" id="color_bg"value ="{{old('color_bg',$chip->color_bg)}}">

<label for="label">Label</label>
<input name="label" type="text" class="form-control" id="label" value ="{{old('label',$chip->label)}}">

<label for="icon">Icon</label>
<input name="icon" type="text" class="form-control" id="icon" value ="{{old('icon',$chip->icon)}}">

<label for="group_id">Grupo</label>
<select class="form-control" name="group_id" id="group_id">
@foreach ($groups as $name=>$id)
<option {{$chip->group_id == $id ? 'selected="selected"' : ""}} value="{{$id}}">{{$name}}</option>
@endforeach
</select>

</label>
