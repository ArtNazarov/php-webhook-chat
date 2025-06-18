<div class="messages-container" id="messagesContainer">
    <?php
    $messages = readMessages();
    foreach ($messages as $message):
        list($timestamp, $nickname, $text) = $message;
    ?>
        <div class="message">
            <span class="timestamp"><?= htmlspecialchars($timestamp) ?></span>
            <span class="nickname"><?= htmlspecialchars($nickname) ?>:</span>
            <span class="text"><?= htmlspecialchars($text) ?></span>
        </div>
    <?php endforeach; ?>
</div>

<script>
function updateMessages() {
    fetch('/api/getmessages.php')
        .then(response => response.json())
        .then(messages => {
            const container = document.getElementById('messagesContainer');
            container.innerHTML = '';
            
            messages.forEach(message => {
                const messageDiv = document.createElement('div');
                messageDiv.className = 'message';
                messageDiv.innerHTML = `
                    <span class="timestamp">${new Date(parseInt(message[0])).toLocaleString()}</span>
                    <span class="nickname">${message[1]}:</span>
                    <span class="text">${message[2]}</span>
                `;
                container.appendChild(messageDiv);
            });
        });
}

// Update immediately and then every 2 seconds
updateMessages();
setInterval(updateMessages, 2000);
</script>