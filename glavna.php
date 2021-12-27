<?php
    include 'config.php'; //moramo zbog $conn
    include 'model/nakit.php'; //moramo zbog klase Nakit
    include 'model/kategorija.php';
    //da bismo mogli da prikazemo sav nakit u tabeli moramo da prvo procitamo sve podatke o svom nakitu iz baze
    $savNakit = Nakit::vratiSavnakit($conn); //rezultat ovog upita cemo prikazati u tabeli dole
  
    $kategorije = Kategorija::vratiSveKategorije($conn); //potrebno da bismo mogli da ucitamo sve kategorije u modalu za izmenu 

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
    <link rel="stylesheet" href="css/style.css">
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

        <center><h1>Dobrodosli u nasu ponudu!</h1></center>
        <br>
        <!-- Ovde cemo imati tabelu koja ce sadrzati sav nakit koji posedujemo -->
        <div      style="margin-left: 25%;margin-right: 25%;">                    
                        <input type="search" id="pretraga" class="form-control"    onkeyup="pretragaPoImenu()"    placeholder="Search.." />
                       
                    
                      
                      
                      <button type="button" class="btn btn-warning"  onclick="sortiraj()">Sortiraj<i class="fa fa-sort" aria-hidden="true" ></i></button>
                      <select name="kriterijum" id="kriterijum" class="criteria">
                          <option value="price">Cena</option> 
                          <option value="name">Naziv</option>
                    </select>


                  
                 
          </div>
        <div class="container">
             
        <!-- Ovde cemo imati tabelu koja ce sadrzati sav nakit koji posedujemo -->
            <br><br>
            <table class="table" id="tableNakit">
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
                        <td> <img src="<?php  echo "images/".$red['slika'];?>" alt="" srcset="" style="width: 180px;height: auto;">  </td>
                        <td style="text-align:center">  <?php   echo $red['nazivKategorije'];        ?> </td>
                        <td>   

                        <form  method="post">
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#editModal" onclick="azurirajNakit(<?php echo   $red['idNakita'];?>)"     >    <i class="fas fa-pencil-alt"></i> </button> 
                            <button type="button" class="btn btn-danger"    ><i class="fas fa-trash" onclick="obrisinakit(<?php echo   $red['idNakita'];?>)"></i></button>  
                            <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#profileModal"  onclick="prikaziNakit(<?php echo   $red['idNakita'];?>)" >  <i class="far fa-id-card"></i></a></button>   </td>
                        </form>
                        </td>
                    

                    </tr>
                    

                    <?php endwhile;?>
                </tbody>
                </table>
                
        </div>



        <!-- Profile modal -->

       <!--Modal: PROFILE-->
       <div class="modal fade" id="profileModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
            <!--Content-->
            <div class="modal-content">

            <!--Header-->
            <div class="modal-header" >
                <img src="" alt="avatar" id="slikaPreview" class="rounded"  style="margin-left: auto;margin-right: auto; width: 180px;height: auto;"  >
            </div>
            <!--Body-->
            <div class="modal-body text-center mb-1">

                <h5 class="mt-1 mb-2" id="nazivPreview"></h5>

                <div class="md-form ml-0 mr-0" style="text-align: center;">
                <p id="opisPreview">   </p>
                <i id="cenaPreview" class="fa fa-tag"  aria-hidden="true"></i>
                    <br>
            
                </div>

        <div class="text-center mt-4">
           


        </div>
      </div>


      <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
         
        </div>




    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login with Avatar Form-->



<!-- edit form modal -->
<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel"
  aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Izmena nakita</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
     


      <form   class="sign-in-form" id="editform" name="editform" method="POST" enctype="multipart/form-data" >
        <div class="modal-body">
           
      

        
         
        <div class="input-field">
            <i class="fa fa-diamond"></i>
            <input type="text" placeholder="Naziv.." name="nazivEdit" id="nazivEdit" required />
        </div>
        <div class="input-field">
            <i class="fa fa-pencil"></i>
            <input type="text" placeholder="Opis.." name="opisEdit" id="opisEdit" required />
        </div>
        <div style="font-size:20px" >
            <label for="kategorijeEdit">Odaberi kategoriju</label>
            <select name="kategorijeEdit" id="kategorijeEdit">
            <?php
                 
                while($red = $kategorije->fetch_array()): 
                ?>
                  <option value=<?php echo $red["idKategorije"]?>><?php echo $red["nazivKategorije"]?></option> 

                <?php   endwhile;   ?>
            </select>
        </div>
        <div class="input-field">
            <i class="fas fa-tag"></i>
            <input type="text" placeholder="Cena.." name="cenaEdit" id="cenaEdit" required />
        </div>
       <br>
     
        <div style="font-size:20px;margin:0px">
            <p> Odaberi sliku proizvoda</p>
            
            <input type="file" class="form-control" id="slikaNakitaEdit" name="slikaNakitaEdit"    >

         
 
       
            <!-- Dodajemo ovde jedno skriveno polje da bismo sacuvali id nakita koji azuriramo da bismo kasnije taj id mogli da koristimo u edit.php -->
            <input type="hidden" name="sakrivenoPoljeID" id="sakrivenoPoljeID" readonly>


            <!-- Dodajemo jos jedno skriveno polje u kom cemo samo cuvati putanju do slike  -->
            <input type="hidden" name="sakrivenoPoljeSLIKA"   id="sakrivenoPoljeSLIKA" readonly>
    



        </div> 

        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-success" id="editButton" >Submit</button> 
        </div>
 

      </form>
    </div>
  </div>
</div>
<!-- edit form modal end -->


























        <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>
     
   
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
      <script src="js/main.js"></script>
</body>
</html>