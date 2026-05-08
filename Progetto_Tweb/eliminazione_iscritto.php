<!--
    Nome: Matteo
	Cognome: Lattanzio

	eliminazione_iscritto.php=  Questo script PHP viene utilizzato per eliminare un 
                                iscritto specifico dall'elenco degli iscritti.
-->

<?php
include("core.php");

$id_iscritto = $_GET['id_iscritto']; // recupero l'id dell'iscritto da eliminare dal parametro GET 

$q = "DELETE FROM iscritto WHERE id_iscritto = $id_iscritto ";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

mysqli_close($conn);

?>