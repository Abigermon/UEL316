<?php

namespace App\EventSubscriber;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\String\Slugger\SluggerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityPersistedEvent;
use EasyCorp\Bundle\EasyAdminBundle\Event\BeforeEntityUpdatedEvent;
use App\Entity\Post;


class AddSlugSubscriber implements EventSubscriberInterface
{

    public function __construct(private SluggerInterface $slugger)
    {
    }
    public static function getSubscribedEvents()
    {
        return [
            BeforeEntityPersistedEvent::class => ['addSlug'],
            BeforeEntityUpdatedEvent::class => ['addSlug'],

        ];
    }

    public function addSlug($event)
    {
        $entity = $event->getEntityInstance();

       if($entity instanceof Post ){
            $slug = strtolower($this->slugger->slug($entity->getTitle()));
            $entity->setUpdatedAt(new \DateTimeImmutable());

            $entity->setSlug($slug);
        } else {
            return;
        }
    }

    public function updateSlug($event)
    {
        $entity = $event->getEntityInstance();

        if($entity instanceof Post ){
            $slug = strtolower($this->slugger->slug($entity->getTitle()));
            $entity->setUpdatedAt(new \DateTimeImmutable());
            $entity->setSlug($slug);
        } else {
            return;
        }
    } 

   
}