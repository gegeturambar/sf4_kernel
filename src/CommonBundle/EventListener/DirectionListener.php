<?php

namespace App\CommonBundle\EventListener;



// for Doctrine < 2.4: use Doctrine\ORM\Event\LifecycleEventArgs;
use App\CommonBundle\Entity\Direction;

use Doctrine\ORM\Event\LifecycleEventArgs;
use Ramsey\Uuid\Doctrine\UuidGenerator;
use Ramsey\Uuid\Uuid;


class DirectionListener
{
    /**
     * @var UuidGenerator
     */
    private $generator;

    /**
     * DirectionListener constructor.
     */
    public function __construct()
    {
        $this->generator = Uuid::uuid4();
    }

    public function prePersist(LifecycleEventArgs $args)
    {


        $this->changeName($args);

    }

    protected function changeName(LifecycleEventArgs $args)
    {
        $direction = $args->getObject();
        if(!$direction instanceof Direction)
            return;

        $direction->setName('tagazog'.$this->generator->toString());

    }
}