//viene fatto il controllo sui dati fornit dal form del login per verificare che l'utente abbia inserito dei dati
function controlloLogin()
{
        var ok=true;

        if (form_login.email.value=="" || form_login.password.value=="") 
        {
            document.getElementById("error-messages").innerHTML = "ERRORE: Inserire tutti i campi";
            ok = false;
        } 
        else 
        {
            document.getElementById("error-messages").innerHTML = "";
            ok = true;
        }

        return ok;
}

//viene fatto un controllo sintattico sui dati inseriti dall'utente nel form della registrazione sul formato, lunghezza e completezza dei dati
function controlloSubmit()
{
	var ok;
	ok=true;

	if(form_registration.nome.value=="" || form_registration.cognome.value=="" || form_registration.username.value==""|| form_registration.email.value==""  || form_registration.password.value=="" || form_registration.conf_password.value=="")
	{
		document.getElementById("error-messages").innerHTML = "ERRORE: Inserire tutti i campi";
        ok = false;
	}
    else if(!(/^[a-zA-Z]+$/.test(form_registration.nome.value)) || !(/^[a-zA-Z]+$/.test(form_registration.cognome.value)))
    {
        document.getElementById("error-messages").innerHTML = "ERRORE: Inserire formato corretto per nome e/o cognome";
        ok = false;
    }
    else if(form_registration.username.value.length < 6 || form_registration.username.value.length > 12)
    {
        document.getElementById("error-messages").innerHTML = "ERRORE: Inserire lunghezza di caratteri corretti per username";
        ok = false;
    }
    else if(form_registration.password.value.length < 8 || form_registration.password.value.length > 15)
    {
        document.getElementById("error-messages").innerHTML = "Inserire lunghezza di caratteri corretti per username";
        ok = false;
    }
	else if(form_registration.password.value!=form_registration.conf_password.value)
	{
		document.getElementById("error-messages").innerHTML = "ERRORE: Le due password non corrispondono";
		ok = false;
	}
    else
	{
		document.getElementById("error-messages").innerHTML = "";
        ok=true;
	}
			
	return ok;
}

//viene fatto un controllo sui dati forniti attraverso il form dall'utente sull'inserimento di un annuncio.
function controlloProdotto()
{
	var ok=true;
    var sel=form_inserimento.categoria.selectedIndex;
	var sel2=form_inserimento.zona.selectedIndex;
	ok=true;

	if(form_inserimento.nome_ins.value=="" || form_inserimento.descrizione_ins.value=="" || form_inserimento.quantita_ins.value=="" || form_inserimento.image.value=="" || form_inserimento.dollari_ins.value=="" || form_inserimento.cent_ins.value=="") // verifica se i dati sono stati inseriti nelle caselle             
	{
        document.getElementById("error-messages").innerHTML = "ERRORE: Inserire tutti i campi";
        ok = false;
    }
    else if(sel==0) //verifica se la checkbox categoria ha un dato selezionato
    {	
        document.getElementById("error-messages").innerHTML = "ERRORE: Categoria non ha un dato selezionato";
        ok = false;
    }
	else if(sel2==0) //verifica se la checkbox zona ha un dato selezionato
    {
        document.getElementById("error-messages").innerHTML = "ERRORE: Zona non ha un dato selezionato";
        ok = false;
    }
    else if(/^[a-zA-Z]+$/.test(form_inserimento.quantita_ins.value)) //verifico se la quantita' e' maggiore e diversa da 0 e diversa da un carattere alfabetico
    {
        document.getElementById("error-messages").innerHTML = "ERRORE: Quantità è stata inserita come dato alfabetico";
        ok = false;
    }
    else if(form_inserimento.quantita_ins.value<=0)
    {
        document.getElementById("error-messages").innerHTML = "ERRORE: Quantità è stata inserita con un dato inferiore o uguale a 0";
        ok = false;
    }
   
    return ok;
}		

//Viene utilizzato AJAX per inviare una richiesta al server e ottenere la risposta senza dover ricaricare la pagina.
function inserimentoprefe(id_annuncio) 
{
    // Invia la richiesta AJAX al file PHP specificato
    var xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            // Gestisci la risposta ricevuta dal server
            console.log(this.responseText);

            window.location.reload();
        }
    };
    xhttp.open("GET", "inserimento_lista_prefe.php?id_annuncio=" + id_annuncio, true);
    xhttp.send();
}

function eliminazioneprefe(id_annuncio) 
{
    // Invia la richiesta AJAX al file PHP specificato
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "eliminazione_lista_prefe.php?id_annuncio=" + id_annuncio, true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            // Gestisci la risposta ricevuta dal server
            console.log(this.responseText);

            window.location.reload();
        }
    };
  
    xhttp.send();
}

function eliminazioneiscritto(id_iscritto) 
{
    // Invia la richiesta AJAX al file PHP specificato
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "eliminazione_iscritto.php?id_iscritto=" + id_iscritto, true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            // Gestisci la risposta ricevuta dal server
            console.log(this.responseText);

            window.location.reload();
        }
    };
  
    xhttp.send();
}

function eliminazioneannuncio(id_annuncio) 
{
    // Invia la richiesta AJAX al file PHP specificato
    var xhttp = new XMLHttpRequest();
    xhttp.open("GET", "eliminazione_annuncio.php?id_annuncio=" + id_annuncio, true);
    xhttp.setRequestHeader("Content-Type", "application/json;charset=UTF-8");

    xhttp.onreadystatechange = function() 
    {
        if (this.readyState == 4 && this.status == 200) 
        {
            // Gestisci la risposta ricevuta dal server
            console.log(this.responseText);

            window.location.reload();
        }
    };
  
    xhttp.send();
}