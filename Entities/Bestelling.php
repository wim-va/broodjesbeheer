<?php

declare(strict_types=1);
class Bestelling
{
    private int $id;
    private int $broodjeId;
    private int $cursistId;
    private string $datum;

    // construct
    public function __construct(int $id, int $broodjeId, int $cursistId, string $datum,)
    {
        $this->id = $id;
        $this->broodjeId = $broodjeId;
        $this->cursistId = $cursistId;
        $this->datum = $datum;
    }
    // setters
    public function setId(int $id): void
    {
        $this->id = $id;
    }
    public function setBroodjeId(int $broodjeId): void
    {
        $this->broodjeId = $broodjeId;
    }
    public function setCursistId(int $cursistId): void
    {
        $this->cursistId = $cursistId;
    }
    public function setDatum(string $datum): void
    {
        $this->datum = $datum;
    }
    // getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getBroodjeId(): int
    {
        return $this->broodjeId;
    }
    public function getCursistId(): int
    {
        return $this->cursistId;
    }
    public function getDatum(): string
    {
        return $this->datum;
    }
}
