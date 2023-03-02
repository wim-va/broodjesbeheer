<?php

declare(strict_types=1);
session_start();

// algemeen gedeelte
require_once("Business/CursistBeheer.php");
$cursistBeheer = new CursistBeheer();
$cursistLijst = $cursistBeheer->haalAlleCursisten();

$titel = "Broodje App - Reset wachtwoord";
$bericht = "";

if (isset($_POST["reset"])) {
    if ($_POST["reset"]) {
        $cursistId = intval($_SESSION["cursistId"]);
        $cursistBeheer->vervangWachtwoord($cursistId);
        $bericht = "Uw nieuw wachtwoord is naar uw mailbox verstuurd";
    } else {
        $bericht = "Uw aanvraag werd geannuleerd";
    }
}
include("Presentation/admin.php");