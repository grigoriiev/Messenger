@extends('layouts.chat')
<ul class="list-unstyled">
<h1  class="mt-0 mb-1" >Message</h1>

<a href="/messages">Messages</a><br>
    <a href="/messages/create">CreateMessage</a><br>
<a href="/messages/personal">Personal Messages</a><br>
 <a href="/messages/personal/written">Personal Written Messages</a>
    @if(session('delete'))
        <div class="alert alert-success">
            {{ session('delete') }}
        </div>
    @endif
@forelse($messages as $rootMessage)
    <li class="media">
        <img src="{{URL::asset('storage/download.jpg')}}" class="mr-3" height="60" width="60"  alt="Avatar">
        <div class="media-body">
            @can('edit', $rootMessage)
                <a href="/messages/personal/{{$rootMessage->id}}/create">{{$rootMessage->user->name}}</a><br>
                <a class="mt-0 mb-1" href="/messages/{{$rootMessage->id}}">{{$rootMessage->text}}</a><br>
                <a href="/messages/answer/{{$rootMessage->id}}/create">Add New Answer</a><br>
                <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
            @endcan
            @cannot('edit', $rootMessage)
                <a href="/messages/personal/{{$rootMessage->id}}/create">{{$rootMessage->user->name}}</a>
                <p class="mt-0 mb-1" >{{$rootMessage->text}}</p>
                <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
                <a href="/messages/answer/{{$rootMessage->id}}/create">Add New Answer</a>
            @endcannot
    @if($rootMessage->Message()->count()>0)
        @include('message.treeChildMessage', ['messages' => $rootMessage->Message])
    @endif
        </div>
    </li>
@empty;
    <h1 class="mt-0 mb-1">No message</h1>
@endforelse
    {{ $messages->links() }}
</ul>
