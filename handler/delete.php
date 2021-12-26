<?php
    include '../config.php';
    include '../model/nakit.php'; 

    if(isset($_POST['deleteid'])){
        $status=Nakit::obrisinakit($_POST['deleteid'],$conn);
        if ($status){
            echo "Success";
        }else{
            echo "Failed";
        }
    }

?>