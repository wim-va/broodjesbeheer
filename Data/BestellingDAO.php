<?php

declare(strict_types=1);
require_once("Entities/Bestelling.php");
require_once("DBConfig.php");
class BestellingDAO
{
    // create
    public function plaatsNieuweBestelling(int $broodjeId, int $cursistId): void
    {
        $bestellingDatum = $this->getDate();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "INSERT INTO bestelling(broodjeId, cursistId, bestellingDatum) VALUES(:broodjeId, :cursistId, :bestellingDatum);";
        $smt = $dbh->prepare($sql);
        $smt->execute([
            ":broodjeId" => $broodjeId,
            ":cursistId" => $cursistId,
            ":bestellingDatum" => $bestellingDatum,
        ]);
        $dbh = null;
    }
    // read
    public function getAllBestellingen(): array
    {
        $bestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM bestelling;";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {
            $bestelling = new Bestelling(
                $result["bestellingId"],
                $result["broodjeId"],
                $result["cursistId"],
                $result["bestellingDatum"],
            );
            array_push($bestellingen, $bestelling);
        }
        $dbh = null;
        return $bestellingen;
    }
    public function getBestellingOpId(int $bestellingId): ?Bestelling
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM bestelling WHERE bestellingId = :bestellingId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":bestellingId" => $bestellingId]);
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        $dbh = null;
        if (!empty($result)) {
            $bestelling = new Bestelling(
                $result["bestellingId"],
                $result["broodjeId"],
                $result["cursistId"],
                $result["bestellingDatum"],
            );
            return $bestelling;
        } else {
            return null;
        }
    }
    public function getBestellingenOpCursist(int $cursistId): ?array
    {
        $cursistBestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM bestelling WHERE cursistId = :cursistId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":cursistId" => $cursistId]);
        $dbh = null;
        $result = $smt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultSet)) {
            foreach ($resultSet as $result) {
                $bestelling = new Bestelling(
                    $result["bestellingId"],
                    $result["broodjeId"],
                    $result["cursistId"],
                    $result["bestellingDatum"],
                );
                array_push($resultSet, $result);
            }
            return $cursistBestellingen;
        } else {
            return null;
        }
    }
    public function getBestellingenOpDatum(string $bestellingDatum): ?array
    {
        $cursistBestellingen = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM bestelling WHERE bestellingDatum = :bestellingDatum;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":bestellingDatum" => $bestellingDatum]);
        $dbh = null;
        $result = $smt->fetchAll(PDO::FETCH_ASSOC);
        if (!empty($resultSet)) {
            foreach ($resultSet as $result) {
                $bestelling = new Bestelling(
                    $result["bestellingId"],
                    $result["broodjeId"],
                    $result["cursistId"],
                    $result["bestellingDatum"],
                );
                array_push($resultSet, $result);
            }
            return $cursistBestellingen;
        } else {
            return null;
        }
    }
    // update
    // delete
    public function verwijderBestellingOpId(int $id): void
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "DELETE FROM bestelling WHERE bestellingId = :bestellingId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":bestellingId" => $id]);
        $dbh = null;
    }
    public function verwijderBestellinengOpCursist(int $cursistId): void
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "DELETE FROM bestelling WHERE cursistId = :cursistId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":cursistId" => $cursistId]);
        $dbh = null;
    }
    public function verwijderBestellinengOpDatum(string $bestellingDatum): void
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "DELETE FROM bestelling WHERE bestellingDatum = :bestellingDatum;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":bestellingDatum" => $bestellingDatum]);
        $dbh = null;
    }
    // hulpfuncties
    public function getDate(): string
    {
        $datum = getdate();
        $jaar = $datum["year"];
        $maand = $datum["mon"] < 10 ? "0" . $datum["mon"] : $datum["mon"];
        $dag = $datum["mday"] < 10 ? "0" . $datum["mday"] : $datum["mday"];
        $datum = "'" . $jaar . "/" . $maand . "/" . $dag . "'";
        return $datum;
    }
}
