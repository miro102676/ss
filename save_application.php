<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');
header('Access-Control-Allow-Methods: POST');
header('Access-Control-Allow-Headers: Content-Type');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents('php://input'), true);
    
    if ($data) {
        $filename = 'applications.json';
        $applications = [];
        
        if (file_exists($filename)) {
            $applications = json_decode(file_get_contents($filename), true) ?: [];
        }
        
        $data['id'] = time();
        $data['timestamp'] = date('Y-m-d H:i:s');
        $applications[] = $data;
        
        file_put_contents($filename, json_encode($applications, JSON_PRETTY_PRINT));
        
        echo json_encode(['success' => true, 'message' => 'Application saved']);
    } else {
        echo json_encode(['success' => false, 'message' => 'No data received']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>