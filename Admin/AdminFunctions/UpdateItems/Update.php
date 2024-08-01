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
  <?php

    if($_SESSION['item_deleted'] == 1){
      echo '<script>
        Swal.fire({
          icon: "success",
          title: "Item Successfully Added",
          showConfirmButton: false,
          timer: 1500
        });
      </script>';
      $_SESSION['item_deleted'] = null ;
    }

  ?>



  <!-- sweet alert options -->
  <div class="loader"></div>
  <div id="app">
    <div class="main-wrapper main-wrapper-1">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar sticky">
        <div class="form-inline mr-auto">
          <ul class="navbar-nav mr-3">
            <li><a href="#" data-toggle="sidebar" class="nav-link nav-link-lg
									collapse-btn"> <i data-feather="align-justify"></i></a></li>
            <li><a href="#" class="nav-link nav-link-lg fullscreen-btn">
                <i data-feather="maximize"></i>
              </a></li>
            <li>
              <!-- <form class="form-inline mr-auto">
                <div class="search-element">
                  <input class="form-control" type="search" placeholder="Search" aria-label="Search" data-width="200">
                  <button class="btn" type="submit">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </form> -->
            </li>
          </ul>
        </div>

        <ul class="navbar-nav navbar-right">
          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link nav-link-lg message-toggle"><i data-feather="mail"></i>
              <span class="badge headerBadge1">
                6 </span> </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Messages
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>

          <li class="dropdown dropdown-list-toggle"><a href="#" data-toggle="dropdown"
              class="nav-link notification-toggle nav-link-lg"><i data-feather="bell" class="bell"></i>
            </a>
            <div class="dropdown-menu dropdown-list dropdown-menu-right pullDown">
              <div class="dropdown-header">
                Notifications
                <div class="float-right">
                  <a href="#">Mark All As Read</a>
                </div>
              </div>
              
              <div class="dropdown-footer text-center">
                <a href="#">View All <i class="fas fa-chevron-right"></i></a>
              </div>
            </div>
          </li>

          <li class="dropdown"><a href="#" data-toggle="dropdown"
              class="nav-link dropdown-toggle nav-link-lg nav-link-user"> <img alt="image" src="../assets/img/user.png"
                class="user-img-radious-style"> <span class="d-sm-none d-lg-inline-block"></span></a>
            <div class="dropdown-menu dropdown-menu-right pullDown">
              <div class="dropdown-title">Hello Sarah Smith</div>
              <a href="profile.html" class="dropdown-item has-icon"> <i class="far
										fa-user"></i> Profile
              <div class="dropdown-divider"></div>
              <a href="auth-login.html" class="dropdown-item has-icon text-danger"> <i class="fas fa-sign-out-alt"></i>
                Logout
              </a>
            </div>
          </li>
        </ul>

      </nav>
      <div class="main-sidebar sidebar-style-2">
        
      </div>

      <!-- php code for retriew data -->
       <?php

            $n = 1;


            $sql = "SELECT * FROM `ethanet_switches`";
            $smtp = $conn->prepare($sql);
            $smtp->execute();

        ?>

      <!-- Main Content -->
      <div class="main-content">
        <section class="section">
          

          <!-- data table -->
          
          

          
          
         
        </section>


        <div class="settingSidebar">
          <a href="javascript:void(0)" class="settingPanelToggle"> <i class="fa fa-spin fa-cog"></i>
          </a>
          <div class="settingSidebar-body ps-container ps-theme-default">
            <div class=" fade show active">
              <div class="setting-panel-header">Setting Panel
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Select Layout</h6>
                <div class="selectgroup layout-color w-50">
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="1" class="selectgroup-input-radio select-layout" checked>
                    <span class="selectgroup-button">Light</span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="value" value="2" class="selectgroup-input-radio select-layout">
                    <span class="selectgroup-button">Dark</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Sidebar Color</h6>
                <div class="selectgroup selectgroup-pills sidebar-color">
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="1" class="selectgroup-input select-sidebar">
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Light Sidebar"><i class="fas fa-sun"></i></span>
                  </label>
                  <label class="selectgroup-item">
                    <input type="radio" name="icon-input" value="2" class="selectgroup-input select-sidebar" checked>
                    <span class="selectgroup-button selectgroup-button-icon" data-toggle="tooltip"
                      data-original-title="Dark Sidebar"><i class="fas fa-moon"></i></span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <h6 class="font-medium m-b-10">Color Theme</h6>
                <div class="theme-setting-options">
                  <ul class="choose-theme list-unstyled mb-0">
                    <li title="white" class="active">
                      <div class="white"></div>
                    </li>
                    <li title="cyan">
                      <div class="cyan"></div>
                    </li>
                    <li title="black">
                      <div class="black"></div>
                    </li>
                    <li title="purple">
                      <div class="purple"></div>
                    </li>
                    <li title="orange">
                      <div class="orange"></div>
                    </li>
                    <li title="green">
                      <div class="green"></div>
                    </li>
                    <li title="red">
                      <div class="red"></div>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="mini_sidebar_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Mini Sidebar</span>
                  </label>
                </div>
              </div>
              <div class="p-15 border-bottom">
                <div class="theme-setting-options">
                  <label class="m-b-0">
                    <input type="checkbox" name="custom-switch-checkbox" class="custom-switch-input"
                      id="sticky_header_setting">
                    <span class="custom-switch-indicator"></span>
                    <span class="control-label p-l-10">Sticky Header</span>
                  </label>
                </div>
              </div>
              <div class="mt-4 mb-4 p-3 align-center rt-sidebar-last-ele">
                <a href="#" class="btn btn-icon icon-left btn-primary btn-restore-theme">
                  <i class="fas fa-undo"></i> Restore Default
                </a>
              </div>
            </div>
          </div>
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