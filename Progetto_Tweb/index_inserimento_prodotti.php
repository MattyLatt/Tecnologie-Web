<!--
    Nome: Matteo
	Cognome: Lattanzio

	index_inserimento_prodotti.php: pagina html dove l'utente puo' aggiungere il suo annuncio seguendo le regole di sintassi per rendere
                                    accettabili i dati dell'annuncio.

-->

<?php include("session/sessioneverifica.php"); ?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <link href="css/graficaPagine.css" rel="stylesheet" type="text/css">
        <script src="js/validazione.js"></script> 
        <title>Inserimento annuncio AdsSite</title>
    </head>

	<body>
        <div id="total_zone">

            <div id="admin_main_zone">

		        <a href="mainpageUtente.php" target="_self"><img src="img/menu.png" width=200 height=100></a>

		        <h2>Inserimento prodotto </h2>  

                <form name="form_inserimento" method="post" action="inserimento_prodotti.php" enctype="multipart/form-data">
                
                    <input type="hidden" name="id_annuncio">
                    <input type="hidden" name="id_iscritto">

                        <table>
                        
                            <tr><td>Nome Annuncio: </td><td align="center"><input type="text" class ="input" name="nome_ins" placeholder="Nome Prodotto"></td></tr>    
                            <tr><td>Descrizione Prodotto: </td><td align="center"><input type="text" class ="input" name="descrizione_ins" placeholder="Descrizione Prodotto"></td></tr>  
                            <tr><td>Quantita' Prodotto: </td><td align="center"><input type="text" class ="input" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode==127' name="quantita_ins" placeholder="Numero Prodotti presenti"></td></tr>
                            <tr><td>Immagine: </td><td align="center"><input type="file" class ="input" name="image" accept="image/jpeg" placeholder="File immagine "></td></tr>     
                            <tr><td>Prezzo Prodotto: </td><td><input type="text" class ="input" onkeypress='return event.charCode >= 48 && event.charCode <= 57 || event.charCode==44' name="dollari_ins" placeholder="Dollari"></td></tr>            
                            
                            <tr><td align="center" colspan="2">
                                <select class="select" name="categoria">
                                    <option value='categoria'>Categoria
                                    <?php include("categorie.php");?> <!-- file PHP richiamato che contiene il codice per recuperare e visualizzare le opzioni disponibili per la selezione della categoria del prodotto. -->
                                </select>
                            </td></tr>  

                            <tr><td align="center" colspan="2">
                                <select class="select" name="zona">
                                    <option value='zona'>Zona 
                                    <?php include("zona.php");?>
                                </select>
                            </td></tr>

                        </table>        
                    
                    <button class="button" onclick="return controlloProdotto();">Inserisci Prodotto</button> <!-- cliccando sul pulsante button avviene il richiamo alla funzione javascript dove avverrà un controllo sui dati inseriti dal punto di vista sintattico --> 
                </form>

                <div id="error-messages"></div>
                
            </div>
        </div> 

        <div id="validation">
            <p>   
                <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
        </div>

    </body>

</html>