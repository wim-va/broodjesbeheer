<?php

declare(strict_types=1);
session_start();
$titel = "Broodje App - Bestelpagina";

// session_destroy();
// header("location: index.php");

require_once("Business/BelegBeheer.php");
require_once("Business/FormaatBeheer.php");
require_once("Business/SausBeheer.php");
require_once("Business/SoortBeheer.php");
require_once("Business/CursistBeheer.php");
require_once("Business/BestellingBeheer.php");






$belegBeheer = new BelegBeheer();
$belegLijst = $belegBeheer->haalAlleBeleg();

$formaatBeheer = new FormaatBeheer();
$formaatLijst = $formaatBeheer->haalAlleFormaten();

$sausBeheer = new SausBeheer();
$sausLijst = $sausBeheer->haalAlleSauzen();

$soortBeheer = new SoortBeheer();
$soortLijst = $soortBeheer->haalAlleSoorten();

$broodjes = array("beleg" => $belegLijst, "formaat" => $formaatLijst, "saus" => $sausLijst, "soort" => $soortLijst);

$bestellingBeheer = new BestellingBeheer();



if (!empty($_POST)) {
    $cursistId = intval($_SESSION["cursistId"]);
    $aantal = count($_POST) / 4;
    for ($i = 1; $i <= $aantal; $i++) {
        $beleg = intval($_POST["beleg" . $i]);
        $formaat = intval($_POST["formaat" . $i]);
        $saus = intval($_POST["saus" . $i]);
        $soort = intval($_POST["soort" . $i]);
        $bestellingBeheer->plaatsBestelling($beleg, $formaat, $saus, $soort, $cursistId);
    }
    $bericht = "Bestelling geplaatst.";
}
include "Presentation/broodje.php";
