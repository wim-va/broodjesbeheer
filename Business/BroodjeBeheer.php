<?php

declare(strict_types=1);
require_once("Data/BroodjeDAO.php");
class BroodjeBeheer
{
    // create
    // read
    public function haalBroodjes(): array
    {
        $broodjeDAO = new BroodjeDAO();
        $broodjes = $broodjeDAO->getAllBroodjes();
        return $broodjes;
    }
    public function haalBroodjeOpId(int $id): ?Broodje
    {
        $broodjeDAO = new BroodjeDAO();
        $broodje = $broodjeDAO->getBroodjeOpId($id);
        return $broodje;
    }
    public function haalIdBroodje(int $belegId, int $formaatId, int $sausId, int $soortId): ?int
    {
        $broodjeDAO = new BroodjeDAO();
        $broodjes = $broodjeDAO->getIdBroodje($belegId,  $formaatId,  $sausId,  $soortId);
        return $broodjes;
    }
    // update
    // delete 
}