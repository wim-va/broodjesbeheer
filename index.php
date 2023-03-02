<?php

declare(strict_types=1);
session_start();

require_once("Business/BelegBeheer.php");
require_once("Business/FormaatBeheer.php");
require_once("Business/SausBeheer.php");
require_once("Business/SoortBeheer.php");
require_once("Business/CursistBeheer.php");
require_once("Business/BestellingBeheer.php");

if (!empty($_POST["user"])) {

    $cursistBeheer = new CursistBeheer();
    $cursistId = $cursistBeheer->haalCursistId($_POST["user"], $_POST["pass"]);
    if ($cursistId > 0) {
        $_SESSION["cursistId"] = $cursistId;
        header("location: bestelling.php");
        echo "succes";
    } else {
        $_SESSION["error"] = "Onjuiste combinatie e-mail / paswoord";
        echo "fail";
    }
}






include("Presentation/login.php");