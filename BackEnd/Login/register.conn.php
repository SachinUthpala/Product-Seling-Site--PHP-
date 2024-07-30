<?php

require_once "../DB/db.conn.php";

if(isset($_POST['addUser'])){
    $username = $_POST['username'];
    $usermail = $_POST['usermail'];
    $password = $_POST['password'];

    $hashPassword = password_hash($password , PASSWORD_BCRYPT);

    $sql = "INSERT INTO `users`( `userName`, `userMail`, `userPassword`) VALUES (:username, :userMail, :userPassword)";

    $stmt = $conn->prepare($sql);

    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':userMail', $usermail);
    $stmt->bindParam(':userPassword', $hashPassword);

    $stmt->execute();

}





?>