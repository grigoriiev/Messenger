<ul class="list-unstyled">
@foreach($messages as $message)
        <li class="media">
        <img src="{{URL::asset('storage/download.jpg')}}" class="mr-3" height="60" width="60" alt="Avatar">
            <div class="media-body">
                @can('edit', $message)
            <a href="/messages/personal/{{$message->id}}/create">{{$message->user->name}}</a><br>
            <a href="/messages/answer/{{$message->id}}">{{$message->text}}</a><br>
            <a href="/messages/answer/{{$message->id}}/create">Add New Answer</a><br>
                    <p class="mt-0 mb-1">{{$rootMessage->created_at}}</p><br>
                @endcan
                @cannot('edit', $message)
            <a href="/messages/personal/{{$message->id}}/create">{{$message->user->name}}</a>
            <p  class="mt-0 mb-1" >{{$message->text}}</p>
            <a href="/messages/answer/{{$message->id}}/create">Add New Answer</a>
                    <p class="mt-0 mb-1">{{$message->created_at}}</p>
                    @endcannot
            @if($rootMessage->Message()->count()>0)
                @include('message.treeChildMessage', ['messages' => $message->Message])
            @endif
            </div>
 </li>
@endforeach
</ul>

