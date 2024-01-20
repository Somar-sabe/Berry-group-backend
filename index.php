<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    header('Content-Type: application/json');

    // Retrieve data from the POST request
    $postData = json_decode(file_get_contents('php://input'), true);

    $mysqlHost = $postData['host'] ?? '';
    $mysqlDatabase = $postData['database'] ?? '';
    $mysqlUsername = $postData['username'] ?? '';
    $mysqlPassword = $postData['password'] ?? '';
    $mysqlQuery = $postData['query'] ?? '';

    require 'controllers/ApiController.php';
    $apiController = new ApiController();
    $apiController->fetchData($mysqlHost, $mysqlDatabase, $mysqlUsername, $mysqlPassword, $mysqlQuery);
}
