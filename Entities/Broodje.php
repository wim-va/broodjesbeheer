<?php

declare(strict_types=1);
class Broodje
{
    private int $id;
    private int $belegId;
    private int $formaatId;
    private int $sausId;
    private int $soortId;
    public function __construct(int $id, int $belegId, int $formaatId, int $sausId, int $soortId)
    {
        $this->id = $id;
        $this->belegId = $belegId;
        $this->formaatId = $formaatId;
        $this->sausId = $sausId;
        $this->soortId = $soortId;
    }
    // construct
    // setters
    public function
    setId(int $id)
    {
        $this->id = $id;
    }
    public function
    setBelegId(int $belegId)
    {
        $this->belegId = $belegId;
    }
    public function
    setFormaatId(int $formaatId)
    {
        $this->formaatId = $formaatId;
    }
    public function
    setSausId(int $sausId)
    {
        $this->sausId = $sausId;
    }
    public function
    setSoortId(int $soortId)
    {
        $this->soortId = $soortId;
    }
    // getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getBelegId(): int
    {
        return $this->belegId;
    }
    public function getFormaatId(): int
    {
        return $this->formaatId;
    }
    public function getSausId(): int
    {
        return $this->sausId;
    }
    public function getSoortId(): int
    {
        return $this->soortId;
    }
}