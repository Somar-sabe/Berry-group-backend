<?php

class ApiController
{
    public function fetchData($host, $database, $username, $password, $query)
    {
        $db = new Database();
        
        // You should sanitize and validate user input before using it in a query
        $query = htmlentities($query);
        
        try {
            $result = $db->query($query);
            $data = $result->fetchAll(PDO::FETCH_ASSOC);

            // You might want to handle errors and return appropriate responses
            echo json_encode(['status' => 'success', 'data' => $data]);
        } catch (PDOException $e) {
            echo json_encode(['status' => 'error', 'message' => 'Error executing the query']);
        }
    }
}
