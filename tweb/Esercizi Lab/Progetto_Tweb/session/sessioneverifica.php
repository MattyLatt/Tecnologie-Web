<!--
    Nome: Matteo
	Cognome: Lattanzio

	sessioneverifica.php: Pagina php usata per verificare se un utente è loggato e se la sessione è ancora valida. 
                          Se l'utente non è loggato o la sessione è scaduta, lo reindirizza alla pagina di login, "index.html". 
                          Funzione usata alla base per limitare l'accesso a determinate pagine solo agli utenti loggati.

-->

<?php

$lifetime = 30 * 60; // 30 minuti
session_set_cookie_params($lifetime);

session_start();
//$log= $_SESSION["logged"];
$sessionid= $_SESSION["logged"];

if($sessionid!=true)
{
    header("location: index.html"); //refresh nella pagina stessa index
}

//Verifico se il tempo trascorso dall'ultimo accesso è maggiore della durata dei cookie di sessione,
if(time() - $_SESSION['login_time'] > $lifetime)
{
    //reindirizzamento alla pagina login e esce dallo script se il tempo di sessione dell'utente è scaduto
    header('Location: index.html');
    exit;
}


?>