@extends('layouts.chat')
<h1>Add New Answer Message</h1>
<form action="/messages/answer" method="post">
    @include('message.answer.form.create')
    <button>Add New Answer Message</button>
</form>

