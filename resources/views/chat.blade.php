
@extends('layouts.app')

@section('content')

<div class="container" id="">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Chats</div>

                <div class="panel-body">
                    <chat-messages :messages="messages"  v-on:messagesent="addMessage"
                    :user="{{ Auth::user() }}"></chat-messages>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
