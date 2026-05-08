<!-- 
    Nome: Matteo
	Cognome: Lattanzio

	Consegna numero 4: sito web di incontri NerdLuv dove puoi fare la registrazione e ,una volta fatta la registrazione, poter trovare 
	con gli utenti registrati in base alle preferenze prettamente nerd 
	inserite attraverso la pagina match tramite il nome e cognome inserito.

    Pagina php che registra le informazioni dell'utente per inviarle tramite il metodo POST alla pagina signup-submit dove verra'
    confermata la registrazione.
-->
<?php include "top.html"; ?>
<!DOCTYPE html>
<html lang="en">

    <head>
        <link href="nerdluv.css" rel="stylesheet" type="text/css">
        <meta charset="UTF-8">
        <title>Signup</title>   
    </head>

    <form action="signup-submit.php" method="POST">
        <div class="colums">
        <fieldset>
            
            <legend>New User Signup:</legend>
            
            <p><strong> Name: </strong>
            <input type="text" size="16" name="name"> </p>

            <p><strong> Gender: </strong>
            <label><input type="radio" name="cc" value="M"> male </label>
            <label><input type="radio" name="cc" value="F" checked="checked"> female </label> </p>

            <p><strong> Age:</strong>
            <input type="text" size="6" maxlength="2" name="age"></p>

            <p><strong> Personality type: </strong>
            <input type="text" size="6" maxlength="4" name="personality"> (<a href= "http://www.humanmetrics.com/cgi-win/JTypes2.asp">Don't know your type?</a>) 
            </p>

            <p><strong> Favorite OS: </strong>
            <select name="favoriteSO">
            <option vale="Linux"selected="selected">Linux</option>
            <option value="Windows">Windows</option>
            <option value="Mac OS X">Mac OS X</option>
            </select> </p>

            <p><strong> Seeking Age: </strong>
            <input type="text" size="6" maxlength="2" placeholder="min" name="min"> to 
            <input type="text" size="6" maxlength="2" placeholder="max" name="max"> </p>

            <input type="submit" value="Sign Up">

        </fieldset>
        </div>
        </form>



<?php include "bottom.html"; ?>