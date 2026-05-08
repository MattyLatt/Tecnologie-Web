<!--
    Nome: Matteo
	Cognome: Lattanzio

	eliminazione_annuncio.php=  Questo script PHP viene utilizzato per eliminare un 
                                annuncio specifico dall'elenco degli annunci.
-->

<?php
include("core.php");

$id_annuncio = $_GET['id_annuncio']; // recupero l'id dell'iscritto da eliminare dal parametro GET 

$q = "DELETE FROM annuncio WHERE id_annuncio = $id_annuncio ";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

mysqli_close($conn);

?>