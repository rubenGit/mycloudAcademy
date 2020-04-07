<?php

namespace AppBundle\EventSubscriber;

use AppBundle\Entity\GroupSt;
use Doctrine\ORM\EntityManagerInterface;
use EasyCorp\Bundle\EasyAdminBundle\Event\EasyAdminEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\EventDispatcher\GenericEvent;
use Symfony\Component\Security\Csrf\TokenStorage\TokenStorageInterface;


class EasyAdminEventSubscriber implements EventSubscriberInterface
{


    /**
     * @var EntityManagerInterface
     */
    private $em;

    /**
     * @var TokenStorageInterface
     */
    private $tokenStorage;
    /**
     * EasyAdminEventSubscriber constructor.
     * @param EntityManagerInterface $entityManager
     * @param TokenStorageInterface $tokenStorage
     */
    public function __construct(
        EntityManagerInterface $entityManager,
        TokenStorageInterface $tokenStorage
    ) {
        $this->em = $entityManager;
        $this->tokenStorage = $tokenStorage;
    }

    public static function getSubscribedEvents()
    {
        return [
            EasyAdminEvents::POST_PERSIST => ['newEvent'],
            EasyAdminEvents::POST_UPDATE => ['updateEvent'],
            EasyAdminEvents::POST_REMOVE => ['removeEvent'],
        ];
    }

    public function newEvent(GenericEvent $event)
    {
        return $this->persistEvent($event, 'NEW');
    }
    public function updateEvent(GenericEvent $event)
    {
        return $this->persistEvent($event, 'UPDATE');
    }
    public function removeEvent(GenericEvent $event)
    {
        return $this->persistEvent($event, 'REMOVE');
    }

    private function persistEvent(
        GenericEvent $event, $action
    )
    {
        $entity = $event->getSubject();

        if($entity instanceof GroupSt) {

            $this->persistEmployesAndClientes($entity);
        }
    }


    private function persistEmployesAndClientes($entity)
    {
        $employees = $entity->getEmployees();
        $clients = $entity->getClients();
        $courses = $entity->getCourses();
        $classrooms = $entity->getClassrooms();
        $timeTables = $entity->getTimeTables();


        foreach ($employees as $employee){
            $employee->addGroup($entity);
            $this->em->persist($employee);
        }

        foreach ($clients as $client){
            $client->addGroup($entity);
            $this->em->persist($client);
        }

        foreach ($courses as $course){
            $course->addGroup($entity);
            $this->em->persist($course);
        }

        foreach ($classrooms as $classroom){
            $classroom->addGroup($entity);
            $this->em->persist($classroom);
        }

        foreach ($timeTables as $timeTable){
            $timeTable->addGroup($entity);
            $this->em->persist($timeTable);
        }

            $this->em->flush();

    }



}
