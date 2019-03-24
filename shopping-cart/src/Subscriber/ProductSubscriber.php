<?php

namespace App\Subscriber;

use App\Entity\Product;
use Doctrine\ORM\Event\LifecycleEventArgs;

class ProductSubscriber
{
    public function prePersist(Product $product, LifecycleEventArgs $args)
    {
        $now = new \DateTime();

        $product->setSlug($product->getName());
        $product->setCreatedAt($now);
        $product->setUpdatedAt($now);
    }

    public function preUpdate(Product $product, LifecycleEventArgs $args)
    {
        $product->setUpdatedAt(new \DateTime());
    }
}