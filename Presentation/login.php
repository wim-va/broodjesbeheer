<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $titel; ?></title>
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/broodje.css">
</head>

<body>
    <?php include "partials.php"; ?>
    <main>
        <div class="main-content">
            <h1>Log in</h1>
            <form action="/" method="POST" class="main-area__form main-area__form--log-in">
                <div class="email">
                    <label class="main-area__form-label" for="user">Email:</label>
                    <input class="main-area__form-input" type="text" name="user" id="user" required />
                </div>
                <div class="password">
                    <label class="main-area__form-label" for="pass">Wachtwoord:</label>
                    <input class="main-area__form-input" type="text" name="pass" id="pass" required />
                </div>
                <button class="main-area__form-button" type="submit">Log in</button>
            </form>
            <?= isset($_SESSION["error"]) ? $_SESSION["error"] : ""; ?>
        </div>
    </main>
</body>

</html>