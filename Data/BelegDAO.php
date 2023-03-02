<?php

declare(strict_types=1);
require_once("Entities/Beleg.php");
require_once("DBConfig.php");
class BelegDAO
{
    // create
    public function maakBeleg(string $belegNaam, float $belegPrijs)
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "INSERT INTO beleg(belegNaam, belegPrijs) VALUES(:belegNaam, :belegPrijs);";
        $smt = $dbh->prepare($sql);
        $smt->execute([
            ":belegNaam" => $belegNaam,
            ":belegPrijs" => $belegPrijs,
        ]);
        $dbh = null;
    }
    // read
    public function getAllBelegs(): array
    {
        $belegs = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM beleg;";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {

            $beleg = new Beleg(
                intval($result["belegId"]),
                $result["belegNaam"],
                floatval($result["belegPrijs"]),
            );


            array_push($belegs, $beleg);
        }
        $dbh = null;
        return $belegs;
    }
    public function getBelegOpId(int $id): ?Beleg
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM beleg WHERE belegId = :belegId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":belegId" => $id]);
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $beleg = new Beleg(
                $result["belegId"],
                $result["belegNaam"],
                $result["belegPrijs"]
            );
            return $beleg;
        } else {
            return null;
        }
    }
    // update
    // delete
    // hulpfuncties
}