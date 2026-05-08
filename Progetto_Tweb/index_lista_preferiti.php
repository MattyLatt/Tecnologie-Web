<!--
    Nome: Matteo
	Cognome: Lattanzio

	index_lista_preferiti.php= Lo scopo di questa pagina è presentare la lista di annunci preferiti dall'utente
-->

<?php include("session/sessioneverifica.php"); ?>
<html>
    <head>
        <style>
        <?php include("css/graficaMenu.css"); ?>
        </style>
        <script src="js/validazione.js"></script>
        <title>Elenco annunci preferiti</title>
    </head>

    <body>
        <div id="top_zone">
            <div id="top_bar">
                <a href="mainpageUtente.php" target="_self">Ritorna Indietro</a> 
            </div>
        </div>  
                <div id="main_zone">
                <input type="hidden" name="id_annuncio">
                    <?php include("elenco_annunci_preferiti_utente.php"); ?>
                </div>
    </body>

    <p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
    </a>
  </p>

</html>