<!--
    Nome: Matteo
	Cognome: Lattanzio

	inserimento_prodotti.php: pagina php dove avviene l'inserimento dell'annuncio, dell'utente loggato, nel database del sito comunicando
                              col server.

-->

<?php
include("session/sessioneverifica.php"); 

include("core.php"); 

$target_dir = "img/"; //specifico la cartella in cui verrà salvato il file caricato
//combino il nome della cartella di destinazione con il nome del file caricato (ottenuto tramite la funzione basename)
$target_file = $target_dir . basename($_FILES["image"]["name"]); 

    /* utilizzo il metodo move_uploaded_file per spostare il file caricato temporaneo dalla sua posizione originale 
    alla cartella specificata in $target_file, restituisce true se il file è stato caricato con successo nella cartella specificata,
    false nel caso ce stato un errore di upload */
    if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) 
    {
        $nome = mysqli_real_escape_string($conn, $_POST['nome_ins']);
        $descrizione = mysqli_real_escape_string($conn, $_POST['descrizione_ins']);
        $quantita = mysqli_real_escape_string($conn, $_POST['quantita_ins']);
        $prezzo_dollari = mysqli_real_escape_string($conn, $_POST['dollari_ins']);
        $prezzo_cent = mysqli_real_escape_string($conn, $_POST['cent_ins']);
        $id_categoria = mysqli_real_escape_string($conn, $_POST['categoria']);
        $id_zona = mysqli_real_escape_string($conn, $_POST['zona']);

        $id_annuncio = $_POST['id_annuncio'];

        // Esegue la query di inserimento con i parametri forniti
        $q = mysqli_query($conn, "INSERT INTO annuncio (id_annuncio, nome, descrizione, quantita, foto, prezzo_dollari, id_categoria, id_zona, id_iscritto) VALUES ('$id_annuncio','$nome', '$descrizione', '$quantita', '$target_file', '$prezzo_dollari', '$id_categoria', '$id_zona'," . $_SESSION['id_iscritto'] . ")");
     
        // Verifica che la query sia stata eseguita correttamente
        if (!$q) 
        {
            die("Errore nella query di inserimento: " . mysqli_error($conn));
        }

    }
    else
    {
        die("L'immagine non è stata caricata con successo, controllare file " . mysqli_error($conn));
    }

header("location:index_inserimento_prodotti.php");
mysqli_close($conn);

?>