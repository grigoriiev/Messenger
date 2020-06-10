@extends('layouts.chat')
<h1>Personal Message Detail</h1>
<div>
    <a href="/messages">Messages</a><br>
    <a href="/messages/personal">Personal Messages</a><br>
    <a href="/messages/personal/written">Personal Written Messages</a>
</div>
@if(session('store'))
    <div class="alert alert-success">
        {{ session('store') }}
    </div>
@endif
@if(session('update'))
    <div class="alert alert-success">
        {{ session('update') }}
    </div>
@endif
<strong>Message ID</strong>
<p>{{$message->id}}</p>
<strong>Message Text</strong>
<p>{{$message->text}}</p>
<strong>Message Athor Name</strong>
<p>{{Auth::user()->name}}</p>
<div>
    <a href="/messages/personal/{{$message->id}}/edit">Edit</a>
    <form action="/messages/personal/{{$message->id}}" method="post">
        @method('DELETE')
        @csrf
        <button>Delete</button>
    </form>
</div>
