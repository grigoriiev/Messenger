<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessageController extends Controller
{
    public function index(){
        $messages = (new Message)->rootMessages();
        return view('message.index', compact('messages'));
    }
    public function create()
    {
        $message=new Message();

        return view('message.create', compact('message'));
    }
    public function store(){
      $message=  Auth::user()->message()->create($this->validateData());

        return redirect('/messages/'.$message->id);
    }

    public function show(Message $message){


        return view('message.show', compact('message'));


    }

    public function edit(Message $message){
        $this->authorize('edit', $message);

        return view('message.edit', compact('message'));


    }

    public function update(Message $message){
        $this->authorize('update', $message);
        $message->update($this->validateData());
        return redirect('messages');
    }

    public function destroy(Message $message)
    {
        $this->authorize('destroy', $message);
        $message->delete();
        return  redirect('messages');


    }
    protected function validateData(){
        return request()->validate([
            'text'=>'required',
            'parent_id'=>'required',
            'personal_id'=>'required'
        ]);
    }

}
