<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
$titel = "Broodje App - Besteloverzicht";
$bericht = "";
require_once "Business/BestellingBeheer.php";
require_once "Business/BelegBeheer.php";
require_once "Business/BroodjeBeheer.php";
require_once "Business/CursistBeheer.php";
require_once "Business/FormaatBeheer.php";
require_once "Business/SausBeheer.php";
require_once "Business/SoortBeheer.php";
if (isset($_SESSION["cursistId"])) {
    $cursistId = intval($_SESSION["cursistId"]);
    $bestellingBeheer = new BestellingBeheer();
    $bestelling = $bestellingBeheer->haalBestellingenOpCursist($cursistId);
    if (empty($bestelling)) {
        $bericht = "U heeft geen openstaande bestelling.";
    }
}
if (isset($_GET["broodje"])) {
    header("Refresh:1");
    // header("location: bestelling.php");
    $bestellingBeheer = new BestellingBeheer();
    $bestellingBeheer->verwijderBestelling($_GET["broodje"]);
    $bericht = "Bestelling is verwijderd";
    header('location: bestelling.php');
}
include "Presentation/bestelling.php";