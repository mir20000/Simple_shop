<?php

if(isset($_POST['submit'])){
    include_once('connect.php');


    $email = mysqli_real_escape_string($conn,$_POST['yemail']);
    $pswd = mysqli_real_escape_string($conn,$_POST['pswd']);

    echo $email."<br>".$pswd."<br>";



    //creating the template
    $sql = "SELECT * FROM users WHERE email=? and password=? ;";
    //creating a prepared statement 
    $stmt= mysqli_stmt_init($conn);
    //Prepared the prepared statment

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Some error in SQL 20";
    }
    else{
        mysqli_stmt_bind_param($stmt,"ss",$email,$pswd);
        
        mysqli_stmt_execute($stmt);
        
        $result =mysqli_stmt_get_result($stmt);
        
        $row = mysqli_num_rows($result);
        
        $userinfo = mysqli_fetch_assoc($result);  

        if ($row==1) {
            session_start();
            $_SESSION['email'] = $userinfo['email'];
            $_SESSION['name'] = $userinfo['name'];
            $_SESSION['crexcoin'] = $userinfo['crexcoin'];
            
            header("location:index.php"); 
        }
        else{
            header("Location: login.php?message=notmatched"); 
        }
    }
}   


?>