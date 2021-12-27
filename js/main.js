
 $('#dodajNoviProizvod').submit(function () {

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


//pretraga  i sortiranje
function pretragaPoImenu() {
    var input, filter, table, tr, td, i, txtValue;
    input = document.getElementById("pretraga");
    filter = input.value.toUpperCase();
    table = document.getElementById("tableNakit");
    console.log(table);
    tr = table.getElementsByTagName("tr");
    for (i = 0; i < tr.length; i++) {
        td = tr[i].getElementsByTagName("td")[0];
        if (td) {
            txtValue = td.textContent || td.innerText;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
            } else {
                tr[i].style.display = "none";
            }
        }
    }
}



function sortiraj() {
 
    var table, rows, switching, i, j, z, k, x, y, shouldSwitch;
    table = document.getElementById("tableNakit");


    var e = document.getElementById("kriterijum");
    console.log(e);
    var result = e.options[e.selectedIndex].value;
   console.log(result);

 



    //SORT po ceni
    // sortira tako da najjeftiniji postovi idu na vrh
    if (result == "price") {
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            for (j = i + 1; j < rows.length; j++) {
                x = rows[i].getElementsByTagName("TD")[2];
                y = rows[j].getElementsByTagName("TD")[2];
                z = parseInt(x.innerHTML);
                k = parseInt(y.innerHTML);
                if (z > k) {
                    rows[i].parentNode.insertBefore(rows[j], rows[i]);
                }
            }
        }

    }


    //SORT po imenu  
 
    if (result == "name") {
        rows = table.rows;
        for (i = 1; i < (rows.length - 1); i++) {
            for (j = i + 1; j < rows.length; j++) {
                x = rows[i].getElementsByTagName("TD")[0];
                y = rows[j].getElementsByTagName("TD")[0];

                if (x.innerHTML.toLowerCase() > y.innerHTML.toLowerCase()) {
                    rows[i].parentNode.insertBefore(rows[j], rows[i]);
                }
            }
        }
    }


}




