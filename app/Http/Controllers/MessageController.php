<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

/**
 * Class MessageController
 * @package App\Http\Controllers
 */
class MessageController extends Controller
{


    /**
     * MessageController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index(){
        $messages = (new Message)->rootMessages();
        return view('message.index', compact('messages'));
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        $message=new Message();

        return view('message.create', compact('message'));
    }

    /**
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(){
      $message=  Auth::user()->message()->create($this->validateData());

        return redirect('/messages/'.$message->id)->with('store','Your message has been successfully store');
    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show(Message $message){


        return view('message.show', compact('message'));


    }

    /**
     * @param Message $message
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     * @throws AuthorizationException
     */
    public function edit(Message $message){
        $this->authorize('edit', $message);

        return view('message.edit', compact('message'));


    }

    /**
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws AuthorizationException
     */
    public function update(Message $message){
        $this->authorize('update', $message);
        $this->validateData();
        $message->update(['text'=>request()->text]);
        return redirect('/messages/'.$message->id)->with('update', 'Your message  has been successfully update');
    }

    /**
     * @param Message $message
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     * @throws AuthorizationException
     */
    public function destroy(Message $message)
    {

            $this->authorize('destroy', $message);

        // Getting the parent message
        $parent = Message::findOrFail($message->id);
        // Getting all children ids
        $array_of_ids = $this->getChildren($parent);
        // Appending the parent message id
        array_push($array_of_ids, $message->id);
        // Destroying all of them
        Message::destroy($array_of_ids);

        return  redirect('messages')->with('delete', 'Your message has been successfully delete');


    }

    /**
     * @param $message
     * @return array
     */
    protected  function getChildren($message){
        $ids = [];
        foreach ($message->children as $mes) {
            $ids[] = $mes->id;
            $ids = array_merge($ids, $this->getChildren($mes));
        }
        return $ids;
    }


    /**
     * @return array
     */
    protected function validateData(){
        return request()->validate([
            'text'=>'required',
            'parent_id'=>'required',
            'personal_id'=>'required'
        ]);
    }

}
