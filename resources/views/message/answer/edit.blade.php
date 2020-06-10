@extends('layouts.chat')
<h1>Edit Answer Message</h1>
<form action="/messages/answer/{{$message->id}}" method="post">
    @method('patch')

    @include('message.answer.form.edit')

    <button>Edit Answer Message</button>
    @csrf

</form>
