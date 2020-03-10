<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class ChildMessageController extends Controller
{
    public function create(Message $message){
        $child=true;
        $this->authorize('edit', $message);
       return view('message.create',compact('message'),compact('child'));


    }
}
