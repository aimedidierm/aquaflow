<!-- Example show.blade.php -->
@extends('layouts.app')

@section('content')
    <h1>Chat Room {{ $roomId }}</h1>
    <!-- Display messages in this room -->
    <div id="chat-messages">
        <!-- Display messages dynamically using JavaScript or Blade -->
    </div>
    <form action="{{ route('chat.send', ['roomId' => $roomId]) }}" method="POST">
        @csrf
        <input type="text" name="message" placeholder="Type your message">
        <button type="submit">Send</button>
    </form>
@endsection
