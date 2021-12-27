<?php

    class Nakit{
        private $idNakita;
        private $naziv;
        private $opis;
        private $cena;
        private $slika;
        private $kategorija;


        public function __construct($id=null,$naziv=null,$opis=null,$cena=null,$slika=null,$kategorija=null)
        {
            $this->idNakita=$id;
            $this->naziv=$naziv;
            $this->opis=$opis;
            $this->cena=$cena;
            $this->slika=$slika;
            $this->kategorija=$kategorija;


        }


        public static function vratiSavnakit($conn){
            $upit = "select * from nakit  n inner join kategorija k on k.idKategorije=n.kategorija";
            return $conn->query($upit);
        }

        public static function dodajNakit($nakit, $conn){
            $upit = "insert into nakit(naziv,opis,cena,slika,kategorija) values('$nakit->naziv','$nakit->opis',$nakit->cena,'$nakit->slika',$nakit->kategorija)";
            
            return $conn->query($upit);
        }
        public static function obrisinakit($id, $conn){
            $upit = " delete from nakit where idNakita=$id";
            return $conn->query($upit);
        }
        public static function vratiNakit($id, $conn){
            $upit = " select * from nakit n inner join kategorija k on n.kategorija = k.idKategorije where idNakita=$id";
            return $conn->query($upit);
        }
        public static function azurirajNakit($nakit, $conn){
            $upit = "update nakit set naziv='$nakit->naziv',opis='$nakit->opis',cena=$nakit->cena,slika='$nakit->slika',kategorija=$nakit->kategorija where idNakita = $nakit->idNakita";
            
            return $conn->query($upit);
        }
        

    }












?>