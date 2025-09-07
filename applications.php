<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $filename = 'applications.json';
    
    if (file_exists($filename)) {
        unlink($filename);
        echo json_encode(['success' => true, 'message' => 'Applications cleared']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No applications file found']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>