<?php
// =============================================
// PORTFOLIO — data.php  (loads shared data from data.json)
// =============================================

$jsonData = json_decode(file_get_contents(__DIR__ . '/data.json'), true) ?: [];

$skills       = $jsonData['skills']       ?? [];
$testimonials = $jsonData['testimonials'] ?? [];
$services     = $jsonData['services']     ?? [];
$hobbies      = $jsonData['hobbies']      ?? [];
$webProjects  = $jsonData['webProjects']  ?? [];
$softProjects = $jsonData['softProjects'] ?? [];
$videos       = $jsonData['videos']       ?? [];
