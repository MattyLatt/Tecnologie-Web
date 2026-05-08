<!--
    Nome: Matteo
	Cognome: Lattanzio

	ricerca.php: pagina php dove avviene l'accesso al server degli annunci e vengono fatte delle query di ricerca sulla base della ricerca 
                 avvenuta sulla mainpage e il server restituisce un insieme di dati che corrisponde alla ricerca dati stampandola.

-->

<?php

include("core.php");

if(isset($_POST["searchbar"])) // verifica se la barra ricerca ha una stringa di valori
{
	$searchq= $_POST['searchbar'];
	$searchq= preg_replace("#[^0-9a-z]#i","",$searchq);
	$categoria=$_POST['categoria'];
	$zona=$_POST['zona'];

    //in seguito abbiamo delle if che restituiscono la query corrispondente alla combinazione di dati di ricerca usati dall'utente tra bbarra di ricerca, categoria e zona.

    // esempio: query che stampa tutti gli annunci SE l'utente non ha selezionato una categoria, zona e scritto sulla barra di ricerca
    if($categoria=="categoria" && $searchq=='' && $zona=="zona") 
    {
        $q="SELECT * FROM annuncio WHERE quantita>0 ";
    }
    else if($categoria!="categoria" && $searchq!='') 
    {
        $q="SELECT * FROM annuncio WHERE quantita>0 and nome like '%$searchq%' and id_categoria=".$categoria;
    }
    else if($zona=="zona" && $categoria=="categoria" && $searchq!='')
    {
        $q="SELECT * FROM annuncio WHERE quantita>0 and nome like '%$searchq%'";
    }
    else if($categoria!="categoria" && $searchq=='')
    {
        $q="SELECT * FROM annuncio WHERE quantita>0 and id_categoria=".$categoria;
    }
    else if($zona!="zona" && $searchq=='')
    {
        $q="SELECT * FROM annuncio WHERE quantita>0 and id_zona=".$zona;
    }

    $rs=mysqli_query($conn,$q) or die ("Errore nell'esecuzione della query $q: " . mysqli_error($conn)); //passa il risultato della query in rs o da l'errore in caso di errore di esecuzione

    $n=mysqli_num_rows($rs); //ottieni il numero di righe del risultato

    $a=mysqli_fetch_array($rs); //Recupera una riga di risultato come array associativo, array numerico o entrambi
    if($n!=0)
    {
        for($i=0;$i<$n;$i++)
        {
            $id_annuncio=$a['id_annuncio']; // assegna a $id_annuncio il valore dell'ID dell'annuncio corrente
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
                    print('<img src="img/plus.jpg" width=100 height=100 onclick="inserimentoprefe('.$id_annuncio.')">');
                print('</div>');

            print('</div>');

            $a=mysqli_fetch_array($rs);
        }
    }
}

mysqli_close($conn);

?>
