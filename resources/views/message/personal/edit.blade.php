@extends('layouts.chat')
<h1>Edit Personal Message</h1>
<form action="/messages/personal/{{$message->id}}" method="post">
    @method('patch')

    @include('message.personal.form.edit')

    <button>Edit Personal Message</button>
    @csrf

</form>


