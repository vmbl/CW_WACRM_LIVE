import Echo from 'laravel-echo';
import './bootstrap';

const userId = document.querySelector('meta[name="user-id"]').getAttribute('content');

// IMPORTANT: tell Echo to use Reverb WebSocket without Pusher
window.Echo = new Echo({
    broadcaster: 'reverb',
    key: import.meta.env.VITE_REVERB_APP_KEY,
    wsHost: window.location.hostname,
    wsPort: 8080,
    wssPort: 8080,
    forceTLS: false,
    enabledTransports: ['ws'],
    disableStats: true
});

window.Echo.private(`chat.${userId}`)
    .listen('.message.sent', (e) => {
        const chatBox = document.getElementById('chat-box');
        chatBox.innerHTML += `<p><strong>Them:</strong> ${e.message.message}</p>`;
    });

document.getElementById('chat-form').addEventListener('submit', function (e) {
    e.preventDefault();

    const message = document.getElementById('message').value;
    const receiverId = document.getElementById('receiver_id').value;

    fetch('/chat/message', {
        method: 'POST',
        headers: {
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
            'Content-Type': 'application/json'
        },
        body: JSON.stringify({ message, receiver_id: receiverId })
    }).then(() => {
        document.getElementById('message').value = '';
        document.getElementById('chat-box').innerHTML += `<p><strong>Me:</strong> ${message}</p>`;
    });
});
