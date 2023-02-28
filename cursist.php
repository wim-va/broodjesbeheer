<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
require_once "Business/CursistBeheer.php";
$title = "Broodje App - Reset wachtwoord";
$bericht = "";
if (isset($_POST["reset"])) {
    if ($_POST["reset"] === "ja") {
        $cursistId = intval($_SESSION["cursistId"]);
        $cursistBeheer = new CursistBeheer();
        $cursistBeheer->vervangWachtwoord($cursistId);
        $bericht = "Uw nieuw wachtwoord is naar uw mailbox verstuurd";
    } else {
        $bericht = "Uw aanvraag werd geannuleerd";
    }
}
include "Presentation/cursist.php";