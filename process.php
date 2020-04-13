<?php
    $db = mysqli_connect('127.0.0.1', 'checkuser','123456', 'checkuser');
    if(isset($_POST['username_check'])){
        $username = $_POST['username'];
        $sql = "select * from users where username = '$username';";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "taken";
        }else {
            echo "not_taken";
        }
        exit();
    }

    if(isset($_POST['email_check'])){
        $email = $_POST['email'];
        $sql = "select * from users where email = '$email';";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "taken";
        }else {
            echo "not_taken";
        }
        exit();
    }

    if(isset($_POST['save'])){
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $sql = "select * from user where username = '$username';";
        $result = mysqli_query($db, $sql);
        if(mysqli_num_rows($result) > 0){
            echo "exists";
            exit();
        }else {
            $query = "insert into users (username, email, password) values ('$username','$email','".md5($password)."');";
            $results = mysqli_query($db, $query);
            echo "Saved";
            exit();
        }
    }
    
?>