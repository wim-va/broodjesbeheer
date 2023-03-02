<?php

declare(strict_types=1);
require_once("Entities/Formaat.php");
require_once("DBConfig.php");
class FormaatDAO
{
    // create
    public function maakFormaat(string $formaatNaam, float $formaatPrijs)
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "INSERT INTO formaat(formaatNaam, formaatPrijs) VALUES(:formaatNaam, :formaatPrijs);";
        $smt = $dbh->prepare($sql);
        $smt->execute([
            ":formaatNaam" => $formaatNaam,
            ":formaatPrijs" => $formaatPrijs,
        ]);
        $dbh = null;
    }
    // read
    public function getAllFormaten(): array
    {
        $formaten = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM formaat;";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {
            $formaat = new Formaat(
                intval($result["formaatId"]),
                $result["formaatNaam"],
                floatval($result["formaatPrijs"]),
            );
            array_push($formaten, $formaat);
        }
        $dbh = null;
        return $formaten;
    }
    public function getFormaatOpId(int $id): ?Formaat
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM formaat WHERE formaatId = :formaatId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":formaatId" => $id]);
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $formaat = new Formaat(
                $result["formaatId"],
                $result["formaatNaam"],
                $result["formaatPrijs"]
            );
            return $formaat;
        } else {
            return null;
        }
    }
    // update
    // delete
    // hulpfuncties
}