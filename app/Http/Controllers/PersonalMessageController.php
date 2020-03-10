<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalMessageController extends Controller
{
       public function create(Message $message){
           $personal=true;
           $this->authorize('edit', $message);
        return view('message.create',compact('message'),compact('personal'));

     }

     public function index(){

       $messages = (new Message)-> personalMessage(Auth::user()->id);
//echo 'hggh';
           return view('message.personal',compact('messages'));
     }
}
