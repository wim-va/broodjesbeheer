<?php

declare(strict_types=1);
spl_autoload_register();
session_start();
require_once "Business/CursistBeheer.php";
$titel = "Broodje App - Log In";
if (isset($_POST["user"])) {
    $email = $_POST["user"];
    $wachtwoord = $_POST["pass"];
    $cursistBeheer = new CursistBeheer();
    $cursistId = $cursistBeheer->haalCursistId($email, $wachtwoord);
    if (!empty($cursistId)) {
        $_SESSION["cursistId"] = $cursistId;
        unset($_SESSION["error"]);
        header("location: broodje.php");
    } else {
        $_SESSION["error"] = "Onjuiste combinatie email/wachtwoord.";
        header('location: .');
    }
}
include "Presentation/login.php";