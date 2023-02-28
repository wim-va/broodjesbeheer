<?php
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title><?php $titel; ?></title>
    <link rel="stylesheet" href="css/reset.css" />
    <link rel="stylesheet" href="css/main.css" />
</head>

<body>
    <?php include "partials.php"; ?>
    <main>
        <div class="main-content">
            <h1>Overzicht bestelling</h1>
            <?php
            if (isset($_SESSION["cursistId"])) {
                if (isset($bestelling)) {
            ?>
            <div class="main-area__form main-area__overzicht" action="broodje.php" method="POST">
                <table class="main-area__tabel main-area__tabel--overzicht">
                    <thead>
                        <tr>
                            <th>beleg</th>
                            <th>formaat</th>
                            <th>saus</th>
                            <th>brood</th>
                            <th>prijs</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bestelling as $naam => $broodje) { ?>
                        <tr>
                            <td><?= $broodje["beleg"]; ?></td>
                            <td><?= $broodje["formaat"]; ?></td>
                            <td><?= $broodje["saus"]; ?></td>
                            <td><?= $broodje["soort"]; ?></td>
                            <td>€ <?= number_format($broodje["som"], 2); ?></td>
                            <td>
                                <a href="bestelling.php?broodje=<?= $broodje["id"]; ?>">Verwijder broodje</a>
                            </td>
                        </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
            <div class="bericht"><?= $bericht; ?></div>
            <?php } else { ?>
            <h2>U heeft geen bestellingen.</h2>
            <?php }
            } else { ?>
            <h2>Gelieve in te loggen voor uw overzicht.</h2>
            <?php }  ?>
        </div>
    </main>
</body>

</html>