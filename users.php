<?php

declare(strict_types=1);
spl_autoload_register();
$title = "Broodje App - User Data";
require_once "Business/CursistBeheer.php";
$cursistBeheer = new CursistBeheer();
$users = $cursistBeheer->haalCursisten();
include "Presentation/users.php";
include "Presentation/users.php";
include "Presentation/users.php";
include "Presentation/users.php";
include "Presentation/users.php";