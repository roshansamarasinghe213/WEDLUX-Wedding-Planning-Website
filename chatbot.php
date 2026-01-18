<?php

include('config.php');  // to connect with database


// if user sends a message then get it
if( isset($_GET['message']) ){

    $message = $_GET['message'];

    $stmt = $conn->prepare("SELECT bot_responce FROM bot_massages WHERE bot_Utext = ? LIMIT 1");
    $stmt->bind_param("s",$message);


    //execute query
    if($stmt->execute()){
        $stmt->bind_result($response_message);
        $stmt->store_result();

        if($stmt->num_rows() == 1){

            $stmt->fetch();
            $result = ['response_message' => $response_message];
            echo json_encode($result);

            }else{
            echo json_encode(['response_message' => 'What...!']);

            }

        }else{

        echo json_encode(['response_message' => 'What...!']);

        }
}?>