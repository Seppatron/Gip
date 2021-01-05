<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>Sam De Troyer - Index</title>
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
<p>De studenten</p>
                 
 <?php 
    if ((isset($_POST["verzenden"]))&& (isset($_POST["naam"])) && (@$_POST["naam"] != "") &&isset($_POST["voornaam"]) && $_POST["voornaam"] !="" )
    {
        $mysqli= new MySQLi("localhost","root","","databasegip");
        if(mysqli_connect_errno()) 
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
        else
        {
            $sql = "INSERT INTO tbllid (naam,voornaam,adres,email,telefoon,wachtwoord) VALUES (?,?,?,?,?,?)"; 
            if($stmt = $mysqli->prepare($sql)) 
            {     
                $stmt->bind_param('ssssss',$naam,$voornaam,$adres,$email,$telefoon,$wachtwoord);
                $naam = $mysqli->real_escape_string($_POST['naam']) ;
                $voornaam = $mysqli->real_escape_string($_POST['voornaam']);
                $adres = $mysqli->real_escape_string($_POST['adres']);
                $email = $mysqli->real_escape_string($_POST['email']);
                $telefoon = $mysqli->real_escape_string($_POST['telefoon']);
                $wachtwoord = $mysqli->real_escape_string($_POST['wachtwoord']);
                if(!$stmt->execute())
                {
                    echo 'het uitvoeren van de query is mislukt:';
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
   
    
 <script type="text/javascript"> 
        
        function controle()
        {
            var ok = true;
            if (document.getElementById("naam").value=="")
            {
                document.getElementById("naamVerplicht").innerHTML="Gelieve een naam in te vullen";
                ok =false;
            }
            else
            {
                document.getElementById("naamVerplicht").innerHTML="";   
            }
            if (document.getElementById("voornaam").value=="")
            {
                document.getElementById("voornaamVerplicht").innerHTML="Gelieve een voornaam in te vullen";
                ok =false;
            }
            else
            {
                document.getElementById("voornaamVerplicht").innerHTML="";   
            }
            
            if (document.getElementById("adres").value=="")
            {
                document.getElementById("adresVerplicht").innerHTML="Gelieve een adres in te vullen";
                ok =false;
            }
            else
            {
                document.getElementById("adresVerplicht").innerHTML="";   
            }
            if (document.getElementById("email").value=="")
            {
                document.getElementById("emailVerplicht").innerHTML="Gelieve een email in te vullen";
                ok =false;
            }
            else
            {
                document.getElementById("emailVerplicht").innerHTML="";   
            }
            
            if (document.getElementById("telefoon").value=="")
            {
                document.getElementById("telefoonVerplicht").innerHTML="Gelieve een telefoon in te vullen";
                ok =false;
            }
            else
            {
                document.getElementById("telefoonVerplicht").innerHTML="";   
            }
        
            if (document.getElementById("paswoord").value=="")
            {
                document.getElementById("paswoordControle").innerHTML="Gelieve een paswoord in te vullen";
                ok =false;
            }
            else
            {
                var string=document.getElementById("paswoord").value;
                var filter=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
                if (filter.test(string))
                {
                    document.getElementById("paswoordControle").innerHTML="";
                }
                else
                {
                    document.getElementById("paswoordControle").innerHTML="Het paswoord moet minstens 1 cijfer, 1 hoofdletter en 8 karakters bevatten "; 
                    ok =false;
                }
            }
            
            if (document.getElementById("paswoordConfirm").value=="")
            {
                document.getElementById("").innerHTML="Gelieve een bevestegings paswoord in te vullen";
                ok =false;
            }
            else
            {
                var string=document.getElementById("paswoordConfirm").value;
                var filter=/(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}/;
                if (filter.test(string))
                {
                    if ((document.getElementById("paswoordConfirm").value)!=(document.getElementById("paswoord").value))
                    {
                        document.getElementById("paswoordConfirmControle").innerHTML="Het bevestigings paswoord komt niet overeen met het paswoord";
                        ok =false;
                    }
                    else
                    {
                    document.getElementById("paswoordConfirmControle").innerHTML="";
                    }
                    
                }
                else
                {
                    document.getElementById("paswoordConfirmControle").innerHTML="Het paswoord moet minstens 1 cijfer, 1 hoofdletter en 8 karakters bevatten "; 
                    ok =false;
                }  
            }
            
            if ((document.getElementById("paswoordConfirm").value)!=(document.getElementById("paswoord").value))
            {
                document.getElementById("paswoordConfirmControle").innerHTML="Het bevestigings paswoord komt niet overeen met het paswoord";
                ok =false;
            }
            else
            {
                document.getElementById("paswoordConfirmControle").innerHTML="";
            }
            
            
            
            
            if (ok == true)
            {
                document.inlogpagina.submit();
     
            }
            
        }
        
        
    </script>   
    
    
    
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " >
    <h2>Leerling toevoegen</h2>
    <table cellspacing="4">
        <tr>
            <td><label for="naam">Naam:</label></td>
            <td><input type="text" name="naam" id="naam" placeholder="naam" value="<?php if(isset($_POST["naam"])){ echo "$naam";} ?>"/></td>
            <td><label id="naamVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="voornaam">voornaam:</label></td>
            <td><input type="text" name="voornaam" id="voornaam" placeholder="voornaam" value="<?php if ( isset($_POST["voornaam"]))  { echo $voornaam;}  ?> " /></td>
            <td><label id="voornaamVerplicht" class="fout"></label></td>
        </tr>
        <tr>
        <td><label for="Postcode">Postcode:</label></td>
            <td><select name="Postcode">
            <?php
                $mysqli=new MySQLI("localhost","root","","databasegip");

                if (mysqli_connect_errno())
                {
                    trigger_error('Fout bij verbinding: '.$mysqli->error);
                }
                else
                {
                    $sql="select * from tblgemeente";
                    if ($stmt=$mysqli->prepare($sql))
                    {
                        if(!$stmt->execute())
                        {
                            echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.'in query';
                        }
                        else
                        {
                            $stmt->bind_result($Postcodeid,$PCcode,$gemeente,$UCGemeente);
                            while($stmt->fetch())
                            {
                                    echo "<option>".$PCcode."</option>";
                            }
                        }
                        $stmt->close();
                    }
                    else
                    {
                        echo 'Er is een fout in de query: '.$mysqli->error;
                    }
                }
            ?>  
    </select>
        </td>
        </tr>
        <tr>
            <td><label for="adres">adres:</label></td>
            <td><input type="text" name="adres" placeholder="adres" id="adres" value="<?php if ( isset($_POST["adres"]))  { echo $adres;}  ?> " /></td>
            <td><label id="adresVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="email">email:</label></td>
            <td><input type="text" name="telefoon" placeholder="telefoon" id="telefoon" value="<?php if ( isset($_POST["telefoon"]))  { echo $telefoon;}  ?> " /></td>
            <td><label id="emailVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="telefoon">telefoon:</label></td>
            <td><input type="text" name="telefoon" placeholder="telefoon" id="telefoon" value="<?php if(isset($_POST["telefoon"])){echo $telefoon;}?>"/></td>
            <td><label id="telefoonVerplicht" class="fout"></label></td>
        </tr>
        <tr>
        <td><label for="Postcode">Type:</label></td>
            <td><select name="Postcode">
            <?php
                $mysqli=new MySQLI("localhost","root","","databasegip");

                if (mysqli_connect_errno())
                {
                    trigger_error('Fout bij verbinding: '.$mysqli->error);
                }
                else
                {
                    $sql="select * from tbltypes";
                    if ($stmt=$mysqli->prepare($sql))
                    {
                        if(!$stmt->execute())
                        {
                            echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.'in query';
                        }
                        else
                        {
                            $stmt->bind_result($typeID,$typegitaten);
                            while($stmt->fetch())
                            {
                                    echo "<option>".$typegitaten."</option>";
                            }
                        }
                        $stmt->close();
                    }
                    else
                    {
                        echo 'Er is een fout in de query: '.$mysqli->error;
                    }
                }
            ?>  
    </select>
        </td>
        </tr>
        <tr>
            <td><label for="paswoord">paswoord:</label></td>
            <td><input type="password" name="wachtwoord" id="wachtwoord" value="<?php if ( isset($_POST["wachtwoord"]))  { echo $wachtwoord;}  ?> " required/></td>
            <td><label id="paswoordControle" class="fout"></label><label id="paswoordVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td><label for="paswoordConfirm">bevestiging paswoord:</label></td>
            <td><input type="password" name="paswoordConfirm" id="paswoordConfirm"  ></td>
            <td><label id="paswoordConfirmControle" class="fout"></label><label id="paswoordConfirmVerplicht" class="fout"></label></td>
        </tr>
        <tr>
            <td>
                <input type="button" value="inlogen" onclick="controle()" />
                <input type="submit" name="verzenden" id="verzenden" value="Verzenden" />
            </td>
        </tr>
    </table>
</form>
   

<br>
<br>
    <h2>Leerling Zoeken</h2>
    
    <table cellspacing="4">
        <tr>
            <td><label for="verander">Naam van de leerling:</label></td>
            <td><input type="text" name="naam" id="naam" placeholder="naam leerling"/></td>
        </tr>
        <tr>
            <input type="submit" name="verzenden" id="verzenden" value="soeken" />
        </tr>
    </table>
    <br>
    <br>
    <h2>Leerling aanpassen</h2>
    <table cellspacing="4">
        <tr>
            <td><label for="verander">Naam van de te veranderen leerling:</label></td>
            <td><input type="text" name="naam" id="naam"/></td>
        </tr>
    </table>
    <br>
    <table cellspacing="4">
        <tr>
            <td><label for="naam">Naam:</label></td>
            <td><input type="text" name="naam" id="naam" placeholder="naam leerling" /></td>
        </tr>
        <tr>
            <td><label for="voornaam">voornaam:</label></td>
            <td><input type="text" name="voornaam" id="voornaam" placeholder="voornaam"/></td>
        </tr>
        <tr>
            <td><label for="adres">adres:</label></td>
            <td><input type="text" name="adres" placeholder="adres" id="adres"/></td>
        </tr>
        <tr>
            <td><label for="email">email:</label></td>
            <td><input type="text" name="telefoon" placeholder="email" id="telefoon"/></td>
        </tr>
        <tr>
            <td><label for="telefoon">telefoon:</label></td>
            <td><input type="text" name="telefoon" placeholder="telefoon" id="telefoon"/></td>
        </tr>
        <tr>
            <td><label for="paswoord">paswoord:</label></td>
            <td><input type="text" name="wachtwoord" id="wachtwoord" placeholder="wachtwoord" /></td>
        </tr>
        <tr>
            <td><label for="paswoordConfirm">bevestiging paswoord:</label></td>
            <td><input type="password" name="paswoordConfirm" id="paswoordConfirm" placeholder="wachtwoord" ></td>
        </tr>
        <tr>
            <td>
                <input type="submit" name="verzenden" id="verzenden" value="Veranderen" />
            </td>
        </tr>
    </table>
<br>
<br>
<br>   
    
<?php

    $mysqli=new MySQLI("localhost","root","","databasegip");

    if (mysqli_connect_errno())
    {
        trigger_error('Fout bij verbinding: '.$mysqli->error);
    }
    else
    {
        $sql="select * from tbllid";
        if ($stmt=$mysqli->prepare($sql))
        {
            if(!$stmt->execute())
            {
                echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.'in query';
            }
            else
            {
                $stmt->bind_result($id, $oudersid, $naam, $voornaam, $postid ,$adres ,$email, $telefoon, $Wachtwoord ,$typegitaarid ,$voorkeurmuziekgenre );
                while($stmt->fetch())
                {
                    
                }
            }
            $stmt->close();

        }
        else
        {
            echo 'Er is een fout in de query: '.$mysqli->error;
        }
    }
?>
    
    
 <table width="400" border="1">
        <tr>
            <td>
                id   
            </td>
            <td>
                 naam   
            </td>
            <td>
                 voornaam   
            </td> 
        </tr>
            <?php
	if (mysqli_connect_errno())
		{
			trigger_error('Fout bij verbinding: '.$mysqli->error);
		}
		else
		{
			$sql="select * from tbllid";
			if ($stmt=$mysqli->prepare($sql))
			{
				if(!$stmt->execute())
				{
					echo 'Het uitvoeren van de query is mislukt: '.$stmt->error;
				}
				else
				{
					$stmt->bind_result($id, $oudersid, $naam, $voornaam, $postid ,$adres ,$email, $telefoon, $Wachtwoord ,$typegitaarid ,$voorkeurmuziekgenre );
					 while($stmt->fetch())
					{
                         echo "<tr>";
                         echo "<td>$id</td>";
                         echo "<td>$naam</td>";
                         echo "<td>$voornaam</td>";
                         echo "</tr>";
					}
					
				}
				$stmt->close();
			}
			else
			{
				echo 'Er is een fout in de query: '.$mysqli->error;
			}   
		}
?> 

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