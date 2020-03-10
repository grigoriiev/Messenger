<ul class="list-unstyled">
@foreach($messages as $message)
    @if($message->personal_id==0)

        <li class="media">
        <img src="{{URL::asset('storage/download.jpg')}}" class="mr-3" alt="Avatar">
            <div class="media-body">
        @if  (Auth::user()->id == $message->user_id)
            <a href="/messages/personal/{{$message->id}}">{{$message->user->name}}</a>
            <a href="/messages/{{$message->id}}">{{$message->text}}</a>
            <a href="/messages/answer/{{$message->id}}">Add New Answer</a>
                    <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p>
            @if($message->Message->count()>0)
                @include('message.treeChildMessage', ['messages' => $message->Message])
            @endif
        @else
            <a href="/messages/personal/{{$message->id}}">{{$message->user->name}}</a>
            <p  class="mt-0 mb-1" >{{$message->text}}</p>
            <a href="/messages/answer/{{$message->id}}">Add New Answer</a>
                    <p class="mt-0 mb-1">{{$message->created_at}}</p>
            @if($rootMessage->Message()->count()>0)
                @include('message.treeChildMessage', ['messages' => $message->Message])
            @endif

        @endif

  </div>
            </li>
    @endif
@endforeach
</ul>
