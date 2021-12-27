<?php

    include "config.php";
     
    if (!isset ($_GET["signup_email"])){
         echo "Parametar email nije prosleđen!";
    } else {
        $email=$_GET["signup_email"];


   
        $rezultat = $conn->query("SELECT * FROM korisnik WHERE email='$email'");
        if ($rezultat->num_rows!=0){
            echo "0";
        } else {
            echo "1";
        }
     
    }
?>
