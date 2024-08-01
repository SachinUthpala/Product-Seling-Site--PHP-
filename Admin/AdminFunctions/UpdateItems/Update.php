<?php

session_start();
require_once '../../../BackEnd/DB/db.conn.php';

$userName = $_SESSION['userName'] ;
$userMail = $_SESSION['userMail'] ;
$userAccess = $_SESSION['AdminType'] ;

if(!$userName || !$userMail){
  header('Location: ../../../index.html');
  exit;
}


if($_POST['update']){
  $itemId = $_POST['itemId'];
}

$sql = "SELECT * FROM `ethanet_switches` WHERE `itemId` = :itemId";
$smtp =$conn->prepare($sql);
$smtp->bindParam(':itemId', $itemId);
$smtp->execute();
$result = $smtp->fetch(PDO::FETCH_ASSOC);



?>




<!DOCTYPE html>
<html lang="en">


<!-- index.html  21 Nov 2019 03:44:50 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>East-link Admin Panel</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="../assets/css/app.min.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="../assets/css/style.css">
  <link rel="stylesheet" href="../assets/css/components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="../assets/css/custom.css">
</head>

<body>

  <!-- sweet alert js -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
 



  <!-- sweet alert options -->
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      

     
      <!-- Main Content -->
      

        <div class="card">
                  <form class="needs-validation" action="../../../BackEnd/AddItems/ethanet.conn.php" novalidate=""  enctype="multipart/form-data" method="post" >
                    <div class="card-header">
                      <h4>Update Ethernet Switch</h4>
                    </div>
                    <input type="hidden" class="form-control" value="<?php echo $result['itemId']; ?>" name="itemId" required="">
                    <div class="card-body">
                      <div class="form-group">
                        <label>Item Code</label>
                        <input type="text" class="form-control" value="<?php echo $result['itemCode']; ?>" name="itemcode" required="">
                        
                      </div>
                      <div class="form-group">
                        <label>Order No</label>
                        <input type="text" class="form-control" value="<?php echo $result['orderNo']; ?>"  name="orderNo" required="">
                        
                      </div>
                      
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="discription" value="<?php echo $result['discription']; ?>" placeholder="<?php echo $result['discription']; ?>"  required=""></textarea>
                        
                      </div>

                      <div class="form-group">
                        <label>More Details</label>
                        <textarea class="form-control" name="moreDetails" value="<?php echo $result['discription']; ?>" placeholder="<?php echo $result['discription']; ?>"  required=""></textarea>
                        
                      </div>

                      <div class="form-group">
                        <label>Select <code>.POE Type / Transceivers</code></label>
                        <select class="form-control form-control-lg" name="poe">
                          <option  value="<?php echo $result['poeType']; ?>"><?php echo $result['poeType']; ?></option>
                            <option value="GIG_NPE">GIGABIT ETHERNET - NON POE</option>
                            <option value="GIG_PE">GIGABIT ETHERNET - POE</option>
                            <option value="FE_NPE">FAST ETHERNET - NON POE</option>
                            <option value="FE_PE">FAST ETHERNET - POE</option>
                            <option value="TRANSCEIVERS">TRANSCEIVERS</option>
                        </select>
                      </div>

                      <div class="form-group">
                        <label>Select <code>.Company</code></label>
                        <select class="form-control form-control-lg" name="company">
                        <option  value="<?php echo $result['company']; ?>"><?php echo $result['company']; ?></option>
                            <option value="LEVEL_ONE">LEVEL ONE</option>
                            <option value="CISCO">CISCO</option>
                        </select>

                      </div>

                      

                      <div class="form-group">
                        <label>Technical Document Link</label>
                        <input type="text" class="form-control" name="technical" value="<?php echo $result['tecnicalDocument']; ?>" >
                        
                      </div>

                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" name="add">Update</button>
                      <button class="btn btn-primary" name="cancel">Cancel</button>
                    </div>
                  </form>
          </div>


        
      </div>


    </div>
  </div>
  <!-- General JS Scripts -->
  <script src="../assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="../assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="../assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="../assets/js/custom.js"></script>


  <!-- JS Libraies -->
  <script src="../assets/bundles/datatables/datatables.min.js"></script>
  <script src="../assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js"></script>
  <script src="../assets/bundles/jquery-ui/jquery-ui.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="../assets/js/page/datatables.js"></script>




  


</body>


<!-- index.html  21 Nov 2019 03:47:04 GMT -->
</html>