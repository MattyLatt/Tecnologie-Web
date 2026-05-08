<!--
    Nome: Matteo
	Cognome: Lattanzio

	Mainpage.php: pagina principale da cui arrivi attraverso il login o la registrazione in caso di successo.
                  Attraverso la mainpage l'utente potra' fare una ricerca degli annunci disponibili in base alla zona o alla categoria
                  sul sito vedendone le varie informazioni e poter lui stesso inserirne di altri.

-->
<html>
  <head>
    <style>
      <?php include("css/graficaMenu.css"); ?> 
    </style>
  </head>

  <body>
    <form name="form" action="mainpage.php" method="POST">

      <div id="top_zone">

          <div id="top_bar">
            <a href="index.php" target="_self">Login</a> 
            <a href="index_registrazione.php" target="_self">Registrazione</a>
          </div>

          <div id="search_slot">
              <div id="search_bar">
                <input class ="input" type="text" name="searchbar" placeholder="Cerca..." >
                  <?php include("categorie.php");?>   
                  <?php include("zona.php");?>
                  <button class="button"><span>Cerca</span></button>
              </div>
          </div>
        
      </div>

    </form>

    <div id="main_zone">
      <?php include("ricerca.php"); ?>
    </div>

  </body>
</html>