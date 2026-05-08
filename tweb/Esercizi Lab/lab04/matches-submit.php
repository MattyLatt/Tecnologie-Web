<!--
    Nome: Matteo
	Cognome: Lattanzio

	Consegna numero 4: sito web di incontri NerdLuv dove puoi fare la registrazione e ,una volta fatta la registrazione, poter trovare 
	con gli utenti registrati in base alle preferenze prettamente nerd 
	inserite attraverso la pagina match tramite il nome e cognome inserito.

    
    Pagina php che verifichera' la sua registrazione efettiva atrraverso una ricerca del nome e cognome passati da quella precedente,
    questo dato se corrisponde a uno di quelli all'interno del file singles.txt allora verra' a sua volta stampata tramite una ricerca 
    nel file txt degli utenti che hanno le stesse preferenze dell'utente.
-->
<?php
    /** 
     * Ricerca del nome passato nel metodo, a sua volta preso tramite GET dalla pagina matches, attraverso 
     * il file testo singles.txt dove viene fatta una ricerca lineare per verificare se è stato effettivamente registrato.
     * @param string $name nome dell'utente passato tramite GET su cui fare la ricerca
     * @param string $filename path del file.
     * @return string[] array che contiene i dati dell'utente su cui è stata fatta la ricerca e confermata la presenza nel file singles.txt
     * L'array contiene in quest'ordine: nome utente, il genere, l'età, personalità, OS preferito e range di età preferito.
     */
    function search_user($name,$filename) 
    {
        $data = file($filename,FILE_IGNORE_NEW_LINES);
        foreach ($data as $u) { //ricerca per ogni riga del file txt 
            $u_exp = explode(",",$u); //suddivisione della riga corrente di stringhe tramite tramite un separatore ","
            if ($u_exp[0] == $name) 
                return $u_exp;
        }
    }

    /**
     * Metodo dove si verifica la corrispondenza per almeno una lettera nella stessa posizione tra lo user e il partner corrente. 
     * La funzione restituisce true se e solo se esiste almeno una lettera corrispondente in $user nella 
     * stessa posizione di $partner, false altrimenti.
     * @param string $user tipologia di personalità utente.
     * @param string $partner tipologia di personalità partner.
     * @return true se e solo se esiste almeno una lettera che corrisponde tra le due
     * stringhe nella stessa posizione.
     * @return false altrimenti.
     */
    function match_ptype($user,$partner) 
    {
        for ($i = 0; $i < 4; $i++) 
        {
            if ($user[$i] == $partner[$i])
                return true;
        }
        return false;
    }

    /**
     * Corrispondenze di partners per l'utente $user. 
     * Ricerca nel file per verificare che i diversi parametri per fare match con lo user siano rispetatti,
     * tra cui avere di principio lo stesso OS preferito, il genere opposto, l'età che rientra nel range di età preferito dallo user e
     * avere la personalità che corrisponde per almeno una lettera nella stessa posizione.
     * @param string $user nome dell'utente su cui si basa la ricerca 
     * @param string $filename path del file di ricerca.
     * @return $results array di tutti i partners che hanno trovato corrispondeza con l'utente a cui si fa il match.
     */
    function match_partners($user,$filename) 
    {
        $results = array(); //dichiarazione array dove salvare tutti i partner che corrispondono alle preferenze di $user
        $data = file($filename,FILE_IGNORE_NEW_LINES);
        list(,$u_genre,,$u_ptype,$u_os,$min,$max) = $user;
        foreach ($data as $u)  //per ogni riga di file txt 
        {
            $partner = explode(",",$u); //per ogni nuovo ciclo di foreach viene passata la riga di strina suddvidendola tramite "," in $partner
            list(,$p_genre,$p_age,$p_ptype,$p_os) = $partner;
            if ($u_os != $p_os)
                continue; //continue serve per tornare subito al foreach per andare alla seguente riga del file txt, basta che una sola preferenza non rispettata per passare al partner seguente
            if ($u_genre == $p_genre)
                continue;
            if ($p_age < $min || $p_age > $max)
                continue;
            if (match_ptype($u_ptype, $p_ptype)) //invocazione al metodo match_ptype 
                $results[] = $partner;
        }
        return $results;
    }
?>
<?php include "top.html"; ?>
<?php
    //invocazione del metodo serch_user per cercare nel file singles.txt se è contenuto il nome e cognome passsato tramite il metodo GET dalla pagina matches.php
    $user = search_user($_GET["name"], "singles.txt");
?>
<h1>Matches for <?= $user[0]; ?></h1>
<?php
    foreach (match_partners($user, "singles.txt") as $partner) // invocazione metodo match_partners per verificare quale dei utenti registrati nel file txt combaciano con l'utente su cui si sta facendo il match
    {
        list($name,$genre,$age,$ptype,$os) = $partner;
?>
<div class="match">
    <img src="http://www.cs.washington.edu/education/courses/cse190m/12sp/homework/4/user.jpg" alt="user">
    <p><?= $name ?></p>
    <ul>
        <li><strong>gender:</strong><?= $genre ?></li>
        <li><strong>age:</strong><?= $age ?></li>
        <li><strong>type:</strong><?= $ptype ?></li>
        <li><strong>OS:</strong><?= $os ?></li>
    </ul>
</div>
<?php } ?>
<?php include "bottom.html"; ?>