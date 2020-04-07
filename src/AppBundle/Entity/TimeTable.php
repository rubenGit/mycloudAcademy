<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;
/**
 * TimeTable
 *
 * @ORM\Table(name="time_table")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\TimeTableRepository")
 */
class TimeTable
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="days", type="string", length=255, nullable=false)
     */
    private $days;

    /**
     * @var string
     *
     * @ORM\Column(name="Hours", type="string", length=255, nullable=false)
     */
    private $hours;
    /**
     * @var string
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private  $observations;

    /**
     * @var \Doctrine\Common\Collections\Collection|GroupSt
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GroupSt", mappedBy="timeTables")
     */
    private $groups;

    /**
     * TimeTable constructor.
     */
    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }


    public function __toString()
    {
        return (string) $this->days .
            ' ' . $this->hours;

    }


    /**
     * LOG ****************************************
     */

    /**
     * @var \DateTime $created
     *
     * @ORM\Column(name="data_created", type="datetime")
     *
     * @Gedmo\Timestampable(on="create")
     * @ORM\Column(type="datetime")
     */
    private $dataCreated;

    /**
     * @var \DateTime $updated
     *
     * @ORM\Column(name="data_updated", type="datetime")
     *
     * @Gedmo\Timestampable(on="update")
     * @ORM\Column(type="datetime")
     */
    private $dataUpdated;



    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set days
     *
     * @param string $days
     *
     * @return TimeTable
     */
    public function setDays($days)
    {
        $this->days = $days;

        return $this;
    }

    /**
     * Get days
     *
     * @return string
     */
    public function getDays()
    {
        return $this->days;
    }

    /**
     * Set hours
     *
     * @param string $hours
     *
     * @return TimeTable
     */
    public function setHours($hours)
    {
        $this->hours = $hours;

        return $this;
    }

    /**
     * Get hours
     *
     * @return string
     */
    public function getHours()
    {
        return $this->hours;
    }



    /**
     * Set dataCreated
     *
     * @param \DateTime $dataCreated
     *
     * @return TimeTable
     */
    public function setDataCreated($dataCreated)
    {
        $this->dataCreated = $dataCreated;

        return $this;
    }

    /**
     * Get dataCreated
     *
     * @return \DateTime
     */
    public function getDataCreated()
    {
        return $this->dataCreated;
    }

    /**
     * Set dataUpdated
     *
     * @param \DateTime $dataUpdated
     *
     * @return TimeTable
     */
    public function setDataUpdated($dataUpdated)
    {
        $this->dataUpdated = $dataUpdated;

        return $this;
    }

    /**
     * Get dataUpdated
     *
     * @return \DateTime
     */
    public function getDataUpdated()
    {
        return $this->dataUpdated;
    }





    /**
     * Add group
     *
     * @param \AppBundle\Entity\GroupSt $group
     *
     * @return TimeTable
     */
    public function addGroup(\AppBundle\Entity\GroupSt $group)
    {
        $this->groups[] = $group;

        return $this;
    }

    /**
     * Remove group
     *
     * @param \AppBundle\Entity\GroupSt $group
     */
    public function removeGroup(\AppBundle\Entity\GroupSt $group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * Get groups
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return TimeTable
     */
    public function setObservations($observations)
    {
        $this->observations = $observations;

        return $this;
    }

    /**
     * Get observations
     *
     * @return string
     */
    public function getObservations()
    {
        return $this->observations;
    }
}
