<?php

declare(strict_types=1);
require_once("Entities/Saus.php");
require_once("DBConfig.php");
class SausDAO
{
    // create
    public function maakSaus(string $sausNaam, float $sausPrijs)
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "INSERT INTO saus(sausNaam, sausPrijs) VALUES(:sausNaam, :sausPrijs);";
        $smt = $dbh->prepare($sql);
        $smt->execute([
            ":sausNaam" => $sausNaam,
            ":sausPrijs" => $sausPrijs,
        ]);
        $dbh = null;
    }
    // read
    public function getAllSauzen(): array
    {
        $sauzen = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM saus;";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {
            $saus = new Saus(
                intval($result["sausId"]),
                $result["sausNaam"],
                floatval($result["sausPrijs"]),
            );
            array_push($sauzen, $saus);
        }
        $dbh = null;
        return $sauzen;
    }
    public function getSausOpId(int $id): ?Saus
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM saus WHERE sausId = :sausId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":sausId" => $id]);
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $saus = new Saus(
                $result["sausId"],
                $result["sausNaam"],
                $result["sausPrijs"]
            );
            return $saus;
        } else {
            return null;
        }
    }
    // update
    // delete
    // hulpfuncties
}