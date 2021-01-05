<?php
    if ((isset($_POST["verzenden"])) && (isset($_POST["tezoeken"])) && (@$_POST["tezoeken"] != "")  )
    {
        $mysqli= new MySQLi("localhost","root","","leerphp");
        if(mysqli_connect_errno()) 
        {
            trigger_error('Fout bij verbinding: '.$mysqli->error); 
        }
        else    
        {                       
            $sql = "UPDATE tblproductenSET productnaam = ?,omschrijving= ?,prijs =  ?WHERE productid = ?" ;  
            if($stmt = $mysqli->prepare($sql)) 
            {   
                $stmt->bind_param('ssii',$productnaam,$omschrijving,$prijs,$productid);
                $productnaam = $mysqli->real_escape_string($_POST['naam']) ;
                $productid = $mysqli->real_escape_string($_POST['tezoeken']) ; 
                $omschrijving = $mysqli->real_escape_string($_POST['omschrijving']) ; 
                $prijs = $mysqli->real_escape_string($_POST['prijs']) ; 
                if(!$stmt->execute())
                { 
                    echo 'het uitvoeren van de query is mislukt:';
                }
                else  
                { 
                    echo 'Het updaten is gelukt'; }$stmt->close();
            }
            else
            {      
                echo 'Er zit een fout in de query';    
            }
        }
    }
?>

<?php 
    $mysqli= new MySQLi("localhost","root","","leerphp");
    if(mysqli_connect_errno()) 
    {
        trigger_error('Fout bij verbinding: '.$mysqli->error); 
    }
    else
    { 
        $sql= "select * from tblproducten";
        if($stmt = $mysqli->prepare($sql)) 
        {  
            if(!$stmt->execute()) 
            { 
                echo 'Het uitvoeren van de query is mislukt: '.$stmt->error.' in query: '.$sql; 
            }  
            else 
            { 
                $stmt->bind_result($productid, $productnaam, $omschrijving, $prijs, $toegevoegdop); 
                while($stmt->fetch()) 
                { 
                    echo $productid.'-'.$productnaam.'-'.$omschrijving.'-'.$prijs.'<br>'; 
                } 
            } 
            $stmt->close(); 
        } 
        else 
        { 
            echo 'Er zit een fout in de query: '.$mysqli->error; 
        } 
    }
?>

<form id="form1" name="form1" method="post" action="<?php echo $_SERVER['PHP_SELF']; ?> " >
    <p>Updaten van artikelen in de tabel tblproducten</p>
    <p>Te wijzigen artikelnummer <input type="text" name="tezoeken" id="tezoeken"></p><p>De mogelijk te wijzigen waarden voor het gekozen artikel</p><p>naam:<input type="text" name="naam" id="naam"  /></p><p>Omschrijving:<textarea name="omschrijving" id="omschrijving" cols="45" rows="5">   </textarea></p><p>prijs:<input type="text" name="prijs" id="prijs"  value="" /></p><p>&nbsp;</p><p><input type="submit" name="verzenden" id="verzenden" value="Verzenden" /><input type="reset" name="wissen" id="wissen" value="wissen" /></p><p>&nbsp;</p></form>




