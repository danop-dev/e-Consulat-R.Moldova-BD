<?php
include 'validation.php';
include 'conectbd.php';

$fname = $_POST['reg_fname'];
$lname = $_POST['reg_lname'];
$email = $_POST['reg_email'];
$password = $_POST['reg_psw'];
$passwordCheck = $_POST['reg_pswCheck'];


if(!empty($_POST["reg_email"]) && !empty($_POST["reg_fname"]) && !empty($_POST["reg_lname"]) && !empty($_POST["reg_psw"]) && !empty($_POST["reg_pswCheck"])){
    
    $isNotError = true;
    if(!(validName($fname) && validName($lname))){
        $isNotError = false;
    }
    if(!validEmail($email)){
        $isNotError = false;
    }
    if(validPassword($password) && $password != $passwordCheck){
        $isNotError = false;
    }

    if($isNotError){
        $conbd = connect();
        $checkEmail = "SELECT email FROM users WHERE email = '$email'";
        $resultcheckEmail = $conbd -> query($checkEmail);
        
        if ($resultcheckEmail -> num_rows == 0){
            //$password = md5($password);
            $insert_sql = "INSERT INTO users(email, fname, lname, psw) VALUES('$email', '$fname', '$lname', '$password')";
            mysqli_query($conbd, $insert_sql);
            echo json_encode(array('statusCode' => 200));
        } else {
            echo json_encode(array('statusCode' => 201));
        }  
    } else{
        echo json_encode(array('statusCode' => 202));
    }
}

?>
