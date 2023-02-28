<?php

declare(strict_types=1);
class Cursist
{
    private int $id;
    private string $email;
    private string $wachtwoord;
    // construct
    public function __construct(int $id, string $email, string $wachtwoord,)
    {
        $this->id = $id;
        $this->email = $email;
        $this->wachtwoord = $wachtwoord;
    }
    // setters
    public function setId(
        int $id
    ): void {
        $this->id = $id;
    }
    public function setEmail(string $email)
    {
        $this->email = $email;
    }
    public function setWachtwoord(string $wachtwoord)
    {
        $this->wachtwoord = $wachtwoord;
    }
    // getters
    public function getId(): int
    {
        return $this->id;
    }
    public function getEmail(): string
    {
        return $this->email;
    }
    public function getWachtwoord(): string
    {
        return $this->wachtwoord;
    }
}
