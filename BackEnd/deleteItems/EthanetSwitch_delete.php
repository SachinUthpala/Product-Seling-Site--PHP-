<?php

session_start();
require_once "../DB/db.conn.php";


if(isset($_POST['delete'])){
    $itemCode = $_POST['itemId']; 
    $itemImage = $_POST['itemImage'];

    unlink("../../".$itemImage); // delete the image file from the server
    
    $sql = "DELETE FROM `ethanet_switches` WHERE `itemId` = :itemCode";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':itemCode', $itemCode);
    $stmt->execute();
    
    
    $_SESSION['item_deleted'] = 1;
    header("Location: ../../Admin/AdminFunctions/DeleteItems/EthanetSwitch_delete.php");
    

}



?>