<!--
    Nome: Matteo
	Cognome: Lattanzio

	registrazione.php= pagina php dove avvviene la registrazione dei dati dell'utente dopo aver fatto l'accesso al database del sito.
					   Alla fine della registrazione l'utente verrà portato alla sua pagina utente.
-->

<?php
	include("core.php"); 

	$nome = mysqli_real_escape_string($conn, $_POST['nome']);
	$cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
	$username = mysqli_real_escape_string($conn, $_POST['username']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = password_hash($_POST['password'], PASSWORD_DEFAULT);

	$id_iscritto = $_POST['id_iscritto'];

	$q = "INSERT INTO iscritto (id_iscritto, nome, cognome, username, email, password) VALUES ('$id_iscritto','$nome','$cognome','$username','$email','$password')";

	if (mysqli_query($conn, $q))  // se la esecuzione della query è andata a buon fine avvviene lo start della sessione con dichiarazioni di variabili di sessione e indirizzzamento alla pagina utente
	{
		session_start(); 
		$row= mysqli_fetch_array($q);
		$_SESSION['login_time'] = time();
  		$_SESSION['logged'] = true;
		$_SESSION['username']=$username;
		$_SESSION['id_iscritto']=$id_iscritto;
		$_SESSION['username']= $row['username'];
		$_SESSION['nome']= $row['nome'];
		$_SESSION['cognome']= $row['cognome'];
		header("location:mainpageUtente.php"); // indirizzamento alla pagina utente
	} 
	else 
	{
  		die("Errore nell'inserimento del record: " . mysqli_error($conn));
	} 

	mysqli_close($conn);
	
?>