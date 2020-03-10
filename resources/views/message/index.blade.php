@extends('layouts.chat')
<ul class="list-unstyled">
<h1  class="mt-0 mb-1" >Message</h1>
<a href="/messages/create">Add New Message</a>
<a href="/messages/personal/show">Personal Message</a>
@forelse($messages as $rootMessage)
    <li class="media">
        <img src="{{URL::asset('storage/download.jpg')}}" class="mr-3"  alt="Avatar">
        <div class="media-body">

        @if  (Auth::user()->id == $rootMessage->user_id)
            <a href="/messages/personal/{{$rootMessage->id}}">{{$rootMessage->user->name}}</a>
            <a href="/messages/{{$rootMessage->id}}">{{$rootMessage->text}}</a>
            <a href="/messages/answer/{{$rootMessage->id}}">Add New Answer</a>
             <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
            @if($rootMessage->Message()->count()>0)
                @include('message.treeChildMessage', ['messages' => $rootMessage->Message])
            @endif
        @else
            <a href="/messages/personal/{{$rootMessage->id}}">{{$rootMessage->user->name}}</a>
            <p class="mt-0 mb-1" >{{$rootMessage->text}}</p>
               <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
            <a href="/messages/answer/{{$rootMessage->id}}">Add New Answer</a>
            @if($rootMessage->Message()->count()>0)
                @include('message.treeChildMessage', ['messages' => $rootMessage->Message])
            @endif
        @endif


        </div>
    </li>

@empty;
    <h1 class="mt-0 mb-1">No message</h1>
@endforelse
</ul>
