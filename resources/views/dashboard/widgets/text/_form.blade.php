@csrf


<label for="color">Texto</label>
<textarea name="text" type="color" class="form-control" cols="30" rows="10" id="text" >{{old('color',$text->text)}}
</textarea>
<label for="group_id">Grupo</label>
<select class="form-control" name="group_id" id="group_id">
@foreach ($groups as $name=>$id)
<option {{$text->group_id == $id ? 'selected="selected"' : ""}} value="{{$id}}">{{$name}}</option>
@endforeach
</select>

</label>
