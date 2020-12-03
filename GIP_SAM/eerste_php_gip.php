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
                    echo $oudersid."-".$naam."-".$voornaam.'<br>';
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