<?php

namespace App\Entity;

use App\Traits\SluggableTrait;
use App\Traits\TimestampableTrait;
use Doctrine\ORM\Mapping as ORM;
use App\Entity\Interfaces\ProductInterface;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ProductRepository")
 * @ORM\EntityListeners({"App\Subscriber\ProductSubscriber"})
 */
class Product implements ProductInterface
{
    use TimestampableTrait;
    use SluggableTrait;

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=128)
     */
    private $name;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Photo")
     */
    private $photo;

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName (): ?string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName (string $name)
    {
        $this->name = $name;
    }

    /**
     * @return float
     */
    public function getPrice (): ?float
    {
        return $this->price;
    }

    /**
     * @param float $price
     */
    public function setPrice (float $price)
    {
        $this->price = $price;
    }

    /**
     * @return Photo
     */
    public function getPhoto (): ?Photo
    {
        return $this->photo;
    }

    /**
     * @param Photo $photo
     */
    public function setPhoto (Photo $photo)
    {
        $this->photo = $photo;
    }
}
