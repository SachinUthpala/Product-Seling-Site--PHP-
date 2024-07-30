<?php

require_once '../DB/db.conn.php';
session_start();

if(isset($_POST['add'])){
    $itemcode = $_POST['itemcode'];
    $orderNo = $_POST['orderNo'];
    $discription = $_POST['discription'];
    $poe = $_POST['poe'];
    $company = $_POST['company'];
    $technical = $_POST['technical'];
    $moreDetails = $_POST['moreDetails'];

    if(isset($_FILES['image'])){
        $image = $_FILES['image'];
        $Imgname = $image['name'];
        $imgfiletemp = $image['tmp_name'];
        $filename_separate = explode('.',$Imgname);
        $fileextention = strtolower($filename_separate[1]);
        $extensions = array('jpeg','jpg','png');

        if(in_array($fileextention,$extensions)){
            $uploadimage = '../../Images/Products/Ethanet_Switches/'.$Imgname; // Corrected path
            move_uploaded_file($imgfiletemp,$uploadimage);
            $pathToImg = "Images/Products/Ethanet_Switches/".$Imgname;

            echo $itemcode;
            echo $pathToImg;

            $sql = "INSERT INTO ethanet_switches ( `itemCode`, `discription`, `orderNo`, `image`, `poeType`, `company`, `tecnicalDocument`, `moreDetails`) 
            VALUES (:itemCode , :discription , :orderNo , :image , :poeType , :company , :technical , :moreDetails)";

            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':itemCode', $itemcode);
            $stmt->bindParam(':discription', $discription);
            $stmt->bindParam(':orderNo', $orderNo);
            $stmt->bindParam(':image', $pathToImg);
            $stmt->bindParam(':poeType', $poe);
            $stmt->bindParam(':company', $company);
            $stmt->bindParam(':technical', $technical);
            $stmt->bindParam(':moreDetails', $moreDetails);

            $stmt->execute();

            $_SESSION['item_Added'] = 1;
            header("Location: ../../Admin/AdminFunctions/AddItems/EthanetSwitch.php");
            
        }
    }


}



?>