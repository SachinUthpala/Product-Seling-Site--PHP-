<?php

require_once '../../BackEnd/DB/db.conn.php';
session_start();



?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <script
      src="https://kit.fontawesome.com/64d58efce2.js"
      crossorigin="anonymous"
    ></script>
    <link rel="stylesheet" href="../../Styles/Navigation.css" />
    <link rel="stylesheet" href="../../Styles/Style.css" />
    <link rel="stylesheet" href="../../Styles/Product.css">
    <!-- 
    animation css
    -->
    <link rel="stylesheet" href="../../Styles/animations.css" />
    <title>East Link Engineering</title>

    <!-- 
        google fonts
    -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Oswald:wght@200..700&display=swap"
      rel="stylesheet"
    />

    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Exo+2:ital,wght@0,100..900;1,100..900&family=Space+Grotesk:wght@300..700&display=swap"
      rel="stylesheet"
    />

    <!-- tab icon -->
    <link rel="icon" href="../../Images/Web/EL LOGO.png" />

   
        <!-- font awsome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.css" integrity="sha512-5A8nwdMOWrSz20fDsjczgUidUBR8liPYU+WymTZP1lmY9G6Oc7HlZv156XqnsgNUzTyMefFTcsFH/tnJE/+xBg==" crossorigin="anonymous" referrerpolicy="no-referrer" />


    <style>
      #GEU-0523:target{
        display: block;
      }
    </style>
  </head>

  <body>
    <!-- back to top -->
    <div class="loader" id="preloader">
      


    </div>

    <!-- header -->
    <header class="">
      <div class="container">
        <input type="checkbox" name="" id="check" />

        <div class="logo-container">
          <img src="../../Images/Web/EL LOGO.png" alt="" />
        </div>

        <!-- navigation link -->
        <div class="nav-btn">
          <div class="nav-links">
            <ul>
              <li class="nav-link" style="--i: 0.6s">
                <a href="../../index.html">HOME</a>
              </li>

              <li class="nav-link" style="--i: 0.85s">
                <a href="#" ondblclick="location.href='./Products.html'">PRODUCTS</a>
                <div class="dropdown">
                  <!-- sub menu -->
                  <ul>
                    <li class="dropdown-link">
                      <a href="#"
                        >COMPUTER NETWORK PRODUCT</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#"
                              >ACTIVE NETWORK PRODUCTS></a>
                            <div class="dropdown second">
                              <ul>
                                <li class="dropdown-link">
                                  <a href="./EthanetSwitches.php">ETHERNET SWITCHES</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">NETWORK INTERFACE CARDS</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">MEDIA CONVERTERS</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">WIRELESS LAN PRODUCTS</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">POE COMPONENTS</a>
                                </li>
                                <div class="arrow"></div>
                              </ul>
                            </div>
                          </li>
                          <li class="dropdown-link">
                            <a href="#"
                              >PASSIVE NETWORK PRODUCTS</a>
                            <div class="dropdown second">
                              <ul>
                                <li class="dropdown-link">
                                  <a href="#">COPPER NETWORK PRODUCTS</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">FIBER NETWORK PRODUCTS</a>
                                </li>

                                <div class="arrow"></div>
                              </ul>
                            </div>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <li class="dropdown-link">
                      <a href="#"
                        >DATA CENTER/SERVER ROOM PRODUCTS</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#"
                              >19" SERVER RACKS & ACCESSORIES</a>
                           <div class="dropdown second">
                              <ul>
                                <li class="dropdown-link">
                                  <a href="../Racks/FreeStanding19.html">Free Standing 19” Racks</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Wall Mounting 19” Racks</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Compartment 19” Racks</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">DATCET Data Center 19” Racks</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Aisle Containment</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Two Posts & Four Posts Open 19” Racks</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Outdoor 19” Rack</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">Rack Accessories</a>
                                </li>
                                <div class="arrow"></div>
                              </ul>
                            </div>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">KVM SWITCHES & LCD CONSOLES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">RAISED ACCESS FLOORS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">POWER DESTRIBUTION PANELS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#"
                              >ENVIRONMENTAL & POWER MONITERING PANEL</a
                            >
                          </li>
                          <li class="dropdown-link">
                            <a href="#">RACK / PANEL AC</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">UPS</a>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <li class="dropdown-link">
                      <a href="#"
                        >CABLE MANAGEMENT PRODUCTS</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#">PERFORATED CABLE TRAYS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">CABLE LADDERS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#"
                              >CABLE TRUNKING</a>
                            <div class="dropdown second">
                              <ul>
                                <li class="dropdown-link">
                                  <a href="#">METAL CABLE TRUNKING</a>
                                </li>
                                <li class="dropdown-link">
                                  <a href="#">PVC CABLE TRUNKING</a>
                                </li>

                                <div class="arrow"></div>
                              </ul>
                            </div>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">ELECTRICAL CONDUITS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">FLOOR TRUNKINGS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">RAISED ACCESS FLOORS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">WIRE MESH CABLE TRAYS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">SERVICE BOXES</a>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <li class="dropdown-link">
                      <a href="#"
                        >TELECOMMUNICATION PRODUCT</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#">TELECOMMUNICATION CABLES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">TELECOM WIRING ACCESSORIES</a>
                          </li>

                          <li class="dropdown-link">
                            <a href="#">TELECOM DISTRIBUTION BOXES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">TELEPHONES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">PBXS</a>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <li class="dropdown-link">
                      <a href="#"
                        >AUDIO/VIDEO PRODUCTS</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#">VIDEO SPLITERS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">VIDEO SWITCHES</a>
                          </li>

                          <li class="dropdown-link">
                            <a href="#">VIDEO METRIX SWITCHES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">VIDEO CONVERTS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">VIDEO EXTENDES</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">VIDEO CABLES</a>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <li class="dropdown-link">
                      <a href="#">SELF SERVICE PRODUCTS</a>
                    </li>

                    <li class="dropdown-link">
                      <a href="#">BANKING SERVICE PRODUCTS</a>
                    </li>

                    <li class="dropdown-link">
                      <a href="#">TOOLS & TEST EQUIPMENTS</a>
                    </li>

                    <li class="dropdown-link">
                      <a href="#">SURGE SUPPRESSORS</a>
                    </li>

                    <li class="dropdown-link">
                      <a href="#"
                        >OTHER PRODUCTS</a>
                      <div class="dropdown second">
                        <ul>
                          <li class="dropdown-link">
                            <a href="#">MISCELLANEOUS PRODUCTS</a>
                          </li>
                          <li class="dropdown-link">
                            <a href="#">SERVER CHASES</a>
                          </li>
                          <div class="arrow"></div>
                        </ul>
                      </div>
                    </li>

                    <div class="arrow"></div>
                  </ul>
                </div>
              </li>

              <li class="nav-link" style="--i: 1.1s">
                <a href="#">WHAT'S NEW</a>
              </li>

              <li class="nav-link" style="--i: 0.85s">
                <a href="#">SUPPORT</a>
                <div class="dropdown">
                  <ul>
                    <li class="dropdown-link">
                      <a href="#">FAQ</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="#">FLYERS & CATALOGS</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="#">TEST CERTIFICATE</a>
                    </li>
                    <li class="dropdown-link">
                      <a href="#">VEDIOS</a>
                    </li>
                    <div class="arrow"></div>
                  </ul>
                </div>
              </li>

              <li class="nav-link" style="--i: 1.35s">
                <a href="#">ABOUT US</a>
              </li>

              <li class="nav-link" style="--i: 1.35s">
                <a href="#">CONTACT US</a>
              </li>
            </ul>

            
          </div>
        </div>

        <div class="hamburger-menu-container">
          <div class="hamburger-menu">
            <div></div>
          </div>
        </div>
      </div>
    </header>

    <!-- 
      top
      -->
    <div class="top" onclick="topFunction()" id="myBtn" title="Go to top">
      <i class="fa fa-angle-double-up" aria-hidden="true"></i>
    </div>

    <!-- main section -->
    <main>
      <section class="header-section NIC-cards" style="height: 80vh;">
        <div class="overlay">
          <div class="left">
            <br>
            <p>Home > Computer Network Products > Active Products > NIC</p>
            <br />
            <h1>Network Interface Cards</h1>
            <br />
            <h4>
              we import our products directly from the reputed manufactures or
              we manufacture the products here in Sri Lanka as per the
              international standard using quality row materials
            </h4>
          </div>
          
        </div>
      </section>
 

       

        <div class="products">

          <div class="product-header" id="level01Npoe_header">
            <h1>LEVEL ONE</h1>
            <p>NETWORK INTERFACE CARDS</p>
          </div>


          
        </div>



       
      </div>

      
      <!-- 
      footer 
      -->
      
      <footer>
        <div class="content">
          <div class="left">
            <div class="socalMedia">
              <h2>Follow Us</h2>

              <div class="social-icons">
                <div class="facebook so-card">
                  <i class="fa fa-facebook" aria-hidden="true"></i>
                  <p>Facebook</p>
                </div>
                <div class="inster so-card">
                  <i class="fa fa-instagram" aria-hidden="true"></i>
                  <p>Instagram</p>
                </div>
                <div class="twitter so-card">
                  <i class="fa fa-twitter" aria-hidden="true"></i>
                  <p>Twitter</p>
                </div>
              </div>
            </div>
            <br>
            <p>East Link Engineering Co (Pvt) Ltd commenced operation in 1998 and incorporated as a limited liability company in Sri Lanka on 15th September 1999</p>
          </div>
          
          
          <div class="middle">
            <form action="#">
              <input type="email" name="" id="" placeholder="Your Email">
              <button>Subscribe Now</button>
            </form>
            <br>
            <p>
              Enter your email and you'll be one of the first to get new updates.
            </p>
          </div>

          <div class="right">
            <h2>Find Us On</h2>
            <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15844.025976254083!2d79.8825027!3d6.8898245!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3ae25a2e361eb9ef%3A0xd3859c11f3f5c21d!2sEast%20Link%20Engineering%20Company%20(Pvt)%20Ltd!5e0!3m2!1sen!2slk!4v1719293395302!5m2!1sen!2slk"  style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>

          <div class="end-right">
            <h2>Quick links</h2>

            <ul>
              <li><a href="#">Home</a></li>
              <li><a href="#">About Us</a></li>
              <li><a href="#">Contact us</a></li>
              <li><a href="#">Products</a></li>
            </ul>
          </div>

        </div>
        <br><br>
        <hr>
        <br>
        <div class="after-content">
          <p>East - Link Engineering</p>
          <div class="tams">
            <a href="#">Terms and Conditions</a>
            <a href="#">API Use Policy</a>
            <a href="#"> Privacy Policy</a>
          </div>
        </div>
        
        
      </footer>
    </main>



    <!-- popup windows -->
    <div id="GEU-0523" class="popup">
      <div class="popup__block">
        <h1>GEU-0523</h1>

        <div class="img-container">
          <img src="../../Images/Products/Ethanet_Switches/More/GEU-0523-1.jpg" alt="">
        </div>

        <div class="popup-discription">
          <h2>GEU-0523 5-Port Gigabit Switch</h2>
          <h3>Model Number : <span>GEU-0523</span></h3>
          <h3>SKU : <span>53016303</span></h3>
          <ul>
            <li>5 Gigabit Ethernet ports</li>
            <li>10/100/1000Mbps wire speed transmission and reception</li>
            <li>9K jumbo frames to increase data transfer rates</li>
            <li>Supports 2K MAC address auto-learning and auto-aging</li>
            <li>Provides wall or desktop mounting</li>
            <li>Minimize carbon footprint with advanced energy efficient technology (IEEE 802.3az)</li>
          </ul>
          <p>
            he LevelOne GEU-0523 is a wire-speed, non-blocking networking device that provides 5 ports 10/100/1000Mbps Ethernet connections. All ports support auto-negotiation and auto-MDI/MDIX sensing, eliminating the need for crossover cables or Uplink Ports. Each port can be used as general network port or as connecting port into a router, server, hub or another network switch. The GEU-0523 is the ideal and cost-effective choice for expanding your network.
          </p>
          <br>
          <a href="https://www.level1.com/level1_en/productpdf/download/file/id/8552/name/GEU-0523__5-Port_Gigabit_Switch.pdf/" target=" "><i class="fa fa-file-pdf-o" aria-hidden="true"></i><span>Technical Document</span></a>
        </div>
        <a href="#" class="popup__close">close</a>
      </div>
    </div>

  </style>


    <!-- 
        java script
    -->
    <script src="../../JavaScripts/Script.js"></script>
    <!-- 
        animation js
    -->
    <script src="../../JavaScripts/animation.js"></script>

        <!-- 
        sweet alert
    -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
      async function  AdminLogin(){
           const { value: password } = await Swal.fire({
           title: "Enter your password",
           input: "password",
           inputLabel: "Password",
           inputPlaceholder: "Enter your password",
           inputAttributes: {
               maxlength: "100",
               autocapitalize: "off",
               autocorrect: "off"
           }
           });
           if (password === "admin@2024") {

               location.href="./Admin/AdminLogin/login.php";
           }else{
               Swal.fire({
               icon: "error",
               title: "Oops...",
               text: "Provide Correct Password To Continive this Task !",
               });
           }
       }
   </script>
  </body>
</html>
