<?php

declare(strict_types=1);
require_once("Entities/Cursist.php");
require_once("DBConfig.php");
class CursistDAO
{
    // create
    public function maakCursist(string $email): void
    {
        $wachtwoord = $this->maakWachtwoord();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "INSERT INTO cursist(email, wachtwoord) VALUES(:email, :wachtwoord);";
        $smt = $dbh->prepare($sql);
        $smt->execute([
            ":email" => $email,
            ":wachtwoord" => $wachtwoord
        ]);
        $dbh = null;
    }
    // read
    public function getAllCursisten(): array
    {
        $cursisten = array();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM cursist;";
        $resultaatSet = $dbh->query($sql);
        foreach ($resultaatSet as $resultaat) {
            $cursist = new Cursist(
                $resultaat["cursistId"],
                $resultaat["email"],
                $resultaat["wachtwoord"]
            );
            array_push($cursisten, $cursist);
        }
        $dbh = null;
        return $cursisten;
    }
    public function getCursistOpId(int $id): ?Cursist
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT * FROM cursist WHERE cursistId = :cursistId;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([':cursistId' => $id]);
        $dbh = null;
        $resultaat = $smtm->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultaat)) {
            $cursist = new Cursist(
                $resultaat["cursistId"],
                $resultaat["email"],
                $resultaat["wachtwoord"]
            );
            return $cursist;
        }
        return null;
    }
    public function getCursistId(string $email, string $wachtwoord): int
    {
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "SELECT cursistId FROM cursist WHERE email = :email AND wachtwoord = :wachtwoord;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([
            ":email" => $email,
            ":wachtwoord" => $wachtwoord
        ]);
        $dbh = null;
        $resultaat = $smtm->fetch(PDO::FETCH_ASSOC);
        $cursistId = !empty($resultaat) ? $resultaat["cursistId"] : 0;
        return $cursistId;
    }

    public function getCursistOpEmail(string $email): ?Cursist
    {
        $dbh = new PDO(DBConfig::$DB_CONN,            DBConfig::$DB_USER,            DBConfig::$DB_PASS);
        $sql = "SELECT * FROM cursist WHERE email = :email;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([':email' => $email]);
        $dbh = null;
        $resultaat = $smtm->fetch(PDO::FETCH_ASSOC);
        if (!empty($resultaat)) {
            $cursist = new Cursist(
                $resultaat["cursistId"],
                $resultaat["email"],
                $resultaat["wachtwoord"]
            );
            return $cursist;
        }
        return null;
    }
























    // update
    public function updateWachtwoord(int $cursistId): void
    {
        $wachtwoord = $this->maakWachtwoord();
        $dbh = new PDO(DBConfig::$DB_CONN, DBConfig::$DB_USER, DBConfig::$DB_PASS);
        $sql = "UPDATE cursist SET wachtwoord = :wachtwoord WHERE cursistId = :cursistId;";
        $smtm = $dbh->prepare($sql);
        $smtm->execute([
            ":cursistId" => $cursistId,
            ":wachtwoord" => $wachtwoord
        ]);
    }
    // delete
    // hulpfuncties
    public function maakWachtwoord(): string
    {
        $wachtwoord = "";
        $wwLengte = 8;
        $wwKarakters = "0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ";
        $karLengte = strlen($wwKarakters) - 1;
        for ($index = 0; $index < $wwLengte; $index++) {
            $wachtwoord .= $wwKarakters[rand(0, $karLengte)];
        }
        return $wachtwoord;
    }
}