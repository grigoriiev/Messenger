@extends('layouts.chat')
<h1>Create Personal Message</h1>
<form action="/messages/personal" method="post">


    @include('message.personal.form.create')

    <button>Create Personal Message</button>
    @csrf

</form>
