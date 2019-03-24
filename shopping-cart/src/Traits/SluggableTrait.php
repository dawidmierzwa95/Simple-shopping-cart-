<?php

namespace App\Traits;

use Doctrine\ORM\Mapping as ORM;

trait SluggableTrait
{
    /**
     * @ORM\Column(type="string")
     */
    private $slug;

    /**
     * @return string
     */
    public function getSlug (): ?string
    {
        return $this->slug;
    }

    /**
     * @param string $slug
     */
    public function setSlug (string $slug)
    {
        $this->slug = $this->generate($slug);
    }

    private function generate(string $text)
    {
        return str_replace(
            [
                'ą', 'ę', 'ó', 'ł', 'ś', 'ż', 'ź', 'ć', 'ń',
                ' '
            ],
            [
                'a', 'e', 'o', 'l', 's', 'z', 'z', 'c', 'n',
                '-'
            ],
            mb_strtolower($text)
        );
    }
}