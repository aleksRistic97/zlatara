<?php
    include '../config.php';
    include '../model/nakit.php'; 

    
    if ( isset($_POST['naziv']) && isset($_POST['opis']) && isset($_POST['cena'])   ) {
        
        $filename = $_FILES["slikaNakita"]["name"];
        $tempname = $_FILES["slikaNakita"]["tmp_name"];    
        $folder = "../images/".$filename;

        

        move_uploaded_file($tempname, $folder);

      $nakit = new Nakit(null,$_POST['naziv'],$_POST['opis'],$_POST['cena'],$filename,$_POST['kategorije']);
  
       
        $status=Nakit::dodajNakit($nakit,$conn);
        
        
            
            if($status){
                
                echo 'Success';
            }else{
                echo $status;
                echo 'Failed';
            }



      }else{
          echo "CCCCC";
      }
 




?>