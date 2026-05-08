<!--
    Nome: Matteo
	Cognome: Lattanzio

	elenco_annunci_personali_utente.php: Questa pagina mostra gli annunci inseriti dall'utente attualmente connesso.

                                         Utilizza una query per selezionare tutti gli annunci dell'utente connesso dal database e memorizzarli in una matrice. 
                                         
                                         Quindi utilizza un ciclo per stampare i dettagli di ogni annuncio 
                                         nella pagina, come immagine, nome del prodotto, descrizione, quantità e prezzo.   

-->

<?php
include("core.php");

$q="select * from annuncio where id_iscritto= ". $_SESSION['id_iscritto'] ." ";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

$n=mysqli_num_rows($rs);

$a=mysqli_fetch_array($rs);

if($n!=0)
{
	for($i=0;$i<$n;$i++)
    {
    	 
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

            print('<div id="slot_pulsanti">'); print('</div>');

        print("</div>");

		$a=mysqli_fetch_array($rs);
    }
	
}
  
mysqli_close($conn);

?>