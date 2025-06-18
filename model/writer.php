<?php
define('MAX_MESSAGES', 10);
define('MESSAGES_FILE', __DIR__ . '/../messages.txt');

function writeMessage($nickname, $message, $timestamp) {
    // Читаем существующие сообщения
    $messages = [];
    if (file_exists(MESSAGES_FILE)) {
        $lines = file(MESSAGES_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        foreach ($lines as $line) {
            $parts = explode('|', $line, 3);
            if (count($parts) === 3) {
                $messages[] = [
                    'timestamp' => (int)$parts[0],
                    'nickname' => $parts[1],
                    'message' => $parts[2]
                ];
            }
        }
    }

    // Добавляем новое сообщение в конец массива
    $messages[] = [
        'timestamp' => (int)$timestamp,
        'nickname' => $nickname,
        'message' => $message
    ];

    // Сортируем сообщения по timestamp от старого к новому
    usort($messages, function($a, $b) {
        return $a['timestamp'] <=> $b['timestamp'];
    });

    // Ограничиваем количество сообщений
    if (count($messages) > MAX_MESSAGES) {
        $messages = array_slice($messages, -MAX_MESSAGES);
    }

    // Формируем строки для записи в файл
    $lines = [];
    foreach ($messages as $msg) {
        $lines[] = "{$msg['timestamp']}|{$msg['nickname']}|{$msg['message']}";
    }

    // Сохраняем в файл
    file_put_contents(MESSAGES_FILE, implode(PHP_EOL, $lines));
}
?>
