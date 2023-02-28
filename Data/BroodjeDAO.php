<?php

declare(strict_types=1);
require_once("Entities/Broodje.php");
require_once("DBConfig.php");
class BroodjeDAO
{
    // create
    // read
    public function getAllBroodjes(): array
    {
        $broodjes = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM broodje;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $broodje = new Broodje(
                $resultaat["broodjeId"],
                $resultaat["belegId"],
                $resultaat["formaatId"],
                $resultaat["sausId"],
                $resultaat["soortId"]
            );
            array_push($broodjes, $broodje);
        }
        $dbh = null;
        return $broodjes;
    }
    public function getBroodjeOpId(int $id): ?Broodje
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM broodje;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([':broodjeId' => $id]);
        $dbh = null;
        $resultaat = $smtm->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultaat)) {
            $broodje = new Broodje(
                $resultaat["broodjeId"],
                $resultaat["belegId"],
                $resultaat["formaatId"],
                $resultaat["sausId"],
                $resultaat["soortId"]
            );
            return $broodje;
        } else {
            return null;
        }
    }
    public function getIdBroodje(int $belegId, int $formaatId, int $sausId, int $soortId): ?int
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT broodjeId FROM broodje WHERE belegId = :belegId AND formaatId = :formaatId AND sausId = :sausId AND soortId = :soortId;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([
            ":belegId " => $belegId,
            ":formaatId" => $formaatId,
            ":sausId " => $sausId,
            ":soortId" => $soortId,
        ]);
        $dbh = null;
        $resultaat = $smtm->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultaat)) {
            return $resultaat;
        } else {
            return null;
        }
        // update
        // delete
        // hulpfuncties
    }
}
