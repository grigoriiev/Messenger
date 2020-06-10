@extends('layouts.chat')
<h1  class="mr-3" >Write Private Message</h1>
<div>
    <a href="/messages">Messages</a><br>
    <a href="/messages/personal">Personal Messages</a><br>
    <a href="/messages/personal/written">Personal Written Messages</a>
</div>
<ul class="list-unstyled">
    @forelse($messages as $rootMessage)
        <li class="media">
            <img src="{{URL::asset('storage/download.jpg')}}"  class="mr-3" height="60" width="60"  alt="Avatar">
            <div class="media-body">
            <a href="/messages/personal/{{$rootMessage->id}}/create">{{$rootMessage->user->name}}</a><br>
            <a href="/messages/personal/{{$rootMessage->id}}">{{$rootMessage->text}}</a><br>
            <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
                </div>
        </li>
    @empty
        <h1 class="mr-3" >No message</h1>
    @endforelse
    {{ $messages->links() }}
</ul>


