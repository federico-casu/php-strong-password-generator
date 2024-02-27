<?php

/* ------------------------------------------------------------------------------

        Descrizione
        Dobbiamo creare una pagina che permetta ai nostri utenti di utilizzare il nostro generatore di password (abbastanza) sicure.

        L’esercizio è suddiviso in varie milestone ed è molto importante svilupparle in modo ordinato.

        Milestone 1
        Creare un form che invii in GET la lunghezza della password. Una nostra funzione utilizzerà questo dato per generare una password casuale (composta da lettere, lettere maiuscole, numeri e simboli) da restituire all’utente.
        Scriviamo tutto (logica e layout) in un unico file index.php

        Milestone 2
        Verificato il corretto funzionamento del nostro codice, spostiamo la logica in un file functions.php che includeremo poi nella pagina principale

        Milestone 3 (BONUS)
        Invece di visualizzare la password nella index, effettuare un redirect ad una pagina dedicata che tramite $_SESSION recupererà la password da mostrare all’utente.

        Milestone 4 (BONUS)
        Gestire ulteriori parametri per la password: quali caratteri usare fra numeri, lettere e simboli. Possono essere scelti singolarmente (es. solo numeri) oppure possono essere combinati fra loro (es. numeri e simboli, oppure tutti e tre insieme).
        Dare all’utente anche la possibilità di permettere o meno la ripetizione di caratteri uguali.

    ------------------------------------------------------------------------------ */
// avvio la sessione
session_start();

$lower_alphabet = ["a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z"];
$upper_alphabet = [];
$symbols = ["!", "£", "?", "^", "@", "#", "-", "_", ".", ",", ":", ";", "[", "]", "{", "}", "€"];

foreach ($lower_alphabet as $item) {
    $upper_alphabet[] = ucfirst($item);
}

if (!isset($_GET["password_length"])) {
    $_GET["password_length"] = null;
}

if (!isset($_GET["repeat"])) {
    $_GET["repeat"] = null;
}

if (!isset($_GET["whitch_char"])) {
    $_GET["whitch_char"] = [];
}

$p_length = (int)$_GET["password_length"];
$repeat = $_GET["repeat"];
// $chars[] = $_GET["whitch_char"];
$chars = $_GET["whitch_char"];

include_once __DIR__ . '/functions.php';

$password = pw_generator($p_length, $repeat, $chars, $lower_alphabet, $upper_alphabet, $symbols);

$_SESSION['password'] = $password;
// $_SESSION['chars'] = $chars;

if ($p_length != null) {
    header('Location: ./success.php');
}

?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP Strong Password Generator</title>

    <!-- CSS Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
</head>

<body>

    <div class="container-fluid py-5 px-3">
        <div class="container">
            <h1 class="text-center">Strong password generator</h1>
            <h2 class="text-center">Genera una password sicura</h2>
            <div class="row justify-content-center bg-white py-3 rounded-3 mt-4">
                <form class="col-8 d-flex flex-column align-items-start bg-primary-subtle p-3 rounded-3 " action="index.php" method="get">
                    <label class="my-2" for="password_length">Lunghezza password</label>
                    <input name="password_length" type="number" min=8 max=16>
                    <p class="form-text text-muted">(La password deve essere lunga minimo 8 caratteri e massimo 16)</p>

                    <label class="my-2" for="repeat">Consenti ripetizione caratteri</label>
                    <div>
                        <input type="radio" name="repeat" value="1">
                        <label class="me-2" for="repeat">Si</label>
                        <input type="radio" name="repeat" value="0">
                        <label for="repeat">No</label>
                    </div>

                    <label class="my-2" for="whitch_char">Includi:</label>
                    <div>
                        <input type="checkbox" name="whitch_char[]" value="lower_alphabet" id="lower_alphabet">
                        <label class="me-2" for="lower_alphabet">Lettere minuscole</label>
                        <input type="checkbox" name="whitch_char[]" value="upper_alphabet" id="upper_alphabet">
                        <label for="upper_alphabet">Lettere Maiuscole</label>
                        <input type="checkbox" name="whitch_char[]" value="numbers" id="numbers">
                        <label for="numbers">Numeri</label>
                        <input type="checkbox" name="whitch_char[]" value="symbols" id="symbols">
                        <label for="symbols">Simboli</label>
                    </div>
                    <button class="btn btn-primary mt-3" type="submit">Genera</button>
                </form>
            </div>

        </div>
    </div>
    </div>



    <!-- Js Boostrap -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js' integrity='sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==' crossorigin='anonymous'></script>
</body>

</html>