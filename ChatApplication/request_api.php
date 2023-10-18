<?php
header("Content-Type:json");
header("Acess-Control-Allow-origon: *");
header("Acess-Control-Allow-Methods:POST");
header("Acess-Control-Allow-Headers:Acess-Control-Allow-Headers ,Content-Type,Acess-Control-Allow-Methods,Authorization , X-Request-With");


$data = json_decode(file_get_contents('php://input'), true);

include_once "php/config.php";
    
$friend_form = mysqli_real_escape_string($conn, $_POST['friend_form']);
$friend_to = mysqli_real_escape_string($conn, $_POST['friend_to']);

$query ="SELECT * FROM friends WHERE friend_form = '$friend_form' AND  friend_to = '$friend_to'";
        // print_r ($query);die;

$result  = mysqli_query($conn,$query);

    if(mysqli_num_rows($result) > 0){
        // die('12');
        $errors = array(
            'Msg' =>'Already Friend Request Send' );
                    echo json_encode($errors);
    }else{
        // die('13');

        $sql = "INSERT INTO friends (friend_form, friend_to , status)
        VALUES ({$friend_form}, {$friend_to}, 0)";
        
        if(mysqli_query($conn,$sql)){
            $errors = array(
                'code'=>'1',
                'Msg' =>'New Friend Request Send' );
                            echo json_encode($errors);
        }else{
            $errors = array(
                'code'=>'2',
                'Msg' =>'New Friend Request Not Send' );
                            echo json_encode($errors);
        }   
    }

// $query = "SELECT friend_form,friend_to FROM friends WHERE (friends.friend_form = '".$friend_form."') GROUP BY  friend_to";

// $query = "SELECT DISTINCT friend_form FROM friends WHERE (friends.friend_form = '".$friend_form."')";
// $res = mysqli_query($conn,$sql);
// print_r ($query);
// mysqli_close($conn);die;


// $query ="SELECT DISTINCT friend_form,friend_to FROM friends 
//         INNER JOIN users 
//         ON friends.friend_form = users.user_id  
//         OR friends.friend_to = users.user_id 
//         WHERE (friends.friend_form = '".$friend_form."')";

