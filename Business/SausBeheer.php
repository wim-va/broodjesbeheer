<?php

declare(strict_types=1);
require_once("Data/SausDAO.php.php");
class SausBeheer
{
    // create
    // read
    public function haalAlleSauzen(): array
    {
        $sausDAO = new SausDAO();
        $sauzen = $sausDAO->getAllSauzen();
        return $sauzen;
    }
    public function haalBelegOpId(int $id): ?Saus
    {
        $sausDAO = new SausDAO();
        $saus = $sausDAO->getSausOpId($id);
        return $saus;
    }
    // update
    // delete
}