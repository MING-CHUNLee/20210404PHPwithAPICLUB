<?php
        header('Access-Control-Allow-Origin: *');
        header('Content-Type:application/json');
        header('Access-Control-Allow-Methods: DELETE');
        header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Methods, Authorization, X-Requested-With');
        include_once '../../config/Database.php';
        include_once '../../models/club.php';
        // Insrantiate DB & connect
        $database =new Database();
        $db=$database->connect();
        //  Insrantiate blog post Object
        $post=new club_info($db);
        // Get raw posted data
        $data =json_decode(file_get_contents("php://input"));
        // Set id to update
        $post-> club_name =$data ->club_name;
        // DELETE post
        if($post->delete()){
            echo json_encode(
                array('message' => 'delete Post ')
            );
        }
        else
        {
            echo json_encode(
                array('message' => 'Post not delete')
            );
        }


?>

