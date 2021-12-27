
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
    
    
    $.post("handler/get.php",{prikazid:prikazid},function(data,status){
        console.log(data);
        var nakit=JSON.parse(data);//
        console.log(nakit); 
        $('#nazivPreview').text(nakit.naziv  );
        $('#opisPreview').text(nakit.opis);
        $('#cenaPreview').text(nakit.cena);
 
        document.getElementById("slikaPreview").src = 'images/'+nakit.slika;


    }); 

 
    
}


function azurirajNakit(azurirajid){ //ovo je kad korisnik klikne dugme iz tabele za azuriranje
    //prvo moramo da popunimo formu sa vec unetim podacima pa onda da ih azuriramo
  
    $.post("handler/get.php",{azurirajid:azurirajid},function(data,status){
        console.log(data);
        var nakit=JSON.parse(data);//
        console.log(nakit); 
        $('#nazivEdit').val(nakit.naziv  );
        $('#opisEdit').val(nakit.opis);
        $('#kategorijeEdit').val(nakit.kategorija).change();
        console.log(nakit.kategorija);
        $('#cenaEdit').val(nakit.cena);

        $('#sakrivenoPoljeID').val(nakit.idNakita);
        console.log(nakit.slika);
        $('#sakrivenoPoljeSLIKA').val(nakit.slika);
        


    }); 

  

}






//ovo je kad korisnik klikne dugme unutar forme da sacuva promene 
$('#editform').submit(function () {
    alert("A");
    var form = $('#editform')[0];
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
            alert("Uspesno azurirano");
            
            location.reload(true);
        }
        else {
       
            console.log("Azuriranje neuspesno" + response);
        }
    });

    request.fail(function (jqXHR, textStatus, errorThrown) {
        console.error('Greska: ' + textStatus, errorThrown);
    });
     
    


});


function obrisinakit(deleteid){


    request = $.ajax({  
        url: 'handler/delete.php',  
        type: 'post', 
        data: {deleteid:deleteid},


        success: function(data, status){
            location.reload(true);
            alert("Uspesno obrisano!");
        }


    });



}