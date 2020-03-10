<div>
    <label for="text">Text</label>
    @if($child ?? ''  )
        <input type="text" name="text" autocomplete="off" value="">
    @else
        <input type="text" name="text" autocomplete="off" value="{{old('text') ?? $message->text}}">
    @endif

    @if($personal ?? '')
        <input name="personal_id" type="hidden" value="{{$message->id}}">

    @else

        <input name="personal_id" type="hidden" value="{{0}}">
    @endif
    <input name="parent_id" type="hidden" value="{{$message->id ?? 0}}">

    @error('text')<p style="color:red;">{{$message}}</p> @enderror
</div>
@csrf
