<?php
require_once __DIR__ . '/model/writer.php';

header('Content-Type: application/json');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if (isset($data['nickname']) && isset($data['message']) && isset($data['timestamp']) ) {
        writeMessage($data['nickname'], $data['message'], $data['timestamp']);
        echo json_encode(['status' => 'success']);
    } else {
        http_response_code(400);
        echo json_encode(['status' => 'error', 'message' => 'Missing nickname or message']);
    }
} else {
    http_response_code(405);
    echo json_encode(['status' => 'error', 'message' => 'Method not allowed']);
}
?>