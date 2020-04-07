<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * Income
 *
 * @ORM\Table(name="income")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\IncomeRepository")
 */
class Income
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
     * @var decimal
     *
     * @ORM\Column(name="import", type="decimal", precision=10, scale=5, nullable=true)
     */
    private $import;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;




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
     * Set tipo
     *
     * @param string $type
     *
     * @return Income
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Get tipo
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }



    /**
     * Set dataCreated
     *
     * @param \DateTime $dataCreated
     *
     * @return Income
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
     * @return Income
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
     * @return decimal
     */
    public function getImport()
    {
        return $this->import;
    }

    /**
     * @param decimal $import
     */
    public function setImport($import)
    {
        $this->import = $import;
    }



}
