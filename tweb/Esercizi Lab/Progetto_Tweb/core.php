<!--
    Nome: Matteo
	Cognome: Lattanzio

	core.php= pagina php dove avviene l'accesso al server col database.
-->

<?php 
$conn=mysqli_connect("localhost","root","","adsSite"); 
    if(!$conn)
    {
        die ('Non riesco a connettermi: errore '.mysqli_error($conn)); 
    }

$db_selected=mysqli_select_db($conn,"adsSite"); 

    if(!$db_selected)
    {
        die ('Errore nella selezione del database: errore '.mysqli_error($conn)); 
    }
?>