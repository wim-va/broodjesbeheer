<?php
// mogelijke uitbreiding: verwijderen overbodige rij voor bestellen
declare(strict_types=1);
spl_autoload_register();
session_start();
$titel = "Broodje App - Bestelpagina";
require_once "Business/BelegBeheer.php";
require_once "Business/BestellingBeheer.php";
require_once "Business/BroodjeBeheer.php";
// require_once "Business/CursistBeheer.php";
require_once "Business/FormaatBeheer.php";
require_once "Business/SausBeheer.php";
require_once "Business/SoortBeheer.php";
$melding = "";
if (!empty($_POST)) {
    $broodjeBeheer = new BroodjeBeheer();
    $bestellingBeheer = new BestellingBeheer();
    $cursistId = intval($_SESSION["cursistId"]);
    $aantal = count($_POST) / 4;
    for ($i = 1; $i <= $aantal; $i++) {
        $beleg = intval($_POST["beleg" . $i]);
        $formaat = intval($_POST["formaat" . $i]);
        $saus = intval($_POST["saus" . $i]);
        $soort = intval($_POST["soort" . $i]);
        $broodjeId =   $broodjeBeheer->haalIdBroodje($beleg, $formaat, $saus, $soort);
        $bestellingBeheer->plaatsBestelling($cursistId, $broodjeId);
    }
    // terugsturen naar bestelpg met session var met
    $bericht = "Bestelling geplaatst.";
}
$belegBeheer = new BelegBeheer();
$belegs = $belegBeheer->haalAlleBeleg();
$formaatBeheer = new FormaatBeheer();
$formaten = $formaatBeheer->haalAlleFormaten();
$sausBeheer = new SausBeheer();
$sauzen = $sausBeheer->haalAlleSauzen();
$soortBeheer = new SoortBeheer();
$soorten = $soortBeheer->haalAlleSoorten();
$broodjes = array("beleg" => $belegs, "formaat" => $formaten, "saus" => $sauzen, "soort" => $soorten);
include "Presentation/broodje.php";
