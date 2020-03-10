@extends('layouts.chat')
<h1  class="mr-3" >Private Message</h1>
<a href="/messages">Message</a>
<ul class="list-unstyled">
@forelse($messages as $rootMessage)
        <li class="media">
        <img src="{{URL::asset('storage/download.jpg')}}" class="mr-3"  alt="Avatar">
        @if  (Auth::user()->id == $rootMessage->user_id)
            <p  class="mt-0 mb-1" >{{$rootMessage->user->name}}</p>
            <p  class="mt-0 mb-1" >{{$rootMessage->text}}</p>
                <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
        @else
            <a href="/messages/personal/{{$rootMessage->id}}">{{$rootMessage->user->name}}</a>
            <p  class="mt-0 mb-1" >{{$rootMessage->text}}</p>
                <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
        @endif


    </li>

@empty;
<h1 class="mr-3" >No message</h1>
@endforelse
</ul>
