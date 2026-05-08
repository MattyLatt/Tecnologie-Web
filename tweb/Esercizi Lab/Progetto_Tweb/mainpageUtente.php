<!--
    Nome: Matteo
	Cognome: Lattanzio

	Mainpage.php:   pPagina principale dell'utente da cui arrivi attraverso il login o la registrazione in caso di successo.
                  
                  Attraverso la mainpage l'utente potra' fare una ricerca degli annunci disponibili in base alla zona, categoria o parola chiave
                  sul sito vedendone le varie informazioni.

                  Altre funzioni presenti nel sito disponibili all'utente sono l'inserimento dell'annuncio personale, poter visualizzare
                  i propri annunci pubblicati nel sito, poter aggiungere o eliminare degli annunci dalla personale lista dei preferiti
                  e ovviamente potersi disconnettere dalla sessione con logout.

                  Lo stato di sessione disponibile all'utente è di 30 minuti dal momento in cui si registra o fa il login, nel momento 
                  in cui scade il tempo di sessione l'utente verrà portato alla pagina di login automaticamente.

-->
<?php include("session/sessioneverifica.php"); ?>

<html>  
	<head>
        <meta charset="utf-8">
        <style>
        <?php include("css/graficaMenu.css"); ?>
        </style>
        
        <script src="js/validazione.js"></script> 
        <title>AdsSite</title>
	</head>

  <body>
    <form name="form" action="mainpageUtente.php" method="POST">

      <div id="top_zone"> <!-- div che contiene i riquadri per le funzioni e per la ricerca -->

            <div id="top_bar"> <!-- div dove vengono posizionati le varie funzioni per l'utente all'interno -->
              <a href="index_inserimento_prodotti.php" target="_self">| Inserisci prodotto |</a>
              <a href="index_elenco_annunci_personali_utente.php" target="_self">Elenco annunci pubblicati |</a>
              <a href="index_lista_preferiti.php" target="_self">Lista preferiti |</a>
              <a href="session/endsession.php" target="_self">Logout |</a> 
            </div>

          <div id="search_slot"> <!-- riquadro dedicato alla ricerca dell'annuncio -->

              <div id="search_bar"> <!-- vari riquadri che rappresentano il contento della search_slot -->

                  <input class ="input" type="text" name="searchbar" placeholder="Cerca..." >

                  <select class="select" name="categoria">
                  <option value='categoria'>Categoria
                  <?php include("categorie.php");?>
                  </select> 

                  <select class="select" name="zona">
                  <option value='zona'>Zona 
                  <?php include("zona.php");?>
                  </select>

                  <button class="button"><span>Cerca</span></button>

              </div>

          </div>
        
      </div>

    </form>

    <div id="main_zone"> <!-- div dedicato a contenere la serie di annunci -->
      <?php include("ricerca.php"); ?>
    </div>

  </body>

  <p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
    </a>
  </p>
       
</html>