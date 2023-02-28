<?php

declare(strict_types=1);
require_once("Data/SoortDAO.php");
class SoortBeheer
{
    // create
    // read
    public function haalAlleSoorten(): array
    {
        $soortDAO = new SoortDAO();
        $soorten = $soortDAO->getAllSoorten();
        return $soorten;
    }
    public function haalSoortOpId(int $id): ?int
    {
        $soortDAO = new SoortDAO();
        $soort  = $soortDAO->getSoortOpId($id);
        return $soort;
    }
    // update
    // delete
}