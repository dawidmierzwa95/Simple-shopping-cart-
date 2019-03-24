<?php

namespace App\Subscriber;

use Doctrine\ORM\Event\LifecycleEventArgs;
use App\Entity\Photo;

class PhotoSubscriber
{
    public function prePersist(Photo $photo, LifecycleEventArgs $args)
    {
        $now = new \DateTime();

        $photo->setUuid();
        $photo->setCreatedAt($now);
        $photo->setUpdatedAt($now);
    }

    public function preUpdate(Photo $photo, LifecycleEventArgs $args)
    {
        $photo->setUpdatedAt(new \DateTime());
    }
}