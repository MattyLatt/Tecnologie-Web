<!--
    Nome: Matteo
	  Cognome: Lattanzio

	  Elenco_prodotti_ng.php:  Pagina che recupera informazioni sugli annunci registrati nel sistema da un database e le visualizza.

-->

<?php
include("core.php");

$q="select * from annuncio";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn));

$n=mysqli_num_rows($rs);

$a=mysqli_fetch_array($rs);

if($n!=0)
{
	
	for($i=0;$i<$n;$i++)
    {
        $id_annuncio=$a['id_annuncio'];
    	 
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
            print('<img src="img/x.jpg" width=100 height=100 onclick="eliminazioneannuncio('.$id_annuncio.')">');
            print('</div>');

        print("</div>");

		$a=mysqli_fetch_array($rs);
    }
	
}
  
mysqli_close($conn);

?>