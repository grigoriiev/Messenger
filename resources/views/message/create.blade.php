@extends('layouts.chat')
<h1>Add New Message</h1>
<form action="/messages" method="post">
    @include('message.form')
<button>Add New Message</button>


</form>
