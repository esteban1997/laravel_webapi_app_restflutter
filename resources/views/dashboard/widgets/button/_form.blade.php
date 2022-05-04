@csrf


<label for="color">Color</label>
<input name="color" type="color" class="form-control" id="color" value ="{{old('color',$button->color)}}">

<label for="color_bg">Color Background</label>
<input name="color_bg" type="color" class="form-control" id="color_bg"value ="{{old('color_bg',$button->color_bg)}}">

<label for="label">Label</label>
<input name="label" type="text" class="form-control" id="label" value ="{{old('label',$button->label)}}">

<label for="icon">Icon</label>
<input name="icon" type="text" class="form-control" id="icon" value ="{{old('icon',$button->icon)}}">

<label for="type">Tipo</label>
<select class="form-control" name="type" id="type">
    <option {{$button->type == "flat" ? 'selected="selected"' : ""}}  value="flat">Flat</option>
    <option {{$button->type == "raised" ? 'selected="selected"' : ""}}  value="raised">Raised</option>
</select>

<label for="group_id">Grupo</label>
<select class="form-control" name="group_id" id="group_id">
@foreach ($groups as $name=>$id)
<option {{$button->group_id == $id ? 'selected="selected"' : ""}} value="{{$id}}">{{$name}}</option>
@endforeach
</select>

</label>
