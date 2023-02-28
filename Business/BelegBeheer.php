<?php

declare(strict_types=1);
require_once("Data/BelegDAO.php");

class BelegBeheer
{
    // create
    // read
    public function haalAlleBeleg(): array
    {
        $belegDAO = new BelegDAO();
        $alleBeleg = $belegDAO->getAllBelegs();
        return $alleBeleg;
    }
    public function haalBelegOpId(int $id): ?Beleg
    {
        $belegDAO = new BelegDAO();
        $beleg = $belegDAO->getBelegOpId($id);
        return $beleg;
    }
    // update
    // delete
}