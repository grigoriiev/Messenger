@extends('layouts.chat')
<h1>Edit Message</h1>
<form action="/messages/{{$message->id}}" method="post">
    @method('patch')

    @include('message.form')

    <button>Edit Message</button>
    @csrf

</form>

