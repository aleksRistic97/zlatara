 
<?php
    include '../config.php';
    include '../model/nakit.php'; 
    
 
 
    if(isset($_POST['prikazid']) ){
        
        $rez = Nakit::vratiNakit($_POST['prikazid'],$conn);
    
        $response = array();
        while($red=mysqli_fetch_assoc($rez)){
            $response[] = $red;
        }
       
        echo json_encode($response[0]);

    }else{
        
        $response['status']=200;  
        $response['message']="Data not found";
    }

    if(  isset($_POST['azurirajid'])){
        
        $rez = Nakit::vratiNakit($_POST['azurirajid'],$conn);
    
        $response = array();
        while($red=mysqli_fetch_assoc($rez)){
            $response[] = $red;
        }
       
        echo json_encode($response[0]);
       
    }else{
        
        $response['status']=200; //status OK
        $response['message']="Data not found";
    }
   







?>
 
