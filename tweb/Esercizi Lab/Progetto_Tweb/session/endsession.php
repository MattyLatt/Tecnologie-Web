<!--
    Nome: Matteo
	Cognome: Lattanzio

	Endsession.php: pagina che termina la sessione di accesso al sito per l'utente (logout)

-->

<?php
    session_start();
    session_destroy();
    header("location:../");
?>