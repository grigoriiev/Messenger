@extends('layouts.chat')
<h1>Message Detail</h1>
<div>
    <a href="/messages">Show Message</a>
</div>
<strong>Message ID</strong>
<p>{{$message->id}}</p>
<strong>Message Text</strong>
<p>{{$message->text}}</p>
<strong>Message Athor Name</strong>
<p>{{Auth::user()->name}}</p>
<div>
    <a href="/messages/{{$message->id}}/edit">Edit</a>
    <form action="/messages/{{$message->id}}" method="post">
        @method('DELETE')
        @csrf
        <button>Delete</button>
    </form>
</div>
