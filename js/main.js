
 $('#dodajNoviProizvod').submit(function () {
alert("AA");
    var form = $('#dodajNoviProizvod')[0];
    console.log(form);
    var formData = new FormData(form);
    event.preventDefault();  
    console.log(formData);

    request = $.ajax({  
        url: 'handler/add.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });
    console.log(request);
    request.done(function (response, textStatus, jqXHR) {
        console.log(textStatus);
        console.log(jqXHR);
      console.log(response);

        if (response === "Success") {
            alert("Uspesno dodato");
            
            location.reload(true);
        }
        else {
       
            console.log("Neuspesno" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
}); 


function prikaziNakit(prikazid){
     alert(prikazid);
    request = $.ajax({
        url: 'handler/get.php',
        type: 'post',
        data: { 'prikazid': prikazid },
        dataType: 'json'
    });
    console.log("J");
    alert(prikazid);
    console.log(request);
    alert(prikazid);
    request.done(function (response, textStatus, jqXHR) {
        console.log(prikazid);
        console.log(response);
        console.log(textStatus);
        console.log(jqXHR);
       // $('#nazivPreview').text("   " + nakit.naziv  );
     //   $('#opisPreview').text("   " +  nakit.opis);
     //   $('#cenaPreview').text("   " +  nakit.cena);
 
      //  document.getElementById("slikaPreview").src = 'images/'+odecaid.slika;
    });
    request.fail(function (jqXHR, textStatus, errorThrown) {

        alert(prikazid);
        console.error('Greska: ' + textStatus, errorThrown);
    });

    
}


/*function azurirajOdecu(azurirajid){ //ovo je kad korisnik klikne dugme iz tabele za azuriranje
    //prvo moramo da popunimo formu sa vec unetim podacima pa onda da ih azuriramo
    
    //kopiramo ovo iz prethodne funkcije
    $.post("handler/get.php",{azurirajid:azurirajid},function(data,status){
         
          var odecaid=JSON.parse(data);//
                  //uzimamo podatke iz baze i cuvamo ih u input field
        console.log(odecaid.slika);
        console.log(odecaid.id);

          $('#sakrivenoPolje2').val(odecaid.slika  );
          $('#sakrivenoPolje').val(odecaid.id  );
          $('#naziv2').val(odecaid.naziv  );
          $('#opis2').val(odecaid.opis);
          $('#cena2').val(odecaid.cena);
   
         
  
  
      }); 


}*/






//ovo je kad korisnik klikne dugme unutar forme da sacuva promene 
$('#izmeniProizvod').submit(function () {
    var form = $('#izmeniProizvod')[0];
    var formData = new FormData(form);
    event.preventDefault();  
   
 


    request = $.ajax({  
        url: 'handler/edit.php',  
        type: 'post', 
        processData: false,
        contentType: false,
        data: formData
    });

    request.done(function (response, textStatus, jqXHR) {
      
        if (response === "Success") {
            alert("Odeca azurirana");
            
            location.reload(true);
        }
        else {
       
            console.log("Odeca nije azurirana" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
     
    


});
