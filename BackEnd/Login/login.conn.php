<?php

require_once "../DB/db.conn.php";

if(isset($_POST['getuser'])){
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    $get_sql = "SELECT * FROM users WHERE userMail = :userMail ";
    $stmt = $conn->prepare($get_sql);
    $stmt->bindParam(':userMail', $usermail);
    $stmt->execute();
    if($stmt->rowCount() > 0){
        $row = $stmt->fetch(PDO::FETCH_ASSOC);

        $hashedPassword = $row['userPassword'];

        if(password_verify($password, $hashedPassword)){
            $_SESSION['userName'] = $row['userName'];
            $_SESSION['userMail'] = $row['userMail'];
            $_SESSION['AdminType'] = $row['adminAccess'];
            $_SESSION['loginSucess'] = 1;
            header("Location: ../../Admin/AdminFunctions/Admin.php");
        }else{
            $_SESSION['loginUnSucess'] = 1;
            header("Location: ../../Admin/AdminLogin.login.php");
        }

    }else{
        $_SESSION['loginUnSucess'] = 1;
        header("Location: ../../Admin/AdminLogin.login.php");
    }

}


?>