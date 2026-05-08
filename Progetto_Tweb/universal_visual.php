<!--
    Nome: Matteo
	Cognome: Lattanzio

	Universal_visual.php: Pagina che utilizza l'include per mostrare contenuti diversi in base al valore 
                          del parametro "content" passato tramite l'URL.
                          
                          In particolare, la pagina contiene una sezione di codice in PHP che controlla se è stato passato 
                          il parametro "content" nell'URL e in base al suo valore include file PHP differenti. 

-->

<html>
    <head>
        <style>
        <?php include("css/graficaMenu.css"); ?>
        </style>
        <script src="js/validazione.js"></script>
    </head>

    <body>
        <div id="top_zone">
            <div id="top_bar">
                <a href="admin_zone.html" target="_self">Ritorna Indietro</a> 
            </div>
        </div>  
                <div id="main_zone">
                        <?php
                            if(isset($_GET['content'])){
                                switch ($_GET['content']) { // in base al content passato 
                                                case "0":
                                                    include("elenco_utenti_ng.php");
                                                    break;
                                                case "1":
                                                    include("elenco_prodotti_ng.php");
                                                    break;      
                                            }
                            } 
                        ?>
                </div>
    </body>

    <p>
    <a href="http://jigsaw.w3.org/css-validator/check/referer">
        <img style="border:0;width:88px;height:31px" src="http://jigsaw.w3.org/css-validator/images/vcss" alt="CSS Valido!" />
    </a>
  </p>

</html>