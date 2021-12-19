<?php
    include 'config.php';  //ovo dodajemo da bismo imali pristup objektu conn
    session_start();
    //upit za login

	if(isset($_POST["login"])){  //ako je korisnik kliknuo dugme sa name-om login
        //uneti parametri iz forme
        $email = $_POST["email"];
		$lozinka = $_POST["lozinka"];

        //korisnik se uspesno uloguje ukoliko u bazi postoji red tabele koji ima isti email i lozinku kao uneti parametri
        $upit  ="select * from korisnik where email='$email' and lozinka='$lozinka'";
        //izvrsavamo upit
        $rezultat = $conn->query($upit);
       

        if(mysqli_num_rows($rezultat) > 0){ //ako nam se vrati barem jedan red tabele onda znamo da smo u bazi nasli korisnika sa unetim podacima
			
			//ako se korisnik uspesno ulogovao postavicemo superglobalnu promenljivu i poslacemo korisnika na glavnu stranicu
            $_SESSION["prijavljen"] = true;
			header('Location: glavna.php'); 
		}else{
            
			echo '<script>alert("Wrong credentials")</script>';
		}
    }


    //upit za registraciju

            
	if(isset($_POST["register"])){  //ako korisnik klikne dugme sa imenomm register
        //kupimo podatke iz forme
		  $imePrezime = $_POST['signup_imePrezime'];
          $email = $_POST['signup_email'];
          $lozinka = $_POST['signup_lozinka'];
          $lozinka2 = $_POST['signup_confirm_lozinka'];
            if($lozinka==$lozinka2){
                //registracija zapravo znaci unosenje podataka u tabelu
                $upit  ="insert into korisnik (email, imePrezime, lozinka) values('$email', '$imePrezime', '$lozinka')";
                echo $upit;
                //izvrsavamo upit
                $rezultat = $conn->query($upit); //u ovom slucaju ce se ili vratiti false ako je upit neuspesan ili ce se vratiti poruka npr 1 row inserted
                if($rezultat){//ako se ne vrati false korisnik je uspesno registrovan
                    echo '<script>alert("Uspesno")</script>';
                    $_SESSION["prijavljen"] = true;
                    header('Location: glavna.php'); //ako se korisnik uspesno registrovao smatracemo da je odmah i  ulogovan
                } else{
                    echo '<script>alert("Neuspesna registracija")</script>';
                }



           }
    }
		  
		 
	 
	 
			 
		
 



?>