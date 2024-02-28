<?php

session_start();

// echo $_SESSION['password'];

?>


<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <!-- CSS Bootstrap -->
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/css/bootstrap.min.css' integrity='sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==' crossorigin='anonymous' />
</head>
<body class="vh-100">
    
    <div class="container h-100 d-flex justify-content-center align-items-center">
        <div class="row text-center justify-content-center">
            <h1>La password generata è: </h1>
            <div class="bg-white text-center text-dark border border-5 rounded-3 py-2 px-4 w-auto">
                <span class="fs-2"><?= $_SESSION['password'] ?></span>
            </div>
        </div>
    </div>

    <!-- Js Boostrap -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.3/js/bootstrap.bundle.min.js' integrity='sha512-7Pi/otdlbbCR+LnW+F7PwFcSDJOuUJB3OxtEHbg4vSMvzvJjde4Po1v4BR9Gdc9aXNUNFVUY+SK51wWT8WF0Gg==' crossorigin='anonymous'></script>
</body>
</html>
