<div>
    <!-- Customer Service Button -->
    <button
        class="fixed z-50 p-4 text-white bg-blue-500 border border-white rounded-full shadow-lg bottom-4 right-4 hover:bg-blue-600"
        onclick="toggleChatModal(true)">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none"
            stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"
            class="lucide lucide-message-circle">
            <path d="M7.9 20A9 9 0 1 0 4 16.1L2 22Z" />
        </svg>
    </button>

    {{-- Chat Modal --}}
    <div id="chat-modal"
        class="fixed bottom-20 right-4 w-80 h-[400px] bg-white border border-gray-300 rounded-lg shadow-lg hidden z-50 flex-col">
        <!-- Chat Header -->
        <div class="flex items-center justify-between p-3 rounded-t-lg bg-gradient-to-r from-blue-500 to-blue-600">
            <span class="font-semibold text-white">Your AI Assistant</span>
            <button class="font-bold text-white hover:text-red-500" onclick="toggleChatModal(false)">
                X
            </button>
        </div>

        <!-- Chat Messages -->
        <div id="chat-messages"
            class="flex-1 p-3 space-y-3 overflow-y-auto bg-gray-50 scrollbar-thin scrollbar-thumb-blue-300">
            <!-- Initial Welcome Message -->
            <div class="flex items-start space-x-2 message bot">
                <img src="img/bot.png" alt="AI" class="w-8 h-8 rounded-full">
                <span class="inline-block p-3 text-sm bg-white shadow-md rounded-lg max-w-[80%]">
                    Hello! I'm your AI assistant. How can I help you today?
                </span>
            </div>
        </div>

        <!-- Typing Indicator -->
        <div id="typing-indicator" class="hidden p-2 bg-gray-100">
            <div class="flex items-center space-x-2">
                <img src="img/bot.png" alt="AI" class="w-6 h-6 rounded-full">
                <div class="flex space-x-1 typing-dots">
                    <div class="w-2 h-2 bg-blue-500 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 delay-100 bg-blue-500 rounded-full animate-bounce"></div>
                    <div class="w-2 h-2 delay-200 bg-blue-500 rounded-full animate-bounce"></div>
                </div>
            </div>
        </div>

        <!-- Chat Input -->
        <div class="p-3 bg-gray-100 border-t border-gray-300">
            <div class="flex space-x-2">
                <input id="chat-input" type="text"
                    class="flex-1 p-2 text-sm border border-gray-300 rounded-lg focus:outline-none focus:ring focus:ring-blue-300"
                    placeholder="Type your message..." onkeyup="handleKeyUp(event)" />
                <button class="p-2 text-white bg-blue-500 rounded-lg hover:bg-blue-600" onclick="sendMessage()">
                    Send
                </button>
            </div>
        </div>
    </div>
    <script src="js/chat.js"></script>
</div>