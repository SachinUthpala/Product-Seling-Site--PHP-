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


// fetching data from database
$sql_GIG_NPE = "SELECT COUNT(*) as total_items FROM `ethanet_switches` WHERE poeType = 'GIG_NPE'";
$stmt_GIG_NPE = $conn->prepare($sql_GIG_NPE);
$stmt_GIG_NPE->execute();
$result_GIG_NPE = $stmt_GIG_NPE->fetch(PDO::FETCH_ASSOC);
$total_items_GIG_NPE = $result_GIG_NPE['total_items'];


$sql_GIG_PE= "SELECT COUNT(*) as total_items_PE FROM `ethanet_switches` WHERE poeType = 'GIG_PE'";
$stmt_GIG_PE = $conn->prepare($sql_GIG_PE);
$stmt_GIG_PE->execute();
$result_GIG_PE = $stmt_GIG_PE->fetch(PDO::FETCH_ASSOC);
$total_items_GIG_PE = $result_GIG_PE['total_items_PE'];

$sql_FE_NPE= "SELECT COUNT(*) as total_items_FE_NPE FROM `ethanet_switches` WHERE poeType = 'FE_NPE'";
$stmt_FE_NPE = $conn->prepare($sql_FE_NPE);
$stmt_FE_NPE->execute();
$result_FE_NPE = $stmt_FE_NPE->fetch(PDO::FETCH_ASSOC);
$total_items_FE_NPE = $result_FE_NPE['total_items_FE_NPE'];




$sql_FE_PE= "SELECT COUNT(*) as total_itemsFE_PE FROM `ethanet_switches` WHERE poeType = 'FE_PE'";
$stmt_FE_PE= $conn->prepare($sql_FE_PE);
$stmt_FE_PE->execute();
$result_FE_PE = $stmt_FE_PE->fetch(PDO::FETCH_ASSOC);
$total_items_FE_PE = $result_FE_PE['total_itemsFE_PE'];




$sql_TRANSCEIVERS= "SELECT COUNT(*) as total_items_TRANSCEIVERS FROM `ethanet_switches` WHERE poeType = 'TRANSCEIVERS'";
$stmt_TRANSCEIVERS = $conn->prepare($sql_TRANSCEIVERS);
$stmt_TRANSCEIVERS->execute();
$result_TRANSCEIVERS= $stmt_TRANSCEIVERS->fetch(PDO::FETCH_ASSOC);
$total_items_TRANSCEIVERS = $result_TRANSCEIVERS['total_items_TRANSCEIVERS'];


$all_sql = "SELECT COUNT(*) as total_items FROM `ethanet_switches`";
$sqmtp_all = $conn->prepare($all_sql);
$sqmtp_all->execute();
$result_all = $sqmtp_all->fetch(PDO::FETCH_ASSOC);
$total_items_all = $result_all['total_items'];






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
                    <div class="card-body">
                      <div class="form-group">
                        <label>Item Code</label>
                        <input type="text" class="form-control" name="itemcode" required="">
                        
                      </div>
                      <div class="form-group">
                        <label>Order No</label>
                        <input type="text" class="form-control" name="orderNo" required="">
                        
                      </div>
                      
                      <div class="form-group">
                        <label>Description</label>
                        <textarea class="form-control" name="discription" required=""></textarea>
                        
                      </div>

                      <div class="form-group">
                        <label>More Details</label>
                        <textarea class="form-control" name="moreDetails" required=""></textarea>
                        
                      </div>

                      <div class="form-group">
                        <label>Select <code>.POE Type / Transceivers</code></label>
                        <select class="form-control form-control-lg" name="poe">
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
                            <option value="LEVEL_ONE">LEVEL ONE</option>
                            <option value="CISCO">CISCO</option>
                        </select>

                      </div>

                      <div class="form-group">
                        <label>Upload Image</label>
                        <input type="file" class="form-control" name="image" required="">
                      </div>

                      <div class="form-group">
                        <label>Technical Document Link</label>
                        <input type="text" class="form-control" name="technical" >
                        
                      </div>

                    </div>
                    <div class="card-footer text-right">
                      <button class="btn btn-primary" name="add">Submit</button>
                    </div>
                  </form>
          </div>


        
      </div>

      <footer class="main-footer">
        <div class="footer-left">
          <a href="https://github.com/SachinUthpala">Sachin Gunasekara</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
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