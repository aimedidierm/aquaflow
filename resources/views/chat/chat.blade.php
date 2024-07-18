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
            <ul id="chatList" class="flex-1 overflow-y-auto">
                <!-- Chat list items -->
                <li class="chat-item flex items-center p-4 cursor-pointer hover:bg-gray-200" data-chat="1">
                    <img src="https://via.placeholder.com/50" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h2 class="font-semibold">Community Project</h2>
                        <p class="text-sm text-gray-600">CODEX: Thanks boss</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-500">8:26 PM</span>
                </li>
                <li class="chat-item flex items-center p-4 cursor-pointer hover:bg-gray-200" data-chat="2">
                    <img src="https://via.placeholder.com/50" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
                    <div>
                        <h2 class="font-semibold">ALUMNI St...</h2>
                        <p class="text-sm text-gray-600">Hhhh: Graduates who has not...</p>
                    </div>
                    <span class="ml-auto text-xs text-gray-500">8:19 PM</span>
                </li>
                <!-- Add more chat items here -->
            </ul>
        </div>
        <div id="chatContainer" class="flex-1 bg-gray-50 flex flex-col">
            <div class="p-4 flex items-center justify-between bg-gray-50 border-b border-gray-200">
                <div class="flex items-center">
                    <img src="https://via.placeholder.com/50" alt="Avatar" class="w-12 h-12 rounded-full mr-4">
                    <h2 id="chatTitle" class="font-semibold">Select a chat</h2>
                </div>
            </div>
            <div id="chatMessages" class="flex-1 p-4 overflow-y-auto">
                <!-- Chat messages will be loaded here -->
                <p class="text-center text-gray-500">Select a chat to start messaging</p>
            </div>
            <div class="p-4 border-t border-gray-200">
                <input id="messageInput" type="text" placeholder="Type a message"
                    class="w-full p-2 border border-gray-300 rounded-lg">
            </div>
        </div>
        <script>
            document.querySelectorAll('.chat-item').forEach(item => {
            item.addEventListener('click', function () {
                const chatId = this.getAttribute('data-chat');
                loadChat(chatId);
            });
        });

        function loadChat(chatId) {
            const chatTitle = {
                1: 'Community Project',
                2: 'RP_IPRC HUYE ALUMNI St...'
            };

            const chatMessages = {
                1: [
                    { time: '11:36 AM', sender: 'them', message: 'Merci' },
                    { time: '3:13 AM', sender: 'me', message: 'De rien' },
                    { time: '7:11 AM', sender: 'me', message: 'uyu munsi uraza kuona time ryari tuvugane??' },
                    { time: '7:11 AM', sender: 'them', message: 'Ntakibazo' },
                    { time: '6:23 PM', sender: 'them', message: 'Hi' },
                    { time: '6:23 PM', sender: 'me', message: 'Nka 19h hari ikibazo ??' },
                    { time: '6:25 PM', sender: 'them', message: 'Nta cyibazo kbs' }
                ],
                2: [
                    { time: '8:06 PM', sender: 'me', message: 'Nguhe link cg urayimpa??' }
                ]
            };

            document.getElementById('chatTitle').textContent = chatTitle[chatId];
            const messagesContainer = document.getElementById('chatMessages');
            messagesContainer.innerHTML = '';

            chatMessages[chatId].forEach(msg => {
                const messageEl = document.createElement('div');
                messageEl.className = `my-2 p-2 rounded-lg ${msg.sender === 'me' ? 'bg-green-100 self-end' : 'bg-gray-100 self-start'}`;
                messageEl.innerHTML = `
                    <p class="text-sm text-gray-600">${msg.time}</p>
                    <p>${msg.message}</p>
                `;
                messagesContainer.appendChild(messageEl);
            });

            const inputEl = document.getElementById('messageInput');
            inputEl.addEventListener('keypress', function (e) {
                if (e.key === 'Enter') {
                    const newMessage = {
                        time: new Date().toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }),
                        sender: 'me',
                        message: inputEl.value
                    };
                    chatMessages[chatId].push(newMessage);
                    inputEl.value = '';
                    loadChat(chatId);
                }
            });
        }

        document.getElementById('closeModalBtn').addEventListener('click', function () {
            document.getElementById('groupMembersModal').classList.add('hidden');
        });
        </script>
        @stop