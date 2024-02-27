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

    $lower_alphabet = [ "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z" ];
    $upper_alphabet = [];
    $symbols = [ "!", "£", "?", "^", "@", "#", "-", "_", ".", ",", ":", ";", "[", "]", "{", "}", "€" ];

    foreach ($lower_alphabet as $item) {
        $upper_alphabet[] = ucfirst($item);
    }

    $p_length = (int)$_GET["password_length"];
    $generated_pw = "";

    var_dump($p_length);

    function extract_item($array) {
        return $array[rand(0, count($array)-1)];
    }

    function pw_generator ($pw_length, $lower_alphabet, $upper_alphabet, $symbols) {
        $generated_pw = "";

        for ($i=0; $i < $pw_length; $i++) { 
            switch (rand(1, 3)) {
                case 1:
                    // lower
                    $generated_pw .= extract_item($lower_alphabet);
                    break;
                case 2:
                    // upper
                    $generated_pw .= extract_item($upper_alphabet);
                    break;
                case 3:
                    // symbols
                    $generated_pw .= extract_item($symbols);
                    break;
            }
        }

        return $generated_pw;
    }

    $password = pw_generator($p_length, $lower_alphabet, $upper_alphabet, $symbols);

    var_dump($password);

    echo $password;

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

    <form action="index.php" method="get">
        <label for="password_length">Lunghezza password</label>
        <input name="password_length" type="number" min=8 max=16>
        <p class="form-text text-muted">(La password deve essere lunga minimo 8 caratteri e massimo 16)</p>
        <button class="btn btn-primary" type="submit">Genera</button>
    </form>


    <!-- Js Boostrap -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js' integrity='sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==' crossorigin='anonymous'></script>
</body>

</html>