<?php

declare(strict_types=1);
session_start();
$titel = "Broodje App - Overzicht gebruikers";

require_once("Business/CursistBeheer.php");
$cursistBeheer = new CursistBeheer();
$users = $cursistBeheer->haalAlleCursisten();

include "presentation/users.php";