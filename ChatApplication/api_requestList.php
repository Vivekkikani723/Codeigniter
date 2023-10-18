<?php
header("Content-Type:json");
header("Acess-Control-Allow-origon: *");
header("Acess-Control-Allow-Methods:POST");
header("Acess-Control-Allow-Headers:Acess-Control-Allow-Headers ,Content-Type,Acess-Control-Allow-Methods,Authorization , X-Request-With");


$data = json_decode(file_get_contents('php://input'), true);

include_once "php/config.php";
    
$user_id = mysqli_real_escape_string($conn, $_POST['user_id']);

$query="SELECT * FROM users";

$result = $conn->query($query);
if ($result) {
    header("Content-Type:json");
   $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
     $user_id = $row['user_id'];
     if($user_id == 0){
     $response[$i]['user_id'] = $row['user_id'];
     $response[$i]['friend_form'] = $row['friend_form'];
     $response[$i]['friend_to'] = $row['friend_to'];
     $response[$i]['status'] = $row['status'];
     $response[$i]['created_at'] = $row['created_at'];
     $i++;
     }
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
  } else {
    echo "0 results";
  }
