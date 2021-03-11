
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - leerling overzicht</title>
  <meta content="" name="descriptison">
  <meta content="" name="keywords">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="assets/vendor/icofont/icofont.min.css" rel="stylesheet">
  <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
  <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
  <link href="assets/vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
  <link href="assets/vendor/aos/aos.css" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="assets/css/style.css" rel="stylesheet">
    <style type="text/css">
    .fout {
	color: #F00;
     }
    </style>
</head>

<body>
<div class="container" data-aos="fade-up">
  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo mr-auto"><a href="index.php">Sam De Troyer</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo mr-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

      <nav class="nav-menu d-none d-lg-block">
        <ul>
          <li><a href="index.php">Start</a></li>
          <li><a href="about.php">Over</a></li>
          <li><a href="courses.php">Lespakketten</a></li>
          <li><a href="events.php">Evenementen</a></li>
          <li><a href="pricing.php">Prijzen</a></li>
          <li><a href="contact.php">Contacteer ons</a></li>
            <li class="active"><a href="admin_pagina.php">Admin</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="login.php" class="get-started-btn">Inloggen</a>

    </div>
  </header><!-- End Header -->
<br>
<br>
<br>
<br>
    <a href="admin_index.php" class="get-started-btn">Terug</a>
<br>
<br>
  <h2>Leerling Zoeken en aanpassen</h2>  
<br>
    <form name="frmleerling" method="post" action="<?php echo $_SERVER['PHP_SELF']?>">
                <label>Voornaam of email:</label>
                <input type="text" name="leerling">
                <button type="submit" class="get-started-btn" name="search">Zoek</button>
            </form>
            <br>
            <table width="100%" border="1" >
                <tr>
                    <td>
                        <b>ID</b>
                    </td>
                    <td>
                        <b>Voornaam</b>
                    </td>
                    <td>
                        <b>Achternaam</b>
                    </td>
                    <td>
                        <b>E-mail</b>
                    </td>
                    <td>
                        <b>Telefoon</b>
                    </td>
                    <td>
                        <b>Adres</b>
                    </td>
                    <td>
                        <b>Postcode</b>
                    </td>
                    <td>
                        <b>Type gitaar</b>
                    </td>
                    <td>
                        <b>Lievelingsgenre</b>
                    </td>
                    <td>
                        <b>Aanpassen</b>
                    </td>
                </tr>
                
                <div>

            <?php
                $mysqli= new MySQLi("localhost","root","","databasegip");
                if(mysqli_connect_errno()) 
                {
                    trigger_error("Error when connecting: ".$mysqli->error);
                }
                else 
                {
                   // if(isset($_POST["search"]) && isset($_POST["leerling"]) && $_POST["leerling"] != "") 
                //    {
                        if(mysqli_connect_errno()) 
                        {
                            trigger_error('fout bij verbinding'.$mysqli->error);
                        }
                        
                        if(isset($_POST["leerling"]) && strpos($_POST["leerling"], '@') !== false) 
                        {
                            $sql = "SELECT l.id,l.naam,l.voornaam,l.postid,l.adres,l.email,l.telefoon,l.typegitaarid,l.genreid,g.PCode,g.PostcodeId,t.typeID,t.typegitaren,b.genreid,b.muziekgenre FROM tbllid l,tblgemeente g,tbltypes t,tblgenre b WHERE l.voornaam LIKE ? and l.postid=g.PostcodeId and l.typegitaarid=t.typeID and l.genreid=b.genreid ORDER BY l.id";
                        }
                        else 
                        {
                             $sql = "SELECT l.id,l.naam,l.voornaam,l.postid,l.adres,l.email,l.telefoon,l.typegitaarid,l.genreid,g.PCode,g.PostcodeId,t.typeID,t.typegitaren,b.genreid,b.muziekgenre FROM tbllid l,tblgemeente g,tbltypes t,tblgenre b WHERE l.voornaam LIKE ? and l.postid=g.PostcodeId and l.typegitaarid=t.typeID and l.genreid=b.genreid ORDER BY l.id";
                        }
                        if($stmt = $mysqli->prepare($sql)) 
                        {
                            $stmt->bind_param('s', $zoek);
                            
                            if (isset($_POST["leerling"])) {
                                $zoekertje = $_POST["leerling"];
                            }
                                else
                             {
                                $zoekertje ="";
                            }
                            

                            $zoek = "%".$zoekertje."%";
                            if(!$stmt->execute()) 
                            {
                                echo "het uitvoeren is mislukt: ".$stmt->error."in query ".$sql;
                            }
                            else 
                            {
                                $stmt->bind_result($id,$naam, $voornaam,$postid,$adres,$email,$telefoon,$typegitaarid,$genreid,$PCode,$PostcodeId,$typeID,$typegitaren,$genreid,$muziekgenre);
                                
                                while($stmt->fetch()) 
                                {
                                    echo "<tr><td>".$id."</td><td>". $voornaam ."</td><td>". $naam ."</td><td>".$email."</td><td>".$telefoon."</td><td>".$adres."</td><td>".$PCode."</td><td>".$typegitaren."</td><td>".$muziekgenre."</td><td>";
                    ?>
                                    <form name="form1" method="post" action="admin_pagina_leering_aanpassen.php?action=edit&id=<?php echo $id;?>">
                                        <input class="get-started-btn" type="submit" name="btnedit" id="action" value="Aanpassen" > 
                                    </form>
                    <?php
                                    echo "</td></tr>";
                                }
                            }
                            $stmt->close();
                        }
                        else 
                        {
                            echo "er is een fout in query: ".$mysqli->error;
                        }
                   // }
                }
            ?>
            </div>
            </table>
    </div>      
<br>
<br>
<br>
  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact">
            <h3>Sam De Troyer</h3>
            <p>
              Herfstlaan 16,  <br>
              Merelbeke<br>
              België <br><br>
              <strong>Phone:</strong> +32 497 64 25 46<br>
              <strong>Email:</strong> sam.de.troyer@telenet.be<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">About us</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Services</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="mr-md-auto text-center text-md-left">
        <div class="copyright">
          &copy; Copyright <strong><span>San De Troyer</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/ -->
          Designed by <a href="https://bootstrapmade.com/">Sepp Degroote</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <a href="#" class="back-to-top"><i class="bx bx-up-arrow-alt"></i></a>
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="assets/vendor/jquery/jquery.min.js"></script>
  <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="assets/vendor/jquery.easing/jquery.easing.min.js"></script>
  <script src="assets/vendor/php-email-form/validate.js"></script>
  <script src="assets/vendor/waypoints/jquery.waypoints.min.js"></script>
  <script src="assets/vendor/counterup/counterup.min.js"></script>
  <script src="assets/vendor/owl.carousel/owl.carousel.min.js"></script>
  <script src="assets/vendor/aos/aos.js"></script>

  <!-- Template Main JS File -->
  <script src="assets/js/main.js"></script>

</body>

</html>
