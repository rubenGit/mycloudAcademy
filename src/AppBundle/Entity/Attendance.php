<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Attendance
 *
 * @ORM\Table(name="attendance")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AttendanceRepository")
 */
class Attendance
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
     * @ORM\Column(name="teacher", type="string", length=255, nullable=true)
     */
    private $teacher;


    /**
     * @var string
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private  $observations;


    /**
     * @var \Doctrine\Common\Collections\Collection|Client[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Client", inversedBy="attendance")
     * @ORM\JoinTable(
     *  name="attendance_clients",
     *  joinColumns={
     *      @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="attendance_id", referencedColumnName="id")
     *  }
     * )
     */
    private $clients;


    /**
     *
     *@ORM\ManyToOne(targetEntity="AppBundle\Entity\GroupSt", inversedBy="attendance", cascade={"persist"})
     */
    private $groupSt;



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
     * Client constructor.
     */
    public function __construct()
    {
        $this->clients = new ArrayCollection();
    }




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
     * Set client
     *
     * @param string $client
     *
     * @return Attendance
     */
    public function setClient($client)
    {
        $this->client = $client;

        return $this;
    }

    /**
     * Get client
     *
     * @return string
     */
    public function getClient()
    {
        return $this->client;
    }



    /**
     * Set groupSt
     *
     * @param string $groupSt
     *
     * @return Attendance
     */
    public function setGroupSt($groupSt)
    {
        $this->groupSt = $groupSt;

        return $this;
    }

    /**
     * Get groupSt
     *
     * @return string
     */
    public function getGroupSt()
    {
        return $this->groupSt;
    }

    /**
     * Set teacher
     *
     * @param string $teacher
     *
     * @return Attendance
     */
    public function setTeacher($teacher)
    {
        $this->teacher = $teacher;

        return $this;
    }

    /**
     * Get teacher
     *
     * @return string
     */
    public function getTeacher()
    {
        return $this->teacher;
    }




    /**
     * Set dataCreated
     *
     * @param \DateTime $dataCreated
     *
     * @return Attendance
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
     * @return Attendance
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
     * Add client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return Attendance
     */
    public function addClient(\AppBundle\Entity\Client $client)
    {
        $this->clients[] = $client;

        return $this;
    }

    /**
     * Remove client
     *
     * @param \AppBundle\Entity\Client $client
     */
    public function removeClient(\AppBundle\Entity\Client $client)
    {
        $this->clients->removeElement($client);
    }

    /**
     * Get clients
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClients()
    {
        return $this->clients;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return Attendance
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
