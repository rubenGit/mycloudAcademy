<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * EventInfo
 *
 * @ORM\Table(name="event_info")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\EventInfoRepository")
 */
class EventInfo
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
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var array
     *
     * @ORM\Column(name="entidad", type="json_array", nullable=true)
     */
    private $entidad;

    /**
     * @var string
     *
     * @ORM\Column(name="operations", type="string", length=255, nullable=true)
     */
    private $operations;


    /**
     *
     * @var string
     * @ORM\Column(name="log_info", type="string", length=255, nullable=true)
     */
    private $logInfo;




    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set dataCreated
     *
     * @param \DateTime $dataCreated
     *
     * @return EventInfo
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
     * @return EventInfo
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
     * Set type
     *
     * @param string $type
     *
     * @return EventInfo
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Set entidad
     *
     * @param \json $entidad
     *
     * @return EventInfo
     */
    public function setEntidad($entidad)
    {
        $this->entidad = $entidad;

        return $this;
    }

    /**
     * Get entidad
     *
     * @return string
     */
    public function getEntidad()
    {
        return $this->entidad;
    }

    /**
     * Set operations
     *
     * @param string $operations
     *
     * @return EventInfo
     */
    public function setOperations($operations)
    {
        $this->operations = $operations;

        return $this;
    }

    /**
     * Get operations
     *
     * @return string
     */
    public function getOperations()
    {
        return $this->operations;
    }

    /**
     * Set logInfo
     *
     * @param string $logInfo
     *
     * @return EventInfo
     */
    public function setLogInfo($logInfo)
    {
        $this->logInfo = $logInfo;

        return $this;
    }

    /**
     * Get logInfo
     *
     * @return string
     */
    public function getLogInfo()
    {
        return $this->logInfo;
    }
}
