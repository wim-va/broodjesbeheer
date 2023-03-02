<?php

declare(strict_types=1);
session_start();

// algemeen gedeelte
require_once("Business/BelegBeheer.php");
require_once("Business/FormaatBeheer.php");
require_once("Business/SausBeheer.php");
require_once("Business/SoortBeheer.php");
require_once("Business/BestellingBeheer.php");

if (isset($_SESSION["cursistId"])) {
    $bericht = "";
    $cursistId = intval($_SESSION["cursistId"]);

    $belegBeheer = new BelegBeheer();
    $belegLijst = $belegBeheer->haalAlleBeleg();

    $formaatBeheer = new FormaatBeheer();
    $formaatLijst = $formaatBeheer->haalAlleFormaten();

    $sausBeheer = new SausBeheer();
    $sausLijst = $sausBeheer->haalAlleSauzen();

    $soortBeheer = new SoortBeheer();
    $soortLijst = $soortBeheer->haalAlleSoorten();

    $bestellingBeheer = new BestellingBeheer();

    $bestellingBeheer = new BestellingBeheer();
    $bestellingLijst = $bestellingBeheer->haalBestellingenOpCursist($cursistId);
    if (empty($bestellingLijst)) {
        $bericht = "U heeft geen bestellingen";
    }
}

if (isset($_GET["verwijder"])) {
    $bestellingBeheer->verwijderBestelling(intval($_GET["verwijder"]));
}

include("Presentation/bestelling.php");