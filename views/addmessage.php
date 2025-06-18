<div class="message-form">
    <form id="chatForm">
        <input type="text" id="nickname" placeholder="Your nickname" required>
        <textarea id="message" placeholder="Your message" required></textarea>
        <button type="submit">Send</button>
    </form>
</div>

<script>
document.getElementById('chatForm').addEventListener('submit', function(e) {
    console.log('clicked!');
    e.preventDefault();
    
    const nickname = document.getElementById('nickname').value;
    const message = document.getElementById('message').value;
    const timestamp = Date.now();
    
    fetch('/webhookapi.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ nickname, message, timestamp })
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'success') {
            // Add the new message to the UI immediately
            console.log('Add message to the UI');
            const container = document.getElementById('messagesContainer');
            const messageDiv = document.createElement('div');
            messageDiv.className = 'message';
            messageDiv.innerHTML = `
                <span class="timestamp">${new Date().toLocaleString()}</span>
                <span class="nickname">${nickname}:</span>
                <span class="text">${message}</span>
            `;
            container.appendChild(messageDiv);
            
            // Clear the message input
            document.getElementById('message').value = '';
        }
    })
    .catch(error => console.error('Error:', error));
});
</script>