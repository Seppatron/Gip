<?php 
        session_start();  
        if( isset($_GET["oudersid"]))
        {
      
            $_SESSION["oudersid"] = $_GET["oudersid"];
        }
    ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Admin - ouder aanpassen</title>
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
    .fout 
    {
        color: #F00;
        }
    </style>
    <script type="text/javascript"> 
        function aanpassen()
{
    var ok = true;
    if (document.getElementById("naam").value=="")
    {
        document.getElementById("naamVerplicht").innerHTML="Gelieve een naam in te vullen";
        ok=false;
    }
    else
    {
        document.getElementById("naamVerplicht").innerHTML="";
    }
    if (document.getElementById("voornaam").value=="")
    {
        document.getElementById("voornaamVerplicht").innerHTML="Gelieve een voornaam in te vullen";
        ok=false;
    }
    else
    {
        document.getElementById("voornaamVerplicht").innerHTML="";
    }
    if (document.getElementById("telefoon").value=="")
    {
        document.getElementById("telefoonVerplicht").innerHTML="Gelieve een telefoonnummer in te vullen";
        ok=false;
    }
    else
    {
        document.getElementById("telefoonVerplicht").innerHTML="";
    }
    
    if (document.getElementById("email").value=="")
    {
        document.getElementById("emailVerplicht").innerHTML="Gelieve een email in te vullen";
        ok=false;
    }
    else
    {
        document.getElementById("emailVerplicht").innerHTML="";
    }
    if (document.getElementById("email").value != "") 
    {
        var string=document.getElementById("email").value;
        var filter= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        if ( filter.test(string))
        {
         document.getElementById("emailVerplicht").innerHTML="";
        }
        else
        {
             document.getElementById("emailVerplicht").innerHTML="Ongeldig email adres";
            ok=false;
        }
     }
    if (ok==true){
     <?php
	
	if (isset($_POST["naam"]) && $_POST["naam"] != "") {

	$_POST["verzenden"]="goed";
	}
	?>
       
   // document.form1.aanpassen();
}
}
</script>

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
            <li class="active"><a href="admin_index.php">Admin</a></li>

        </ul>
      </nav><!-- .nav-menu -->

      <a href="login.php" class="get-started-btn">Inloggen</a>

    </div>
  </header><!-- End Header -->
<br>
<br>
<br>
<br>
    <a href="admin_pagina_ouder_overzicht.php" class="get-started-btn">Terug</a>
<br>
<br>
<br>

<?php
    $mysqli = new MySQLi("localhost", "root", "", "databasegip");
    if(mysqli_connect_errno()) 
    {
            trigger_error("fout bij verbinding: ".$mysqli->error);
    }
    else 
    {            
        $sql = "select * from tbloudersperleerling where oudersid= ?"; 
        if( $stmt = $mysqli->prepare($sql))
        {
            $stmt->bind_param('i', $oudersid);
            $oudersid = $mysqli->real_escape_string($_SESSION["oudersid"]);
            if(!$stmt->execute()) 
            {
                echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
            } 
            else 
            {
                $stmt->bind_result($oudersid, $naam, $voornaam, $ouderemail, $oudertelefoon);
                if(!$stmt->execute()) 
                {
                    echo "het uitvoeren van de query is mislukt: ".$stmt->error." in query ".$sql;
                }
                else 
                {
                    $stmt->bind_result($oudersid, $naam, $voornaam, $ouderemail, $oudertelefoon);
                    while($stmt->fetch()) 
                    {
                        echo $naam." ".$voornaam." ".$ouderemail." ".$oudertelefoon."<br>";
                    }
                    echo " gelukt";
                }
                $stmt->close();
            }
            
            }
            else {
                echo "er zit een fout in de query";
            }
        }
?>
<?php 
    if ((isset($_POST["verzenden"]))&& (isset($_POST["naam"])) && ($_POST["naam"] != "") &&isset($_POST["voornaam"]) && $_POST["voornaam"] !="")
    {
        
        echo "hier";
        $mysqli= new MySQLi("localhost","root","","databasegip");
        if(mysqli_connect_errno()) 
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
        else
        {  
            $sql= "UPDATE tbloudersperleerling SET naam = ?,voornaam= ?,ouderemail= ?,oudertelefoon= ? WHERE oudersid = ?";
            if ($stmt=$mysqli->prepare($sql))
            {
                $stmt->bind_param('ssssi', $naam, $voornaam, $ouderemail, $oudertelefoon,$oudersid);
                $naam = $mysqli->real_escape_string($_POST['naam']) ;
                $voornaam = $mysqli->real_escape_string($_POST['voornaam']);
                $ouderemail = $mysqli->real_escape_string($_POST['email']);
                $oudertelefoon = $mysqli->real_escape_string($_POST['telefoon']);
                $ouderid= $_SESSION["oudersid"];
                if(!$stmt->execute())
                {
                    echo 'Het uitvoeren van de query is mislukt:';
                }
                else
                {
                    echo 'het aanpassen is gelukt';
                }
                   $stmt->close();
            }
            else
            {
                echo 'Er zit een fout in de query '.$mysqli->error; 
            }
        }
    }
?>
    <form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> "  >
    <h2>Ouder aanpassen</h2>
    <table cellspacing="4">
        <tr>
            <td><label for="voornaam">voornaam:</label></td>
            <td><input type="text" name="voornaam" id="voornaam" placeholder="voornaam" value= "<?php echo $voornaam; ?>" /></td>
            <td><label id="voornaamVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="naam">Naam:</label></td>
            <td><input type="text" name="naam" id="naam" value= "<?php echo $naam; ?>"/></td>
            <td><label id="naamVerplicht" class="fout"></label></td>
        </tr>  
        <tr>
            <td><label for="email">email:</label></td>
            <td><input type="text" name="email" placeholder="email" id="email" value= "<?php echo $ouderemail; ?>"/></td>
            <td><label id="emailVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="telefoon">telefoon:</label></td>
            <td><input type="text" name="telefoon" placeholder="telefoon" id="telefoon" value= "<?php echo $oudertelefoon; ?>"/></td>
            <td><label id="telefoonVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td>
               <!-- <a class="get-started-btn" type="button" name="verzenden" id="verzenden" value="Verzenden"  onClick="aanpassen()">Ouder aanpassen</a>  -->
              
                <input class="get-started-btn" type="submit" name="verzenden" id="verzenden" value="verzenden"> 
            </td>
        </tr>
    </table>
<br>
<br>
<br>   
    </form>

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
          <!--  -->
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