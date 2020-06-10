<div>
    <label for="text">Text</label>
    <label>
        <input type="text" name="text" autocomplete="off" value="{{old('text') }}">
    </label>
    <input name="personal_id" type="hidden" value="{{0}}">

    <input name="parent_id" type="hidden" value="{{$message->id}}">

    @error('text')<p style="color:red;">{{$message}}</p> @enderror
</div>
@csrf

