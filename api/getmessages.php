<?php
require_once __DIR__ . '/../model/reader.php';
header('Content-Type: application/json');

echo json_encode(readMessages());
?>