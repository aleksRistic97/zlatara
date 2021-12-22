<?php
    class Kategorija{
        private $idKategorije;
        private $nazivKategorije; 

        public function __construct($idKategorije=null, $nazivKategorije=null){
            $this->idKategorije=$idKategorije;
            $this->nazivKategorije=$nazivKategorije; 
        }
        public static function vratiSveKategorije($conn){
            $upit = "select * from kategorija";
            return $conn->query($upit);
        }







        

    }
    

   



?>