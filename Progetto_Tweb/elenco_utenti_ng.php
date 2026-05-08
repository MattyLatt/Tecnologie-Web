<!--
    Nome: Matteo
	  Cognome: Lattanzio

	  Elenco_utenti_ng.php:  Pagina che recupera informazioni sugli utenti registrati nel sistema da un database e le visualizza.

-->

<?php
include("core.php");

$q="select * from iscritto";

$rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysql_error());

$n=mysqli_num_rows($rs);

$a=mysqli_fetch_array($rs); //recupera una riga di risultato come array associativo, array numerico o entrambi.

if($n!=0)
{
	
	for($i=0;$i<$n;$i++)
    {
          $id_iscritto=$a['id_iscritto'];

          print('<div id="slot_prodotto">');

            print('<div id="slot_dati">');

              print("<table>");
                print("<tr><td>Nome : </td><td>".$a['nome'].'</td>');
                print('</td>');
                print("<tr><td>Username: </td><td>".$a['username'].'</td>');
				        print('</td>');
                print("<tr><td>Email: </td><td>".$a['email'].'</td>');
              print("</table>");
              
            print('</div>');
              print('<div id="slot_pulsanti">');
              print('<img src="img/x.jpg" width=20 height=20 onclick="eliminazioneiscritto('.$id_iscritto.')">');
              print('</div>');
        print("</div>");

		$a=mysqli_fetch_array($rs);
    }
	
}
  
mysqli_close($conn);

?>