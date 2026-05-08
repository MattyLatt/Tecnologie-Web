<!--
    Nome: Matteo
	Cognome: Lattanzio

	index_elenco_annunci_personali_utente.php:   pagina html dove vengono mostrati gli annunci pubblicati dall'utente stesso.

-->

<?php include("session/sessioneverifica.php"); ?>
<html>
    <head>
        <style>
        <?php include("css/graficaMenu.css"); ?>
        </style>
        <title>Elenco annunci personali</title>
    </head>

    <body>
        <div id="top_zone">
            <div id="top_bar">
                <a href="mainpageUtente.php" target="_self">Ritorna Indietro</a> 
            </div>
        </div>  
                <div id="main_zone">
                        <?php include("elenco_annunci_personali_utente.php"); ?>
                </div>
    </body>

    <p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
    </a>
  </p>
  
</html>