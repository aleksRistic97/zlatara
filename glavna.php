<?php
    include 'config.php'; //moramo zbog $conn
    include 'model/nakit.php'; //moramo zbog klase Nakit
    //da bismo mogli da prikazemo sav nakit u tabeli moramo da prvo procitamo sve podatke o svom nakitu iz baze
    $savNakit = Nakit::vratiSavnakit($conn); //rezultat ovog upita cemo prikazati u tabeli dole
 

    
   

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pocetna</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
   <style>
        
        /* Modify the background color navbara */
         
        .navbar-custom {
            background-color:  #ff6fb7;
        }
        /* Modify brand and text color navbara */
         
        .navbar-custom .navbar-brand,
        .navbar-custom .navbar-text {
            color: Black;
        }

    </style>
</head>
<body  >
      <!-- Image and text -->
  <nav class="navbar navbar-custom"  >
    <a class="navbar-brand" href="#">
        <img src="images/diamond.png" width="30" height="30" class="d-inline-block align-top" alt="">
        Zlatara <strong> <i>
            Silver
        </strong></i>
    </a> 
    <div>
        <a class="nav-link" href="dodajnovinakit.php" style="color:black;text-decoration: none;float:left"><strong>Dodaj nov nakit</strong> </a>
        <a   class="nav-link" href="odjava.php" style="color:black;text-decoration: none;float:right">Odjava</a>
    </div>
    </nav>
        <br><br><br>


        <!-- Ovde cemo imati tabelu koja ce sadrzati sav nakit koji posedujemo -->
        <div class="container">
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Naziv</th>
                    <th scope="col">Opis</th>
                    <th scope="col">Cena</th>
                    <th scope="col">Slika</th>
                    <th scope="col">Kategorija</th>
                    <th scope="col">Opcije</th>



                    </tr>
                </thead>
                <tbody>

                    <?php
                        while($red = $savNakit->fetch_array()): 
                    ?>

                    <tr>
                    <th  >   <?php   echo $red['idNakita'];        ?>     </th>
                    <td> <?php   echo $red['naziv'];        ?> </td>
                    <td style="max-width: 200px;"> <?php   echo $red['opis'];        ?> </td>
                    <td>  <?php   echo $red['cena'];        ?> </td>
                    <td> <img src="<?php  echo "images/".$red['slika'];?>" alt="" srcset="" style="width: 120px;height: auto;">  </td>
                    <td>  <?php   echo $red['nazivKategorije'];        ?> </td>
                    <td>   

                    <form  method="post">
                        <button type="button" class="btn btn-success"       >   <a href="izmeninakit.php" style="text-decoration: none;color:white";><i class="fas fa-pencil-alt"></i></a></button> 
                        <button type="button" class="btn btn-danger"    ><i class="fas fa-trash" onclick="obrisinakit(<?php echo   $red['idNakita'];?>)"></i></button>  
                        <button type="button" class="btn btn-warning" onclick="prikaziNakit(<?php echo   $red['idNakita'];?>)" ><a href="prikazNakita.php"  style="text-decoration: none;color:white";> <i class="far fa-id-card"></i></a></button>   </td>
                    </form>
                    </td>


                    </tr>
                    

                    <?php endwhile;?>
                </tbody>
                </table>
                
        </div>



        <!-- Profile modal -->































        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="js/main.js"></script>
</body>
</html>