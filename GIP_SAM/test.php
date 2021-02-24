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
    <input type="submit" name="btnwissen" id="wis" value="wis">
</form>
<?php 
                    echo "</td>";
                    echo "<td>";
?>
<form name="form1" method="post" action="admin_pagina_ouder_aanpassen.php?action=edit&oudersid=<?php echo $oudersid;?>">
    <input type="submit" name="btnedit" id="action" value="Aanpassen">
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