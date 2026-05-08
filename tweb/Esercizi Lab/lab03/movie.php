<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="movie.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>TMNT - Rancid Tomatoes</title>   
    </head>

    <body>

    <div id="header">
        <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/banner.png" alt="Rancid Tomatoes">
    </div>

    <div id="article">

        <h1>
            <?php
                $movie=$_GET["film"];
                /*creazione lista che tramite la lettura del 
                file txt, passando come percorso file attraverso il film passato nella URL,
                per ogni riga memorizza l'informazione contenuta in esso*/
                list($name, $year, $rate) = file("$movie/info.txt",FILE_IGNORE_NEW_LINES);
                //stampa del titolo film con concatenazione dell'anno
                echo $name." (".$year.")"; 
            ?> 
        </h1>

        <div id="main">

            <div id="overview">   
                <!--
                Stampa sulla pagina della locandina del film scelta in base al $movie passato nella url
                //-->  
                <img src="<?=$movie?>/overview.png" alt="general overview">         
                <dl>
                    <!-- stampa del layer con informazioni sui attori, produttori, sceneggiatori ecc. -->
                    <?php
                        //viene letto il file corrispondente al film passato nella url e seguentemente viene passato in $overview
                        $overview = file("$movie/overview.txt",FILE_IGNORE_NEW_LINES);

                        //ciclo for per fare la stampa delle righe di file fino a che non finiscono esse
                        for($i=0; $i<count($overview);$i++)
                        {
                            // explode peremette di diividere dai : delle righe di file le righe di dati per poterle gestire in modo diverso
                            $campi = explode(":", $overview[$i]);
                            ?>
                            
                            <dt> <?=  $campi[0] ?>  </dt>
                            <dd> <?= $campi[1] ?></dd>
                        <?php  } ?>
                </dl>
        
            </div>

            <div id="content">
            <!-- gestione immagine descrittiva della percentuale di rating in base a quanto e' apprezzato cambia l'immagine tra fresh e rotten -->
                <div id="rotten">
                    <!-- gestione della immagine -->
                    <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php
                        $rate_img = "rotten";
                        if($rate>=60) //se il rate e' superiore o uguale a 60 si imposta l'icona fresh 
                            $rate_img = "fresh";
                        echo $rate_img."big.png"; //stampa della icona con la parola fresh o rotten concatenata con (rotten || fresh).big.png
                    ?>" alt="<?= $rate_img ?>"> <?= $rate ?>%
                </div>

                <div id="review">
                    <div>
                            <?php
                            /*creazione lista che salva la serie di recensioni sul film inserito nell'url che salva la serie di recensioni che hanno come nome review*, 
                             * = qualsiasi elemento all'interno e' accetto */
                            $reviews = glob("$movie/review*.txt");

                            // viene passata alla variabile half reviews la meta' assoluta (4,7=5, approsimazione assoluta) del totale delle recensioni che ha il film
                            $half_reviews= ceil(count($reviews)/2);

                            //ciclo sulla meta' sx delle recensioni
                            for($i=0;$i<$half_reviews;$i++)
                            {
                                $review = file($reviews[$i],FILE_IGNORE_NEW_LINES); ?>
                                <p class="box_review">

                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php 
                                    $review_img= strtolower($review[1]);
                                    echo $review_img.".gif";
                                ?>" alt="<?= $review_img ?>">

                                <q> <?= $review[0] ?></q>
                                </p>

                                <p class="author">
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
                                <?= $review[2] ?> <br>
                                <?= $review[3] ?>
                                </p>    

                            <?php } ?>
                    </div>
      
                    <div>
                        <?php
                            //ciclo sulla meta' dx delle recensioni
                            for($i=$half_reviews;$i<count($reviews) && $i<10;$i++)
                            {
                                $review = file($reviews[$i],FILE_IGNORE_NEW_LINES); ?>
                                <p class="box_review">

                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/<?php 
                                    $review_img= strtolower($review[1]);
                                    echo $review_img.".gif";
                                ?>" alt="<?= $review_img ?>">

                                <q> <?= $review[0] ?></q>
                                </p>

                                <p class="author">
                                <img src="http://www.cs.washington.edu/education/courses/cse190m/11sp/homework/2/critic.gif" alt="Critic">
                                <?= $review[2] ?> <br>
                                <?= $review[3] ?>
                                </p>    

                            <?php } ?>
                    </div>
                            
                </div>

            </div>

            <div id="pages">
                <p>(1-<?= count($reviews) ?>) of <?= count($reviews) ?></p>
            </div>
            
        </div>   
    </div>

    <div id="validation">
        <p>
            <a href="http://validator.w3.org/check/referer"><img width="88" src="https://upload.wikimedia.org/wikipedia/commons/b/bb/W3C_HTML5_certified.png" alt="Valid HTML5!"></a>
        <p> <br>
        <a href="http://jigsaw.w3.org/css-validator/check/referer"><img src="http://jigsaw.w3.org/css-validator/images/vcss" alt="Valid CSS!"></a>
    </div>

    </body>
</html>