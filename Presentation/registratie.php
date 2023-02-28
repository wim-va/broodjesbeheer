<?php
?>
<!DOCTYPE html>
<html lang="nl">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $titel; ?></title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <?php include "partials.php"; ?>
    <main>
        <div class="main-content">
            <h1>Registratieformulier</h1>
            <form action="registratie.php" method="POST" class="main-area__form main-area__form--registreer">
                <div class="email">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" required />
                </div>
                <button type="submit">Registreer</button>
            </form>
            <div class="bericht"><?= $bericht; ?></div>
        </div>
    </main>
</body>

</html>