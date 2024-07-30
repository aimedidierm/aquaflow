<div class="p-4 flex items-center justify-between bg-gray-50 border-b border-gray-200">
    <div class="flex items-center">
        <div class="relative w-10 h-10 overflow-hidden bg-gray-100 rounded-full dark:bg-gray-600">
            <svg class="absolute w-12 h-12 text-gray-400 -left-1" fill="currentColor" viewBox="0 0 20 20"
                xmlns="http://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
                </path>
            </svg>
        </div>
        <h2 id="chatTitle" class="font-semibold" data-chat="">{{ $name }}</h2>
    </div>
</div>
<div id="chatMessages" class="flex-1 p-4 overflow-y-auto">
    @if ($messages->isEmpty())
    <p class="text-center text-gray-500">No messages available.</p>
    @else
    @foreach ($messages as $msg)
    <div
        class="my-2 p-2 rounded-lg {{ $msg->user_id === Auth::id() ? 'bg-green-100 self-end' : 'bg-gray-100 self-start' }}">
        <p class="text-sm text-gray-600">{{ $msg->created_at->format('H:i') }}</p>
        <p>{{ $msg->content }}</p>
    </div>
    @endforeach
    @endif
</div>
<div class="p-4 border-t border-gray-200">
    <form action="{{ route('chat.sendMessage', $chat) }}" method="POST">
        @csrf
        <div class="flex mt-2">
            <input type="text" name="message" class="flex-1 p-2 border rounded" placeholder="Type your message...">
            <button type="submit" class="ml-2 p-2 bg-blue-500 text-white rounded">Send</button>
        </div>
    </form>
</div>