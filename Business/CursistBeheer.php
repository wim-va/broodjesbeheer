<?php

declare(strict_types=1);
require_once("Data/CursistDAO.php");
class CursistBeheer
{ // create
    public function plaatsCursist(string $email): void
    {
        $cursistDAO = new CursistDAO();
        $cursistDAO->maakCursist($email);
    }
    // read
    public function haalCursisten(): array
    {
        $cursistDAO = new CursistDAO();
        $cursisten = $cursistDAO->getAllCursisten();
        return $cursisten;
    }
    public function haalCursistOpId(int $cursistId): ?Cursist
    {
        $cursistDAO = new CursistDAO();
        $cursist = $cursistDAO->getCursistOpId($cursistId);
        return $cursist;
    }
    public function haalCursistOpEmail(string $email): ?Cursist
    {
        $cursistDAO = new CursistDAO();
        $cursist = $cursistDAO->getCursistOpEmail($email);
        return $cursist;
    }
    public function haalCursistId(string $email, string $wachtwoord): int
    {
        $cursistDAO = new CursistDAO();
        $cursistId = $cursistDAO->getCursistId($email, $wachtwoord);
        return $cursistId;
    }
    // update
    public function vervangWachtwoord(int $cursistId)
    {
        $cursistDAO = new CursistDAO();
        $cursistDAO->updateWachtwoord($cursistId);
    }
    // delete
}