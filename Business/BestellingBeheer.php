<?php

declare(strict_types=1);
require_once("Data/BestellingDAO.php");
class BestellingBeheer
{
    // create
    public function plaatsBestelling(int $belegId, int $formaatId, int $sausId, int $soortId, int $cursistId): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->maakBestelling($belegId, $formaatId, $sausId, $soortId, $cursistId);
    }
    // read
    public function haalAlleBestellingen(): array
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingen = $bestellingDAO->getAllBestellingen();
        return $bestellingen;
    }
    public function haalBestellingOpId(int $id): ?Bestelling
    {
        $bestellingDAO = new BestellingDAO();
        $bestelling = $bestellingDAO->getBestellingOpId($id);
        return $bestelling;
    }
    public function haalBestellingenOpCursist(int $cursistId): ?array
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingen = $bestellingDAO->getBestellingenOpCursist($cursistId);
        return $bestellingen;
    }
    public function haalBestellingenOpDatum(string $datum): ?array
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingen = $bestellingDAO->getBestellingenOpDatum($datum);
        return $bestellingen;
    }
    // update
    // delete
    public function verwijderBestelling(int $id): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->verwijderBestellingOpId($id);
    }
    public function verwijderBestellingenCursist(int $cursistId): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->verwijderBestellinengOpCursist($cursistId);
    }
    public function verwijderBestellingenDatum(string $datum): void
    {
        $bestellingDAO = new BestellingDAO();
        $bestellingDAO->verwijderBestellinengOpDatum($datum);
    }
}