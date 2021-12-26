<?php
    include '../config.php';
    include '../model/nakit.php'; 
   
    if ( isset($_POST['nazivEdit']) && isset($_POST['opisEdit']) && isset($_POST['cenaEdit'])   ) {
     

        //kada azuriamo neku odecu slika je opciona, pa cemo ovo raditi samo ako je korisnik postavio novu sliku
        if($_FILES["uploadfileEdit"]["name"]!=""){ //ovako znamo da korisnik nije nista uneo
            $filename = $_FILES["uploadfileEdit"]["name"];
           
            $tempname = $_FILES["uploadfileEdit"]["tmp_name"];    
            $folder = "../images/".$filename;
            move_uploaded_file($tempname, $folder);
        }else{
           
            //slika ostaje ono sto je i bila, ovaj podatak cemo citati iz skrivenog polja
            $filename = $_POST['sakrivenoPoljeSLIKA'];
           
        }
        

                

            $nakit = new Nakit(null,$_POST['nazivEdit'],$_POST['opisEdit'],$_POST['cenaEdit'],$filename,$_POST['kategorijeEdit']);
            
                
            $status=Nakit::dodajNakit($nakit,$conn);
              
        
            
            if($status){
                
                echo 'Success';
            }else{
                echo 'Failed';
            }



      }
 




?>