<?php
include 'validation.php';
include 'conectbd.php';

$email = $_POST['login_email'];
$password = $_POST['login_psw'];

if(!empty($_POST["login_email"]) && !empty($_POST["login_psw"])){

    $isNotError = true;
    if(!validEmail($email)){
        $isNotError = false;
    }
    if(!validPassword($password)){
        $isNotError = false;
    }

    if($isNotError){
        $conbd = connect();
        $checkEmail = "SELECT email, psw FROM users WHERE email='$email' AND psw='$password'";  
        $result = mysqli_query($conbd, $checkEmail);
        
        if($result -> num_rows == 1){
            echo json_encode(array('statusCode' => 200));

        } else {
            echo json_encode(array('statusCode' => 201));
        }
    } else {
        echo json_encode(array('statusCode' => 201));
    }
}

?>
