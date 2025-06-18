<?php
define('MESSAGES_FILE', __DIR__ . '/../messages.txt');

function readMessages() {
    if (!file_exists(MESSAGES_FILE)) {
        return [];
    }
    
    $messages = file(MESSAGES_FILE, FILE_IGNORE_NEW_LINES);
    return array_map(function($line) {
        return explode('|', $line, 3);
    }, $messages);
}
?>