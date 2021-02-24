<?php
    if ((isset($_GET["actie"]) && $_GET["actie"] == "wis") && (isset($_GET["betalingsnr"])) )
    {
        $mysqli= new MySQLi ("localhost","root","","toetsprepared");
        if(mysqli_connect_errno()) 
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
         $sql = " delete from tblboetes WHERE betalingsnr = ?" ;
         if($stmt = $mysqli->prepare($sql))
         { 
             $stmt->bind_param('i',$betalingsnr);
             $betalingsnr= $_GET["betalingsnr"];
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
            echo 'Er zit een fout in de query';
         }
     }
?> 
<form method="post" action="toets-php-databanken.php">
    <h1>zoeken</h1>
<label for="spelersnr"><b>spelersnr</b></label>
      <input type="text" placeholder="Enter spelersnr" name="spelersnr">
    <button type="submit" class="btn btn-default" name="btnzoeken">submit</button>
     <br><br>
</form>
<?php
    print_r($_GET);
    print_r($_POST);
    $mysqli= new MySQLi ("localhost","root","","toetsprepared");
    if(mysqli_connect_errno()) 
    {
        trigger_error('Fout bij verbinding: '.$mysqli->error); 
    }
    else 
    {
        $sql = "SELECT spelersnr, datum, bedrag, betalingsnr FROM tblboetes WHERE spelersnr LIKE ? ORDER BY spelersnr";
        if($stmt = $mysqli->prepare($sql))
        { 
            $stmt->bind_param('s', $zoek);
            if (isset($_POST["spelersnr"] ) && $_POST["spelersnr"] != "") 
            {
                $zoek = $mysqli->real_escape_string("%".$_POST["spelersnr"]) . "%";
            }
            else 
            {
                $zoek ="%";    
            }
        if(!$stmt->execute()) 
        {
            echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql;
        } 
            else 
            {
                $stmt->bind_result($spelersnr, $datum, $bedrag, $betalingsnr);
            ?> 
<div class="table" id="table"> 
    <?php
     echo ' <br>
            <br>
                <table border="1"> 
                <tr>
                    <th>betalingsnr</th> 
                    <th>spelersnr</th> 
                    <th>datum</th>
                    <th>bedrag</th>
                    <th>Wis</th>
                    <th>update</th>
                </tr>';
     while($stmt->fetch())
     { 
         $teverwijderen = $betalingsnr;
        echo '<tr> <td> ' .$teverwijderen . " </td><td> " . $spelersnr. "</td><td> " .
        $datum. "</td><td>" . $bedrag. "</td><td>";
     //}
    ?>
    </div>
<form name="formwis" method="post" action="<?php echo
$_SERVER['PHP_SELF']?>?actie=wis&betalingsnr=<?php echo $teverwijderen ; ?> ">
<input type="submit" name="btnwissen" id="wis" value="wis">
</form>

<?php
  echo "</td><td>"
  
?>

<form name="formupdate" method="post" action="toetsphpupdate.php?actie=update&betalingsnr=<?php echo $teverwijderen ; ?> ">
<input type="submit" name="btnupdate" id="update" value="update">
</form>
<?php
  echo "</td>"
  
?>

<?php


  
 }
        echo "</table>";
 }
 $stmt->close();
} else { echo 'Er zit een fout in de query: '.$mysqli->error;
} }

?>