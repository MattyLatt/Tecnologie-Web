<!--
    Nome: Matteo
	Cognome: Lattanzio

	eliminazione_lista_prefe.php=  Questo script PHP viene utilizzato per eliminare un 
                                   annuncio specifico dall'elenco degli annunci preferiti di un utente.
-->

<?php
include("core.php");
include("session/sessioneverifica.php"); 

$id_annuncio = $_GET['id_annuncio']; // recuupero l'id dell'annuncio da eliminare dal parametro GET passato alla pagina attraverso la funzzione javascript da cui è stato richiamato lo script php

/*elimina una riga dalla tabella "listaprefe" in cui la colonna "id_annuncio" corrisponde al valore della variabile $id_annuncio 
  e la colonna "id_iscritto" corrisponde al valore dell'id dell'utente memorizzato nella variabile $_SESSION['id_iscritto'] */
$q = "DELETE FROM listaprefe WHERE id_annuncio = $id_annuncio AND id_iscritto = ".$_SESSION['id_iscritto']." ";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

mysqli_close($conn);

?>