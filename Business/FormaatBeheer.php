<?php

declare(strict_types=1);
require_once("Data/FormaatDAO.php");


class FormaatBeheer
{
    // create
    // read
    public function haalAlleFormaten(): array
    {
        $formaatDAO = new FormaatDAO();
        $alleFormaten = $formaatDAO->getAllFormaten();
        return $alleFormaten;
    }
    public function haalFormaatOpId(int $id): ?Formaat
    {
        $formaatDAO = new FormaatDAO();
        $formaat = $formaatDAO->getFormaatOpId($id);
        return $formaat;
    }
    // update
    // delete
}