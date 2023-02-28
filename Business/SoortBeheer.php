<?php

declare(strict_types=1);
require_once("Data/SoortDAO.php");
class SoortBeheer
{
    // create
    // read
    public function haalAlleBeleg()
    {
        $belegDAO = new BelegDAO();
        $alleBeleg = $belegDAO->getAllBelegs();
        return $alleBeleg;
    }
    public function haalBelegOpId(int $id)
    {
        $belegDAO = new BelegDAO();
        $beleg = $belegDAO->getBelegOpId($id);
        return $beleg;
    }
    // update
    // delete
}