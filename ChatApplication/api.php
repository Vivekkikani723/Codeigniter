<?php
include_once "php/config.php";
$query="SELECT * FROM messages";
$result = $conn->query($query);
if ($result) {
    header("Content-Type:json");
   $i = 0;
    while($row = mysqli_fetch_assoc($result)) {
     $response[$i]['id'] = $row['msg_id'];
     $response[$i]['incoming_msg_id'] = $row['incoming_msg_id'];
     $response[$i]['outgoing_msg_id'] = $row['outgoing_msg_id'];
     $response[$i]['msg'] = $row['msg'];
     $response[$i]['created_at'] = $row['created_at'];
     $i++;
    }
    echo json_encode($response,JSON_PRETTY_PRINT);
  } else {
    echo "0 results";
  }
