<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?= $title; ?></title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <?php include "partials.php"; ?>
    <main>
        <div class="main-content">
            <h1>Update wachtwoord</h1>
            <!-- php - dynamisch ingelogged -->
            <?php if (isset($_SESSION["cursistId"])) {    ?>
            <form class="main-area__form main-area__form--reset" action="cursist.php" method="POST">
                <div class="helper-bg">
                    <fieldset class="main-area__form-fieldset main-area__fieldset--reset">
                        <legend class="main-area__form-legend--reset main-area__legend">
                            <i class="ri-checkbox-blank-circle-fill">Ik vraag een nieuw paswoord aan:</i>
                        </legend>
                        <input type="radio" name="reset" id="ja" value="ja" />
                        <label for="ja">Ja</label>
                        <input type="radio" name="reset" id="nee" value="nee" />
                        <label for="nee">Nee</label>
                    </fieldset>
                </div>
                <button class="main-area__form-button" type="submit">Verstuur aanvraag</button>
            </form>
            <?= isset($bericht) ?
                    '<div class="bericht bericht--success">' . $bericht . '</div>' : "";
                ?>
            <!-- php - dynamisch ingelogged -->
            <?php } else { ?>
            <!-- php - dynamisch niet ingelogged -->
            <h2>Gelieve in te loggen.</h2>
            <!-- php - dynamisch niet ingelogged -->
            <?php } ?>
        </div>
    </main>
</body>

</html>