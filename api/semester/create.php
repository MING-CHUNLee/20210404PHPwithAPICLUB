<?php
// Headers
        header('Access-Control-Allow-Origin: *');
        header('Content-Type: application/json');
        header('Access-Control-Allow-Methods: POST');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        include_once '../../config/Database.php';
        include_once '../../models/semester.php';
        // Insrantiate DB & connect
        $database = new Database();
        $db = $database->connect();
        //  Insrantiate blog post Object
        $semester = new semester($db);

        // Get raw feedback_typeed data
        $data = json_decode(file_get_contents("php://input"));

        $semester->semester_id = $data->semester_id;
        $semester->semester = $data->semester;

        // create semester
        if ($semester->create()) {
            echo json_encode(
                array('message' => $semester)
            );
        } else {
            echo json_encode(
                array('message' => 'semester not Created')
            );
        }
