<?php

namespace App\DataFixtures;

use App\Entity\Product;
use App\Entity\Photo;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;

class FakeProducts extends Fixture
{
    public $data = [
        [
            'name' => 'Produkt 1',
            'price' => 11.00
        ],
        [
            'name' => 'Produkt 2',
            'price' => 22.00
        ],
        [
            'name' => 'Produkt 3',
            'price' => 33.00
        ],
        [
            'name' => 'Produkt 4',
            'price' => 44.00
        ]
    ];

    public function load(ObjectManager $manager)
    {
        $photo = new Photo();

        $photo->setDisk('photos/products');
        $photo->setFile('public/testProductImage.jpg');
        $photo->fakeUpload();

        $manager->persist($photo);
        $manager->flush();

        foreach($this->data as $key => &$val)
        {
            $item = new Product();

            $item->setName($val['name']);
            $item->setPrice($val['price']);
            $item->setPhoto($photo);

            $manager->persist($item);
        }

        $manager->flush();
    }
}
