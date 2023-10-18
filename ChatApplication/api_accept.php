<?php
header("Content-Type:json");
header("Acess-Control-Allow-origon: *");
header("Acess-Control-Allow-Methods:POST");
header("Acess-Control-Allow-Headers:Acess-Control-Allow-Headers ,Content-Type,Acess-Control-Allow-Methods,Authorization , X-Request-With");


$data = json_decode(file_get_contents('php://input'), true);

include_once "php/config.php";

$id = mysqli_real_escape_string($conn, $_POST['id']);
$sql = "UPDATE friends SET status=1 WHERE id='$id' ";

if(mysqli_query($conn,$sql)){
    $errors = array(
        'code'=>'1',
        'Msg' =>'Accepted Your Request' );
                   echo json_encode($errors);
}else{
    $errors = array(
        'code'=>'2',
        'Msg' =>'Accepted Your Request Not' );
                   echo json_encode($errors);
}

