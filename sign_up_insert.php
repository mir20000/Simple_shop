<?php

if (isset($_POST['submit'])) {
    include_once('connect.php');

    $name = mysqli_real_escape_string($conn, $_POST['yname']);
    $email = mysqli_real_escape_string($conn, $_POST['yemail']);
    $pswd = mysqli_real_escape_string($conn, $_POST['pswd']);
    $repswd = mysqli_real_escape_string($conn, $_POST['repswd']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $gender = mysqli_real_escape_string($conn, $_POST['gender']);
    $crexcoin = 0;

    echo $name . "<br>" . $email . "<br>" . $pswd . "<br>" . $repswd . "<br>" . $dob . "<br>" . $gender . "<br>";


    if ($pswd != $repswd) {

        header("Location: sign_up.php?error=notmatched");
    } else {
        //creating the template
        $sql = "SELECT * FROM users WHERE email=?;";
        //creating a prepared statement 
        $stmt = mysqli_stmt_init($conn);
        //Prepared the prepared statment

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            echo "Some error in SQL 28";
        } else {
            mysqli_stmt_bind_param($stmt, "s", $email);

            mysqli_stmt_execute($stmt);

            $result = mysqli_stmt_get_result($stmt);

            $row = mysqli_num_rows($result);

            if ($row > 0) {
                header("Location: sign_up.php?error=exist");
            } else {
                $sql = "INSERT INTO users (name, email, password, dob, gender,crexcoin) VALUES(?,?,?,?,?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt, $sql)) {

                    echo "Some error in SQL 49";
                } else {
                    mysqli_stmt_bind_param($stmt, "ssssss", $name, $email, $pswd, $dob, $gender,$crexcoin);

                    mysqli_stmt_execute($stmt);

                    header("Location: login.php?message=done");
                }
            }
        }
    }
}
