<!--
    Nome: Matteo
	Cognome: Lattanzio

	elenco_annunci_preferiti_utente.php=  Questo è uno script PHP che recupera i dati da un database e li visualizza su una pagina web.
                                          In questo caso vengono recuperati i dati degli annunci preferiti dell'utente corrente.
-->

<?php
include("core.php");

// query usata per recuperare gli annunci che sono memorizzati nell'elenco degli annunci preferiti dell'utente, in base all'id dell'utente memorizzato nella sessione.
$q = "SELECT * FROM annuncio AS a JOIN listaprefe AS l ON a.id_annuncio = l.id_annuncio WHERE l.id_iscritto= ".$_SESSION['id_iscritto']." ";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

$n=mysqli_num_rows($rs);

$a=mysqli_fetch_array($rs);


if($n!=0)
{
	for($i=0;$i<$n;$i++)
    {
        $id_annuncio=$a['id_annuncio']; //recupero id_annuncio dell riga corrente

        print('<div id="slot_prodotto">');

            print('<div id="slot_immagine">');
                print('<img src="'.$a['foto'].'" width=200 height=200>');
            print('</div>');
            
            print('<div id="slot_dati">');

                print("<table>");
                    print("<tr><td>Nome Prodotto: </td><td>".$a['nome'].'</td>');
                    print("<tr><td>Descrizione Prodotto: </td><td>".$a['descrizione'].'</td>');
                    print("<tr><td>Quantita' Prodotto: </td><td>".$a['quantita'].' pz</td>');
                    print("<tr><td>Prezzo: </td><td>".$a['prezzo_dollari'].','.$a['prezzo_cent'].' $</td>');
                print("</table>");

            print('</div>');

            print('<div id="slot_pulsanti">'); 
                    //tramite l'attributo onclick avviene il richiamo a una funzione javascript da eseguire quando l'immagine viene cliccata
                    print('<img src="img/x.jpg" width=100 height=100 onclick="eliminazioneprefe('.$id_annuncio.')">');
            print('</div>');

        print("</div>");

		$a=mysqli_fetch_array($rs); // restituisce un array con i dati per la riga successiva nell'insieme di risultati.
    }
	
}
  
mysqli_close($conn);

?>