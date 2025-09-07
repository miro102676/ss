<?php
header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

$filename = 'applications.json';

if (file_exists($filename)) {
    $applications = json_decode(file_get_contents($filename), true) ?: [];
    echo json_encode($applications);
} else {
    echo json_encode([]);
}
?>