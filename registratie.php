<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
require_once "Business/CursistBeheer.php";
$titel = "Broodje App - Registratiepagina";
$bericht = "";
if (!empty($_POST["email"])) {
    $email = $_POST["email"];
    $cursistBeheer = new CursistBeheer();
    $cursistBestaan = $cursistBeheer->haalCursistOpEmail($email);
    if (empty($cursistBestaan)) {
        $cursistBeheer->plaatsCursist($email);
        $bericht = "Registratie geslaagd. Uw paswoord wordt opgestuurd.";
    } else {
        $bericht = "Dit email adres is reeds is gebruik. Kies een ander.";
    }
}
include "Presentatie/registratie.php";