<?php
header("Content-Type:json");
header("Acess-Control-Allow-origon: *");
header("Acess-Control-Allow-Methods:POST");
header("Acess-Control-Allow-Headers:Acess-Control-Allow-Headers ,Content-Type,Acess-Control-Allow-Methods,Authorization , X-Request-With");


$data = json_decode(file_get_contents('php://input'), true);

include_once "php/config.php";

$incoming_id = mysqli_real_escape_string($conn, $_POST['incoming_msg_id']);
$message = mysqli_real_escape_string($conn, $_POST['msg']);
$outgoing_id = mysqli_real_escape_string($conn, $_POST['outgoing_msg_id']);
$sql = "INSERT INTO messages (incoming_msg_id, outgoing_msg_id, msg)
                                VALUES ({$incoming_id}, {$outgoing_id}, '{$message}')";

if(mysqli_query($conn,$sql)){
    $errors = array(
        'code'=>'1',
        'Msg' =>'New Msg  Send' );
                   echo json_encode($errors);
}else{
    $errors = array(
        'code'=>'2',
        'Msg' =>'New Msg Not Send' );
                   echo json_encode($errors);
}


