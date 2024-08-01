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
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"> EastLink
            </a>
          </div>
          <ul class="sidebar-menu">
            <li class="menu-header">Main</li>
            <li class="dropdown">
              <a href="../Admin.php" class="nav-link"><i data-feather="monitor"></i><span>Dashboard</span></a>
            </li>

            <!-- show all products -->
            <li class="dropdown ">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="briefcase"></i><span>ALL Products</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">ACTIVE PRODUCTS</li>
                <li><a class="nav-link" href="#">Ethernet Switches</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Media Converters</a></li>
                <li><a class="nav-link" href="#">Wireless Lan Products</a></li>
                <li><a class="nav-link" href="#">POE Components</a></li>

                <li class="menu-header">PASSIVE PRODUCTS</li>
                <li><a class="nav-link" href="#">Copper Network Products</a></li>
                <li><a class="nav-link" href="#">Fiber Network Products</a></li>
              </ul>
            </li>

            <!-- show all users -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="user-check"></i><span>ALL Users</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">System Users</li>
                <li><a class="nav-link" href="#">System Users</a></li>
              </ul>
            </li>

           
           
            <li class="menu-header">Products Changes</li>
            <!-- add product -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Add Products</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">ACTIVE PRODUCTS</li>
                <li><a class="nav-link" href="../AddItems/EthanetSwitch_add.php">Ethernet Switches</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Media Converters</a></li>
                <li><a class="nav-link" href="#">Wireless Lan Products</a></li>
                <li><a class="nav-link" href="#">POE Components</a></li>

                <li class="menu-header">PASSIVE PRODUCTS</li>
                <li><a class="nav-link" href="#">Copper Network Products</a></li>
                <li><a class="nav-link" href="#">Fiber Network Products</a></li>
              </ul>
            </li>

            <!-- update products -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="feather"></i><span>Update Products</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">ACTIVE PRODUCTS</li>
                <li><a class="nav-link" href="../UpdateItems//EthanetSwitch_update.php">Ethernet Switches</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Media Converters</a></li>
                <li><a class="nav-link" href="#">Wireless Lan Products</a></li>
                <li><a class="nav-link" href="#">POE Components</a></li>

                <li class="menu-header">PASSIVE PRODUCTS</li>
                <li><a class="nav-link" href="#">Copper Network Products</a></li>
                <li><a class="nav-link" href="#">Fiber Network Products</a></li>
              </ul>
            </li>

            <!-- delete products -->
            <li class="dropdown active">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="alert-triangle"></i><span>Delete Products</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">ACTIVE PRODUCTS</li>
                <li class="active"><a class="nav-link" href="#">Ethernet Switches</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Network Interface Cards</a></li>
                <li><a class="nav-link" href="#">Media Converters</a></li>
                <li><a class="nav-link" href="#">Wireless Lan Products</a></li>
                <li><a class="nav-link" href="#">POE Components</a></li>

                <li class="menu-header">PASSIVE PRODUCTS</li>
                <li><a class="nav-link" href="#">Copper Network Products</a></li>
                <li><a class="nav-link" href="#">Fiber Network Products</a></li>
              </ul>
            </li>

            <li class="menu-header">User Changes</li>
            <!-- add user -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Add User</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">System Users</li>
                <li><a class="nav-link" href="#">Add User</a></li>
              </ul>
            </li>

            <!-- update user -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Update User</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">System Users</li>
                <li><a class="nav-link" href="#">Update User</a></li>
              </ul>
            </li>

            <!-- delete user -->
            <li class="dropdown">
              <a href="#" class="menu-toggle nav-link has-dropdown"><i
                  data-feather="shopping-bag"></i><span>Delete User</span></a>
              <ul class="dropdown-menu">
                <li class="menu-header">System Users</li>
                <li><a class="nav-link" href="#">Delete User</a></li>
              </ul>
            </li>
           
          </ul>
        </aside>
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
          <div class="row ">
            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">NON POE</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_GIG_NPE; ?></h2>
                          <p class="mb-0"><span class="col-green">GIGABYTE</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/1.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15"> POE</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_GIG_PE; ?></h2>
                          <p class="mb-0"><span class="col-green">GIGABYTE</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/2.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">NON POE</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_FE_NPE; ?></h2>
                          <p class="mb-0"><span class="col-green">FAST E-NET</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">POE</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_FE_PE; ?></h2>
                          <p class="mb-0"><span class="col-green">FAST E-NET</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">TR-SEVER</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_TRANSCEIVERS ; ?></h2>
                          <p class="mb-0"><span class="col-green">TR-SEVER</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-xs-12">
              <div class="card">
                <div class="card-statistic-4">
                  <div class="align-items-center justify-content-between">
                    <div class="row ">
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pr-0 pt-3">
                        <div class="card-content">
                          <h5 class="font-15">TOTAL</h5>
                          <h2 class="mb-3 font-18"><?php echo $total_items_all ; ?></h2>
                          <p class="mb-0"><span class="col-green">PRODUCTS</span></p>
                        </div>
                      </div>
                      <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 pl-0">
                        <div class="banner-img">
                          <img src="assets/img/banner/3.png" alt="">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- data table -->
          <div class="section-body">
          <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Basic DataTables</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">

                      <table class="table table-striped" id="table-1">
                        <thead>
                          <tr>
                            <th class="text-center">
                              No
                            </th>
                            <th>Item Code</th>
                            <th>Order No</th>
                            <th>Image</th>
                            <th>Description</th>
                            <th>Poe Type</th>
                            <th>Company</th>
                            <th>Delete</th>
                          </tr>
                        </thead>
                        <tbody>
                        <?php while($items = $smtp->fetch(PDO::FETCH_ASSOC)){ ?>
                          <tr>
                            <td>
                              <?php echo $n; ?>
                            </td>
                            <td><?php echo $items['itemCode']; ?></td>
                            <td><?php echo $items['orderNo']; ?></td>
                            <td>
                              <img alt="image" src="<?php echo "../../../".$items['image']; ?>" width="35">
                            </td>
                            <td><?php echo $items['discription']; ?></td>
                            <td><?php echo $items['poeType']; ?></td>
                            <td><?php echo $items['company']; ?></td>
                            <td>
                                <form action="../../../BackEnd/deleteItems/EthanetSwitch_delete.php" method="post">
                                    <input type="hidden" name="itemId" value="<?php echo $items['itemId']; ?>">
                                    <input type="submit" name="delete" value="Delete" class="btn btn-primary">
                                </form>
                            </td>
                          </tr>
                          <?php 
                            $n++;
                        } ?>
                          
                        </tbody>
                      </table>

                    </div>
                  </div>
                </div>
              </div>
            </div>
            </div>
          

          
          
         
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