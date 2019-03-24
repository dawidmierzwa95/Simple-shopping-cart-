<?php

namespace App\Entity;

use App\Traits\UuidableTrait;
use App\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Interfaces\PhotoInterface;
use Ramsey\Uuid\Uuid;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PhotoRepository")
 * @ORM\EntityListeners({"App\Subscriber\PhotoSubscriber"})
 */
class Photo implements PhotoInterface
{
    const DIR = "public/";

    use UuidableTrait;
    use TimestampableTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string")
     */
    private $path;

    /**
     * @ORM\Column(type="string", length=64)
     */
    private $disk;

    private $file;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getPath (): ?string
    {
        return $this->path;
    }

    /**
     * @param string $path
     */
    public function setPath (string $path)
    {
        $this->path = $path;
    }

    /**
     * @return string
     */
    public function getDisk (): ?string
    {
        return $this->disk;
    }

    /**
     * @param string $disk
     */
    public function setDisk (string $disk)
    {
        $this->disk = $disk;
    }

    /**
     * @return string
     */
    public function getFile (): ?string
    {
        return $this->file;
    }

    /**
     * @param string $file
     */
    public function setFile (string $file)
    {
        $this->file = $file;
    }

    /**
     * @return boolean
     */
    public function fakeUpload ()
    {
        $status = true;
        $name = '/'.Uuid::uuid4()->toString().'.jpg';

        $this->setPath($name);
        copy($this->getFile(), self::DIR.$this->getDisk().$name);

        return $status;
    }

    /**
     * @return boolean
     */
    public function upload ()
    {
        $status = false;

        return $status;
    }
}
