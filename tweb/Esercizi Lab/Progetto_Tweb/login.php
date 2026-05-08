<!--
    Nome: Matteo
	Cognome: Lattanzio

	login.php= pagina php dove avviene la verifica dei dati inseriti di login e accesso alla pagina principale in 
               in caso di successo con le dovute verifiche sulle credenziali.
-->

<?php
//pagina php dovve faccio l'accesso al database
include("core.php");

$email = mysqli_real_escape_string($conn, $_POST['email']); //per proteggere il codice dalle injection di SQL.
$password = mysqli_real_escape_string($conn, $_POST['password']);

//La query seleziona la password da una tabella chiamata "Iscritto" in cui la colonna email corrisponde a una variabile chiamata "$email"
$q = mysqli_query($conn, "SELECT password FROM Iscritto WHERE email='$email'"); 

$hash = mysqli_fetch_assoc($q)['password']; //recupero il valore della colonna "password" 

/* controllo se la variabile $password corrisponde alla variabile $hash utilizzando la funzione password_verify()
   la funzione prende come parametri la password in chiaro ($password) e la password cifrata e la funzione restitutisce un valore boolean
   true se la password in chiaro corrisponde a quella cifrata, false nel caso opposto */
  if (password_verify($password, $hash)) 
  { 
      $q2 = "SELECT id_iscritto FROM iscritto WHERE email = '$email'"; // query per estrarre l'ID dell'iscritto dal database dell'utente specifico
      $result = mysqli_query($conn, $q2); //esecuzione query
      $row = mysqli_fetch_assoc($result); //recupero del risultato della query restituendo un array associativo del risultato
      $id_iscritto = $row['id_iscritto']; //recupero il valore della colonna "id_iscritto" nel set di risultati e lo memorizza in una variabile chiamata "$id_iscritto"

      // Inizializzare le variabili di sessione e reindirizzare alla pagina principale
      session_start(); 
      //salvo l'ora corrente nella chiave login_time dell'array $_SESSION che verrà utilizzata in seguito per verificare se l'utente è ancora loggato o se la sessione è scaduta.
      $_SESSION['login_time'] = time(); 
      /* Il valore della chiave 'logged' verrà controllato successivamente in un file di sessione implementato in ogni pagina a seguire usata unicamente dagli utenti loggati, 
         se il valore è true, l'utente è loggato, se il valore è false, l'utente non è loggato. */
      $_SESSION['logged'] = true;
      $_SESSION['email'] = $email;
      $_SESSION['id_iscritto'] = $id_iscritto;
      $_SESSION['password'] = $password;
      header("location:mainpageUtente.php"); //indirizzamento alla pagina utente
  } 
  else
  {
      // Rilasciare alla pagina di login in caso di credenziali errate
      header("location:index.php");
  }

  mysqli_close($conn);
  
?>
