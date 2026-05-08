/* 
    Nome: Alessandro Ragonese
    Corso: Tecnologie web
*/

var MAX_LINE_COL = 4;
var hole = [4,4];

/**
 * Rimuove ogni className e ogni evento onclick dei div tile, in questo
 * modo la griglia di gioco non conterrà alcuna casella selezionabile.
 */
function removeSelection() {
    var tiles = document.querySelectorAll("#puzzlearea div");
    for (var i = 0; i < tiles.length; i++) {
        tiles[i].onclick = null;
        tiles[i].removeAttribute("class");
    }
    if (!tiles.length)
        alert("An error is occured: please reload the page.");
}

/**
 * Imposta le corrette caselle selezionabili correlati al buco nel puzzle.
 * Una casella selezionabile è una casella che può essere cliccata e che 
 * restituisce un feedback quando il cursore del mouse la attraversa.
 * In una griglia 3x3 dove il buco si trova al centro con coordinate (y = 0, x = 0),
 * la funzione effettuerà un controllo sulle caselle adiacenti, ossia:
 * (1) casella (-1, 0);
 * (2) casella ( 0, 1);
 * (3) casella ( 1, 0);
 * (4) casella ( 0,-1).
 * I quattro pezzi diventano selezionabili se rientrano nei confini della griglia
 * di gioco.
 */
function setSelection() {
    var yup = hole[0] - 1;
    var ydown = hole[0] + 1;
    var xleft = hole[1] - 1;
    var xright = hole[1] + 1;
    if (yup >= 1) {
        var elem = getTile(yup, hole[1]);
        if (!elem)
            return false;
        elem.className = "selectable";
        elem.onclick = moveTile;
    }
    if (xright <= MAX_LINE_COL) {
        var elem = getTile(hole[0], xright);
        if (!elem)
            return false;
        elem.className = "selectable";
        elem.onclick = moveTile;
    }
    if (ydown <= MAX_LINE_COL) {
        var elem = getTile(ydown, hole[1]);
        if (!elem)
            return false;
        elem.className = "selectable";
        elem.onclick = moveTile;
    }
    if (xleft >= 1) {
        var elem = getTile(hole[0], xleft);
        if (!elem)
            return false;
        elem.className = "selectable";
        elem.onclick = moveTile;
    }
    return true;
}

/**
 * Crea e imposta un paragrafo per la stampa del messaggio nella sezione di controllo,
 * utile per informare l'utente di una meritata vittoria.
 * @param {string} message messaggio da stampare.
 */
function setMessage(message) {
    if (!message)
        return;
    var pstate = document.createElement("p");
    pstate.id = "message";
    pstate.textContent = message.toString();
    var controls = document.getElementById("controls");
    if (controls)
        controls.appendChild(pstate);
}

/**
 * Se esiste, pulisce il paragrafo messsage nella sezione di controllo. 
 */
function clearMessage() {
    var pstate = document.getElementById("message");
    if (!pstate)
        return;
    pstate.parentNode.removeChild(pstate);
}

/**
 * Verifica se il puzzle è stato completato con successo.
 * Il puzzle è completato quando tutti i pezzi del puzzle sono nell'ordine
 * corretto.
 * @returns true se e solo se il gioco è terminato, false altrimenti
 */
function isOver() {
    var tiles = document.querySelectorAll("#puzzlearea div");
    if (tiles.length == 0)
        return -1;
    for (var i = 0; i < tiles.length; i++) {
        var expid = "tile_" + (parseInt(i/4)+1) + "_"+ (i%4+1);
        if (tiles[i].id != expid)
            return false;
    }
    return true;
}

/**
 * Validazione delle nuove coordinate da sostituire per il buco.
 * Le coordinate sono valide se rientrano nei confini del puzzle da gioco
 * e se corrispondono a caselle adiacenti al buco.
 * @param {number} y coordinata y >= 0 e <= MAX_LINE_COL
 * @param {number} x coordinata x >= 0 e <= MAX_LINE_COL
 * @returns true, se la validazione è andata a buon fire, false altrimenti.
 */
function checkNewHole(y, x) {
    if (!y || !x)
        return false;
    y = parseInt(y) >>> 0;
    x = parseInt(x) >>> 0;
    if (y > MAX_LINE_COL || x > MAX_LINE_COL)
        return false;
    if (y != hole[0]) {
        if (Math.abs(y - hole[0]) != 1 || x != hole[1])
            return false;
    } else {
        if (Math.abs(x - hole[1]) != 1)
            return false;
    }
    return true;
}

/**
 * Scambia le coordinate del buco con quelle della casella scelta, se esiste.
 * @param {number} y coordinata y della casella.
 * @param {number} x coordinata x della casella.
 */
function swapTile(y, x) {
    var elem;
    if (elem = getTile(y, x)) {
        elem.id = "tile_" + hole[0] + "_" + hole[1];
        hole[0] = parseInt(y);
        hole[1] = parseInt(x);
    }
}

/**
 * Sposta la casella che ha richimato la funzione nelle coordinate del buco,
 * se la mossa è consentita.
 */
function moveTile() {
    if (!this.id || this.id.indexOf("tile_") != 0)
        return;
    var pos = this.id.substring(5,8).split("_");
    if (pos.length < 2 || !checkNewHole(pos[0], pos[1]))
        return;
    removeSelection();
    swapTile(pos[0], pos[1]);
    var matchres = isOver();
    if (matchres === -1)
        alert("An error is occured: please reload the page.");
    else if (!matchres) {
        if (!setSelection())
            alert("An error is occured: please reload the page.");
    } else {
        document.getElementById("shufflebutton").onclick = shuffle;
        setMessage("You win!");
    }
}

/**
 * Restituisce la casella corrispondente alle coordinate passate, se questa
 * esiste.
 * @param {number} y coordinata y della casella. 
 * @param {number} x coordinata x della casella.
 * @returns l'oggetto corrispondente alla casella se esiste, altrimenti undefined.
 */
function getTile(y, x) {
    if (!y || !x)
        return false;
    return document.getElementById("tile_" + y + "_" + x);
}

/**
 * Algoritmo di mescolamento dei tasselli del puzzle. E' un alogoritmo
 * prettamente randomizzato. Effettua dalle 100 alle 200 volte una delle scelte
 * possibili tra le quattro caselle adiacenti al buco, se esse esistono.
 */
function shuffle() {
    var n = parseInt(Math.random() * 100) + 100;
    for (var i = 0; i < n; i++) {
        var offset = [1,-1];
        var dir = parseInt(Math.random() * 2);
        var to = parseInt(Math.random() * 2);
        var y = hole[0]+offset[to]*dir;
        var x = hole[1]+offset[to]*(~dir & 0x1);
        if (checkNewHole(y, x)) {
            swapTile(y, x);
        }
    }
    this.onclick = null;
    setSelection();
    clearMessage();
}

/**
 * Preset del puzzle.
 */
window.onload = function () {
    var tiles = document.getElementById("puzzlearea").children;
    for (var i = 0; i < tiles.length; i++) {
        tiles[i].id = "tile_" + (parseInt(i/4)+1) + "_"+ (i%4+1);
    }
    document.getElementById("shufflebutton").onclick = shuffle;
}