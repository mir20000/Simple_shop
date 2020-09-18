<?php



if(isset($_POST['submit'])){
    include_once('connect.php');
    session_start();

    $product = mysqli_real_escape_string($conn,$_POST['product']);
    $price = mysqli_real_escape_string($conn,$_POST['price']);
    $crexcoinvalue = mysqli_real_escape_string($conn,$_POST['crexcoinvalue']);
    $fullname = mysqli_real_escape_string($conn,$_POST['fullname']);
    $phone = mysqli_real_escape_string($conn,$_POST['phone']);
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    $street_add = mysqli_real_escape_string($conn,$_POST['street_add']);
    $city = mysqli_real_escape_string($conn,$_POST['city']);
    $district = mysqli_real_escape_string($conn,$_POST['district']);
    $pin = mysqli_real_escape_string($conn,$_POST['pin']);
    $landmark = mysqli_real_escape_string($conn,$_POST['landmark']);

    $orderid = hexdec(uniqid());

    $account=$_SESSION['email'];



    $sql = "SELECT * FROM users WHERE email=? ;";
    //creating a prepared statement 
    $stmt= mysqli_stmt_init($conn);
    //Prepared the prepared statment

    if (!mysqli_stmt_prepare($stmt,$sql)) {
        echo "Some error in SQL 20";
    }
    else{
        mysqli_stmt_bind_param($stmt,"s",$account);
        
        mysqli_stmt_execute($stmt);
        
        $result =mysqli_stmt_get_result($stmt);
        
        $row = mysqli_num_rows($result);
        
        $userinfo = mysqli_fetch_assoc($result);  

        if ($row==1) {
            
            $crexcoin = $userinfo['crexcoin'];
            $crexcoin = intval($crexcoin);
            $crexcoinvalue = intval($crexcoinvalue);



            if($crexcoin<$crexcoinvalue){

                header("Location: crexcoinerror.php?message=notenough"); 
            }
            else{

                $sql1 = "INSERT INTO orders (account,product, price, crexcoinvalue, fullname, phone, email, street_add, city, district, pin, landmark,orderid) VALUES(?,?,?,?,?,?,?,?,?,?,?,?,?)";

                $stmt = mysqli_stmt_init($conn);

                if (!mysqli_stmt_prepare($stmt,$sql1)) {
            
                    echo "Some error in SQL 35";
            }
                else{
                    mysqli_stmt_bind_param($stmt,"sssssssssssss",$account,$product,$price,$crexcoinvalue,$fullname,$phone,$email,$street_add,$city,$district,$pin,$landmark,$orderid);

                    mysqli_stmt_execute($stmt);

                    echo "$product<br>$price<br>$crexcoinvalue<br><br><br>$fullname<br>$phone<br>$email<br>$street_add<br>$city<br>$district<br>$pin<br>$landmark<br><br>$orderid<br><br>";

                    $crexcoin = $crexcoin - $crexcoinvalue;
                    

                    $sql2 = "UPDATE users SET crexcoin=? WHERE email=?";

                    if (!mysqli_stmt_prepare($stmt,$sql2)) {
                
                        echo "Some error in SQL 51";
                }
                    else{
                        mysqli_stmt_bind_param($stmt,"ss",$crexcoin,$_SESSION['email']);

                        mysqli_stmt_execute($stmt);

                        $_SESSION['crexcoin'] = $crexcoin;
                        echo "$crexcoin";
                        header("Location: thanks.php?orderid=$orderid"); 
                    }
                }
            }
        }
        else{
            header("Location: crexcoinerror.php?message=dbnotmatch"); 
        }
    }
            
    

        
}

?>