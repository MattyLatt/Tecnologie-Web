<?php
include("core.php");

// Query per ottenere i dati delle zone
$query = "SELECT id_zona, nome_zona FROM zona";

// Eseguo la query
$result = mysqli_query($conn, $query);

// Se la query ha restituito dei risultati
if (mysqli_num_rows($result) > 0) 
{
    // Scorro i risultati della query
    while($row = mysqli_fetch_assoc($result)) 
    {
        // Genero l'opzione per la casella di selezione utilizzando i dati del risultato della query
        echo "<option value='" . $row["id_zona"] . "'>" . $row["nome_zona"] . "</option>";
    }
} 
else 
{
    // Se la query non ha restituito risultati, stampo un messaggio di errore
    echo "Errore: nessuna zona trovata";
}

// Chiudo la connessione al database
mysqli_close($conn);
?>