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
                if (isset($bestellingLijst)) {
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
                            <th>verwijder</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($bestellingLijst as $bestelling) { ?>
                        <tr>
                            <td>
                                <?= $belegLijst[$bestelling->getBelegId() - 1]->getNaam(); ?>
                            </td>
                            <td>
                                <?= $formaatLijst[$bestelling->getFormaatId() - 1]->getNaam(); ?>
                            </td>
                            <td>
                                <?= $sausLijst[$bestelling->getSausId() - 1]->getNaam(); ?>
                            </td>
                            <td>
                                <?= $soortLijst[$bestelling->getSoortId() - 1]->getNaam(); ?>
                            </td>
                            <td>
                                <?= $belegLijst[$bestelling->getBelegId() - 1]->getPrijs() +
                                                $formaatLijst[$bestelling->getFormaatId() - 1]->getPrijs() +
                                                $sausLijst[$bestelling->getSausId() - 1]->getPrijs() +
                                                $soortLijst[$bestelling->getSoortId() - 1]->getPrijs(); ?>
                            </td>
                            <td>
                                <a href="/bestelling.php?verwijder=<?= $bestelling->getId(); ?>">verwijder broodje</a>
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