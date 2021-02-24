<?php 
    print_r($_POST);
    print_r($_GET);
?>
    <?php 
        session_start();
        if(! isset($_POST["verzend"]))
        {
            $_SESSION["betalingsnr"] = $_GET["betalingsnr"];
        }
    ?>
<?php
 if(isset($_POST["verzend"]) ) 
 {
        $mysqli = new MySQLi("localhost", "root", "", "toetsprepared");
        if(mysqli_connect_errno()) 
        {
            trigger_error("fout bij verbinding: ".$mysqli->error);
        }
        else 
        {
            $sql = "UPDATE tblboetes SET bedrag = ?, datum = ? WHERE betalingsnr = ?";
            $sql1= "select bedrag, datum, betalingsnr from tblboetes";
            if($stmt = $mysqli->prepare($sql)) 
            {
                $stmt->bind_param('isi', $bedrag, $datum, $betalingsnr);
                $datum = $mysqli->real_escape_string($_POST["datum"]);
                $betalingsnr = $mysqli->real_escape_string($_SESSION["betalingsnr"]);
                $bedrag = $mysqli->real_escape_string($_POST['bedrag']);
        
                if (!$stmt->execute())
                {
                   echo 'het uitvoeren van de query is mislukt 111111:';
                }
                else 
                { 
                    echo 'Het updaten is gelukt'; 
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
<?php
    $mysqli = new MySQLi("localhost", "root", "", "toetsprepared");
    if(mysqli_connect_errno()) 
    {
            trigger_error("fout bij verbinding: ".$mysqli->error);
    }
    else 
    {            
        $sql = "SELECT betalingsnr, bedrag, datum FROM tblboetes where betalingsnr= ?"; 
        if( $stmt = $mysqli->prepare($sql))
        {
            $stmt->bind_param('i', $betalingsnr);
            $betalingsnr = $mysqli->real_escape_string($_SESSION["betalingsnr"]);
            if(!$stmt->execute()) 
            {
                echo 'Het uitvoeren van de query is mislukt2: '.$stmt->error.' in query: '.$sql;
            } 
            else 
            {
                $stmt->bind_result($betalingsnr, $bedrag,$datum);
                if(!$stmt->execute()) 
                {
                    echo "het uitvoeren van de query is mislukt3: ".$stmt->error." in query ".$sql;
                }
                else 
                {
                    $stmt->bind_result($betalingsnr, $bedrag, $datum);
                    while($stmt->fetch()) 
                    {
                        echo $betalingsnr." ".$bedrag."<br>";
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
<head>
</head>
<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> "  >
    <div>
    <h1>updaten</h1>
    <p>Updaten van artikelen in de tabel tblboetes</p>
    <p>
        Te wijzigen betalingsnr
        <?php 
        
        echo $_SESSION["betalingsnr"];
        ?>
    </p>
    <p>De mogelijk te wijzigen waarden voor de speler</p>
    <p>
        bedrag:
        <input type="text" name="bedrag" id="bedrag"  value= "<?php echo $bedrag; ?>" />
    </p>
    <p>
        datum:
        <input name="datum" id="datum"  value= <?php echo $datum; ?> /> 
    </p>
    <p>
        
    </p>
    <p>&nbsp;</p>
    <p>
        <input type="submit" name="verzend" id="verzend" value="Verzend" />
        <input type="reset" name="wissen" id="wissen" value="wissen" /> <br>
       <a href="toets-php-databanken.php"> ga terug naar het overzicht hier </a>
    </p>
    <p>&nbsp;</p>
        </div>
</form>