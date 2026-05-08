<!--
    Nome: Matteo
	Cognome: Lattanzio

	inserimento_lista_prefe.php:   Pagina dedicata all'inserimento di un annuncio nella lista dei preferiti dell'utente.
-->

<?php
include("core.php");
include("session/sessioneverifica.php");

$id_iscritto = $_SESSION['id_iscritto']; 
$id_annuncio = $_GET['id_annuncio']; //id_annuncio passato dalla fuunzione javascript dell'annuncio specifico che l'utente vuole inserire nella lista

// Verifico se esiste già un record con gli stessi valori di id_annuncio e id_iscritto
$sql = "SELECT * FROM listaprefe WHERE id_annuncio = $id_annuncio AND id_iscritto = $id_iscritto";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) == 0) // Se non ci sono record con gli stessi valori, procedi con l'inserimento
{
    $q = "insert into listaprefe(id_annuncio, id_iscritto) VALUES ($id_annuncio, $id_iscritto) ";

    // Execute the query
    $rs = mysqli_query($conn, $q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));
}

mysqli_close($conn);

?>