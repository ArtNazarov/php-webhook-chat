<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Simple PHP Chat</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 0 auto; padding: 20px; }
        .messages-container { margin-bottom: 20px; border: 1px solid #ddd; padding: 10px; height: 300px; overflow-y: auto; }
        .message { margin-bottom: 10px; padding-bottom: 10px; border-bottom: 1px solid #eee; }
        .timestamp { color: #666; font-size: 0.8em; margin-right: 10px; }
        .nickname { font-weight: bold; margin-right: 5px; }
        .message-form input, .message-form textarea { width: 100%; margin-bottom: 10px; padding: 8px; }
        .message-form textarea { height: 80px; }
        .message-form button { padding: 10px 15px; background: #007bff; color: white; border: none; cursor: pointer; }
        .message-form button:hover { background: #0056b3; }
    </style>
</head>
<body>
    <h1>Simple PHP Chat</h1>
    
    <?php
    require_once __DIR__ . '/model/reader.php';
    require_once __DIR__ . '/views/messages.php';
    require_once __DIR__ . '/views/addmessage.php';
    ?>
</body>
</html>