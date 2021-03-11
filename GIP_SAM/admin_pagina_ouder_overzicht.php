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
    .fout 
    {
        color: #F00;
        }
    </style>
<script type="text/javascript"> 
        function toevoegen()
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

	$_POST["toevoegen"]="goed";
	}
	?>
       
    document.form3.submit();
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
    <?php 
    if ((isset($_POST["toevoegen"])) && (isset($_POST["naam"])) && ($_POST["naam"] != "") &&isset($_POST["voornaam"]) && $_POST["voornaam"] !="")
    {
        $mysqli= new MySQLi("localhost","root","","databasegip");
        if(mysqli_connect_errno()) 
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
        else
        {  
           $sql = "INSERT INTO tbloudersperleerling (naam,voornaam,ouderemail,oudertelefoon) VALUES (?,?,?,?)"; 
            if($stmt = $mysqli->prepare($sql)) 
            {     
                $stmt->bind_param('ssss', $naam, $voornaam,$ouderemail,$oudertelefoon);
                $naam = $mysqli->real_escape_string($_POST['naam']) ;
                $voornaam = $mysqli->real_escape_string($_POST['voornaam']);
                $ouderemail = $mysqli->real_escape_string($_POST['email']);
                $oudertelefoon = $mysqli->real_escape_string($_POST['telefoon']);
                if(!$stmt->execute())
                {
                    echo 'het uitvoeren van de query insert is mislukt:';
                }
                else 
                {  
                    echo 'Het invoegen is gelukt'; 
                    
                }
                $stmt->close();
            }
            else
            {
                echo 'Er zit een fout in de query'; 
            }
            
         
        }
    }
?> 
    <form id="form3" name="form3" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " >
    <h2>Ouder toevoegen</h2>
    <table cellspacing="4">
        <tr>
            <td><label for="voornaam">voornaam:</label></td>
            <td><input type="text" name="voornaam" id="voornaam" placeholder="voornaam" required/></td>
            <td><label id="voornaamVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="naam">Naam:</label></td>
            <td><input type="text" name="naam" id="naam" placeholder="naam" required/></td>
            <td><label id="naamVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="email">email:</label></td>
            <td><input type="text" name="email" placeholder="email" id="email"/></td>
            <td><label id="emailVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="telefoon">telefoon:</label></td>
            <td><input type="text" name="telefoon" placeholder="telefoon" id="telefoon" required/></td>
            <td><label id="telefoonVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td>
                <input class="get-started-btn" type="submit" name="toevoegen" id="toevoegen" value="toevoegen" />
            </td>
        </tr>
    </table>
</form>   
    
 <?php
    if ((isset($_GET["actie"]) && $_GET["actie"] == "wis") && (isset($_GET["oudersid"])))
    {
        $mysqli= new MySQLi("localhost","root","","databasegip");
        if(mysqli_connect_errno())
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
        $sql = "delete from tbloudersperleerling WHERE oudersid = ?";   
        if
            ($stmt = $mysqli->prepare($sql)) 
        {   
            $stmt->bind_param('i',$oudersid);
            $oudersid= $_GET["oudersid"]; 
            if(!$stmt->execute())
            {
                echo 'het uitvoeren van de query is mislukt:';
            }
            else  
            { 
                echo 'Het deleten is gelukt'; 
            }
            $stmt->close();
        }
        else
        {
            echo 'Er zit een fout in de query'.$mysqli->error;
        }
    }
?>  
<h2>Ouder kiezen</h2>
    <table width="100%" border="1" >
        <tr>
            <td>ID</td>
            <td>Naam</td>
            <td>Voornaam</td>
            <td>E-mail</td> 
            <td>Telefoon</td> 
            <td>Verwijderen</td> 
            <td>Aanpassen</td> 
        </tr>
        <div>
            <?php 
                $mysqli= new MySQLi("localhost","root","","databasegip");
                if(mysqli_connect_errno()) 
                {
                    trigger_error('Fout bij verbinding: '.$mysqli->error); 
                }
                else
                {
                    $sql= "select * from tbloudersperleerling";
                    if($stmt = $mysqli->prepare($sql)) 
                    {  
                        if(!$stmt->execute())     
                        { 
                            echo 'Het uitvoeren van de query is mislukt:'.$stmt->error.' in query: '.$sql;
                        } 
                        else      
                        { 
                            $stmt->bind_result($oudersid, $naam, $voornaam, $ouderemail, $oudertelefoon); 
                            while($stmt->fetch()) 
                            { 
                               $teverwijderen = $oudersid;
                                echo '<tr>
                                        <td>'.$teverwijderen."</dt>
                                        <td>".$naam."</td>
                                        <td>".$voornaam."</td>
                                        <td>".$ouderemail."</td>
                                        <td>".$oudertelefoon.'</td>
                                    <td>';
?>
<form name="form2" method="post" action="<?php echo $_SERVER['PHP_SELF']?>?actie=wis&oudersid=<?php echo $teverwijderen ; ?> ">
    <input class="get-started-btn" type="submit" name="btnwissen" id="wis" value="wis">
</form>
<?php 
                    echo "</td>";
                    echo "<td>";
?>
<form name="form1" method="post" action="admin_pagina_ouder_aanpassen.php?action=edit&oudersid=<?php echo $oudersid;?>">
    <input class="get-started-btn" type="submit" name="btnedit" id="action" value="Aanpassen">
</form>
<?php 
                    echo "</td>";
                    echo "</tr>";
                } 
            } $stmt->close(); 
        }  
        else  
        {    
            echo 'Er zit een fout in de query: '.$mysqli->error; 
        } 
    }
?>
            </div>
            </table>    
   
<br>
<br>  
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