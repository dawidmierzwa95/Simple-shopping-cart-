<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;
use Ramsey\Uuid\Uuid;

trait UuidableTrait
{
    /**
     * @ORM\Column(type="string")
     */
    private $uuid = "";

    /**
     * @return string
     */
    public function getUuid (): ?string
    {
        return $this->uuid;
    }

    /**
     * @param string $uuid
     */
    public function setUuid (string $uuid = "")
    {
        $this->uuid = $uuid ? $uuid : $this->generate();
    }

    private function generate()
    {
        return Uuid::uuid4();
    }
}