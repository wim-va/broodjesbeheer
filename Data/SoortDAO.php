<?php

declare(strict_types=1);
require_once("Entities/Soort.php");
require_once("DBConfig.php");
class SoortDAO
{
    // create
    // read
    public function getAllSoorten(): array
    {
        $soorten = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM soort;";
        $resultSet = $dbh->query($sql);
        foreach ($resultSet as $result) {
            $soort = new Soort(
                $result["soortId"],
                $result["soortNaam"],
                $result["soortPrijs"],
            );
            array_push($soorten, $soort);
        }
        $dbh = null;
        return $soorten;
    }
    public function getSoortOpId(int $id): ?Soort
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM soort WHERE soortId = :soortId;";
        $smt = $dbh->prepare($sql);
        $smt->execute([":soortId" => $id]);
        $result = $smt->fetch(PDO::FETCH_ASSOC);
        if (!empty($result)) {
            $soort = new Soort(
                $result["soortId"],
                $result["soortNaam"],
                $result["soortPrijs"]
            );
            return $soort;
        } else {
            return null;
        }
    }
    // update
    // delete
    // hulpfuncties
}