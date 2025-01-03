const chatModal = document.getElementById('chat-modal');
const messagesContainer = document.getElementById('chat-messages');
const typingIndicator = document.getElementById('typing-indicator');

function toggleChatModal(show) {
    const modal = document.getElementById('chat-modal');
    if (show) {
        modal.classList.remove('hidden');
        modal.classList.add('flex');
    } else {
        modal.classList.add('hidden');
        modal.classList.remove('flex');
    }
}

function animateTyping(message, callback) {
    const messageDiv = document.createElement('div');
    messageDiv.className = 'flex items-start space-x-2 message bot';
    
    const avatarImg = document.createElement('img');
    avatarImg.src = 'img/bot.png';
    avatarImg.alt = 'AI';
    avatarImg.className = 'w-8 h-8 rounded-full';
    
    const messageSpan = document.createElement('span');
    messageSpan.className = 'inline-block p-3 text-sm bg-white shadow-md rounded-lg max-w-[80%]';
    
    messageDiv.appendChild(avatarImg);
    messageDiv.appendChild(messageSpan);
    
    messagesContainer.appendChild(messageDiv);
    
    let index = 0;
    const typingSpeed = 30; // Kecepatan typing (ms)
    
    function typeNextCharacter() {
        if (index < message.length) {
            messageSpan.textContent += message[index];
            index++;
            setTimeout(typeNextCharacter, typingSpeed);
        } else if (callback) {
            callback();
        }
    }
    
    typeNextCharacter();
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function showTypingIndicator() {
    typingIndicator.classList.remove('hidden');
    messagesContainer.appendChild(typingIndicator);
    messagesContainer.scrollTop = messagesContainer.scrollHeight;
}

function hideTypingIndicator() {
    typingIndicator.classList.add('hidden');
}

function handleKeyUp(event) {
    if (event.key === 'Enter') {
        sendMessage();
    }
}

async function sendMessage() {
    const input = document.getElementById('chat-input');
    const userMessage = input.value.trim();

    if (!userMessage) return;

    // Menambahkan pesan user di sebelah kanan
    const userMessageDiv = document.createElement('div');
    userMessageDiv.className = 'flex justify-end message user';
    userMessageDiv.innerHTML = `
        <span class="inline-block p-3 text-sm text-white bg-blue-500 rounded-lg max-w-[80%]">
            ${userMessage}
        </span>
    `;
    messagesContainer.appendChild(userMessageDiv);
    input.value = '';

    // Scroll ke bawah
    messagesContainer.scrollTop = messagesContainer.scrollHeight;

    // Tampilkan indikator typing
    showTypingIndicator();

    try {
        // Simulasi delay untuk efek typing
        await new Promise(resolve => setTimeout(resolve, 1000));

        // Ganti dengan endpoint API Anda
        const response = await axios.post('/chat', { message: userMessage });
        const botMessage = response.data.choices[0].message.content;

        // Sembunyikan indikator typing
        hideTypingIndicator();

        // Animasi typing untuk pesan bot
        animateTyping(botMessage);
    } catch (error) {
        // Sembunyikan indikator typing
        hideTypingIndicator();

        // Tambahkan pesan error
        animateTyping('Maaf, terjadi kesalahan dalam merespon.');
    }
}