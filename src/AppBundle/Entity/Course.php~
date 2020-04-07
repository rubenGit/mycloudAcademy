<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Course
 *
 * @ORM\Table(name="course")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CourseRepository")
 */
class Course
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false)
     */
    private $name;

    /**
     * @var string
     *
     * @ORM\Column(name="academicYear", type="string", length=255, nullable=false)
     */
    private $academicYear;

    /**
     * @var string
     *
     * @ORM\Column(name="color", type="string", length=255, nullable=true)
     */
    private $color;

    /**
     * @var string
     *
     * @ORM\Column(name="type", type="string", length=255, nullable=true)
     */
    private $type;

    /**
     * @var string
     *
     * @ORM\Column(name="category", type="string", length=255)
     */
    private $category;

    /**
     * @var string
     *
     * @ORM\Column(name="periodicPrice", type="decimal", precision=10, scale=5, nullable=true)
     */
    private $periodicPrice;

    /**
     * @var string
     *
     * @ORM\Column(name="priceHour", type="decimal", precision=10, scale=5, nullable=true)
     */
    private $priceHour;

    /**
     * @var int
     *
     * @ORM\Column(name="discount", type="integer", nullable=true)
     */
    private $discount;

    /**
     * @var string
     *
     * @ORM\Column(name="finalPrice", type="decimal", precision=10, scale=5, nullable=true)
     */
    private $finalPrice;

    /**
     *
     *@ORM\OneToMany(targetEntity="AppBundle\Entity\GroupSt", mappedBy="courses", cascade={"persist"})
     */

    /**
     * @var \Doctrine\Common\Collections\Collection|GroupSt
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\GroupSt", mappedBy="courses")
     */
    private $groups;

    /**
     * @var string
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private  $observations;


    /**
     * Constructor
     */
    public function __construct()
    {
        $this->groups = new \Doctrine\Common\Collections\ArrayCollection();
    }

    public function __toString()
    {
        return (string)
            ' ' . $this->name .
            ' ' . $this->type .
            ' ' . $this->academicYear;
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
     * Set name
     *
     * @param string $name
     *
     * @return Course
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Set academicYear
     *
     * @param string $academicYear
     *
     * @return Course
     */
    public function setAcademicYear($academicYear)
    {
        $this->academicYear = $academicYear;

        return $this;
    }

    /**
     * Get academicYear
     *
     * @return string
     */
    public function getAcademicYear()
    {
        return $this->academicYear;
    }

    /**
     * Set color
     *
     * @param string $color
     *
     * @return Course
     */
    public function setColor($color)
    {
        $this->color = $color;

        return $this;
    }

    /**
     * Get color
     *
     * @return string
     */
    public function getColor()
    {
        return $this->color;
    }

    /**
     * Set type
     *
     * @param string $type
     *
     * @return Course
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
     * Set category
     *
     * @param string $category
     *
     * @return Course
     */
    public function setCategory($category)
    {
        $this->category = $category;

        return $this;
    }

    /**
     * Get category
     *
     * @return string
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * Set periodicPrice
     *
     * @param string $periodicPrice
     *
     * @return Course
     */
    public function setPeriodicPrice($periodicPrice)
    {
        $this->periodicPrice = $periodicPrice;

        return $this;
    }

    /**
     * Get periodicPrice
     *
     * @return string
     */
    public function getPeriodicPrice()
    {
        return $this->periodicPrice;
    }

    /**
     * Set priceHour
     *
     * @param string $priceHour
     *
     * @return Course
     */
    public function setPriceHour($priceHour)
    {
        $this->priceHour = $priceHour;

        return $this;
    }

    /**
     * Get priceHour
     *
     * @return string
     */
    public function getPriceHour()
    {
        return $this->priceHour;
    }

    /**
     * Set discount
     *
     * @param integer $discount
     *
     * @return Course
     */
    public function setDiscount($discount)
    {
        $this->discount = $discount;

        return $this;
    }

    /**
     * Get discount
     *
     * @return int
     */
    public function getDiscount()
    {
        return $this->discount;
    }

    /**
     * Set finalPrice
     *
     * @param string $finalPrice
     *
     * @return Course
     */
    public function setFinalPrice($finalPrice)
    {
        $this->finalPrice = $finalPrice;

        return $this;
    }

    /**
     * Get finalPrice
     *
     * @return string
     */
    public function getFinalPrice()
    {
        return $this->finalPrice;
    }


    /**
     * Add group
     *
     * @param \AppBundle\Entity\GroupSt $group
     *
     * @return Course
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
     * @return Course
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
