# AdsSite - Progetto Tecnologie Web
Applicazione web sviluppata in PHP, MySQL, HTML, CSS e JavaScript che permette agli utenti registrati di pubblicare, 
cercare e salvare annunci tramite una piattaforma con autenticazione e gestione sessioni.

## Funzionalità

- Registrazione e login utenti
- Gestione sessioni
- Ricerca annunci per categoria e zona
- Inserimento annunci personali
- Lista preferiti
- Pannello admin
- Validazione input lato client e server
- Protezione contro SQL Injection
- Uso di AJAX per operazioni dinamiche

## Tecnologie utilizzate

- HTML5
- CSS3
- JavaScript
- AJAX
- PHP
- MySQL
- XAMPP

## Struttura del progetto

- `index.html` → pagina login
- `index_registrazione.html` → registrazione utenti
- `mainpageUtente.php` → pagina principale utente
- `ricerca.php` → ricerca annunci
- `login.php` → autenticazione
- `registrazione.php` → creazione account
- `core.php` → connessione database
- `session.php` → gestione sessioni
- `Admin_zone.html` → pannello admin

## Database

Il database MySQL contiene le seguenti tabelle:

- Iscritto
- Annuncio
- Categoria
- Zona
- ListaPreferiti

## Sicurezza

- Password criptate con `password_hash()`
- Verifica password tramite `password_verify()`
- Protezione SQL Injection con `mysqli_real_escape_string()`
- Controllo accesso tramite sessioni PHP
- Scadenza automatica sessione

------------------------------------------------------------------------

# AdsSite - Web Technologies Project

Web application developed using PHP, MySQL, HTML, CSS, and JavaScript that allows registered users to publish, search, and save advertisements through a platform with authentication and session management.

## Features

- User registration and login
- Session management
- Advertisement search by category and area
- Personal advertisement publishing
- Favorites list
- Admin panel
- Client-side and server-side input validation
- SQL Injection protection
- Use of AJAX for dynamic operations

## Technologies Used

- HTML5
- CSS3
- JavaScript
- AJAX
- PHP
- MySQL
- XAMPP

## Project Structure

- `index.html` → login page
- `index_registrazione.html` → user registration
- `mainpageUtente.php` → main user page
- `ricerca.php` → advertisement search
- `login.php` → authentication
- `registrazione.php` → account creation
- `core.php` → database connection
- `session.php` → session management
- `Admin_zone.html` → admin panel

## Database

The MySQL database contains the following tables:

- Iscritto
- Annuncio
- Categoria
- Zona
- ListaPreferiti

## Security

- Passwords encrypted with `password_hash()`
- Password verification using `password_verify()`
- SQL Injection protection with `mysqli_real_escape_string()`
- Access control through PHP sessions
- Automatic session expiration
