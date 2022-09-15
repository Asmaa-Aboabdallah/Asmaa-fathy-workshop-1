<?php
session_start();
require_once('inc/db-connection.php');
if(isset($_POST['submit'])){
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "SELECT * FROM users where email='$email'";
    $run_query = mysqli_query($conn, $query);
    echo mysqli_num_rows($run_query);

    if(mysqli_num_rows($run_query) > 0){
        $user = mysqli_fetch_assoc($run_query);
        $isCorrect = password_verify($password, $user['password']);
        if ($isCorrect){
            $_SESSION['email'] = $email;
            header("location: index.php");
        }else{
            $_SESSION['errors'] = 'Password is not correct';
            header("location: login.php");
        }


    }else{
        $_SESSION['errors'] = "Email is not found";
        header("location: login.php");
        
    }
    

}else{
    header("location: login.php");
}

?>