@extends('design.layout')

@section('content')

<body class="bg-gray-100 font-sans antialiased">
    <div class="flex h-screen">
        @if (Auth::user()->role == \App\Enums\UserRole::ADMIN->value)
        <x-admin-navbar />
        @elseif(Auth::user()->role == \App\Enums\UserRole::WORKER->value)
        <x-worker-navbar />
        @endif
        <div class="flex flex-col w-1/3 bg-gray-100 border-r border-gray-200">
            <div class="p-4 flex items-center justify-between bg-gray-50 border-b border-gray-200">
                <h1 class="text-lg font-semibold">Chats</h1>
            </div>
            <div class="p-4">
                <input type="text" placeholder="Search or start a new chat"
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
            @if (Auth::user()->role == \App\Enums\UserRole::WORKER->value)
            <div class="p-4">
                <li class="chat-item flex items-center p-4 cursor-pointer hover:bg-gray-200" data-chat="{{ 1 }}">
                    <button
                        class="w-full bg-blue-500 text-white py-2 rounded-lg hover:bg-blue-600 focus:outline-none focus:ring-2 focus:ring-blue-400">Contact
                        Admin</button>
                </li>
            </div>
            @endif
            <ul id="chatList" class="flex-1 overflow-y-auto">
                @foreach ($chatListing as $chat)
                <li class="chat-item flex items-center p-4 cursor-pointer hover:bg-gray-200" @if ($chat->receiver_id ==
                    $myId) data-chat="{{ $chat->user_id }}">
                    @else
                    data-chat="{{ $chat->receiver_id }}">
                    @endif
                    <div class="relative w-10 h-10 mr-4 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <div>
                        @if ($chat->receiver_id == $myId)
                        <h2 class="font-semibold">{{ $chat->user->name }}</h2>
                        @else
                        <h2 class="font-semibold">{{ $chat->receiver->name }}</h2>
                        @endif
                        <p class="text-sm text-gray-600">{{ $chat->content }}</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-500">{{ $chat->created_at->format('H:i') }}</span>
                </li>
                @endforeach
            </ul>
        </div>
        <div id="chatContainer" class="flex-1 bg-gray-50 flex flex-col">
            <div class="p-4 flex items-center justify-between bg-gray-50 border-b border-gray-200">
                <div class="flex items-center">
                    <div class="relative w-10 h-10 mr-4 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
                        <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <h2 id="chatTitle" class="font-semibold">Select a chat</h2>
                </div>
            </div>
            <div id="chatMessages" class="flex-1 p-4 overflow-y-auto">
                <p class="text-center text-gray-500">Select a chat to start messaging</p>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const chatItems = document.querySelectorAll('.chat-item');
            chatItems.forEach(item => {
                item.addEventListener('click', function () {
                    const chatId = item.getAttribute('data-chat');
                    loadChat(chatId);
                });
            });

            document.getElementById('sendMessageButton').addEventListener('click', function () {
                const chatId = document.getElementById('chatTitle').getAttribute('data-chat');
                if (chatId) {
                    sendMessage(chatId);
                }
            });
        });

        function loadChat(chatId) {
            fetch(`/chat/chat-room/${chatId}`)
                .then(response => response.text())
                .then(html => {
                    document.getElementById('chatContainer').innerHTML = html;
                    document.getElementById('chatTitle').setAttribute('data-chat', chatId);
                })
                .catch(error => console.error('Error loading chat room:', error));
        }
    </script>
    @endsection