<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Mapping\Annotation as Gedmo;

/**
 * GroupSt
 *
 * @ORM\Table(name="group_st")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupStRepository")
 */
class GroupSt
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
     * @ORM\Column(name="name", type="string", length=255, nullable=false, unique=true)
     */
    private $name;
    /**
     * @var string
     * @ORM\Column(name="observations", type="string", length=255, nullable=true)
     */
    private  $observations;

    /**
     * @var \Doctrine\Common\Collections\Collection|TimeTable[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\TimeTable", inversedBy="groups")
     * @ORM\JoinTable(
     *  name="groups_timetables",
     *  joinColumns={
     *      @ORM\JoinColumn(name="timetable_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *  }
     * )
     */
    private $timeTables;

    /**
     * @var \Doctrine\Common\Collections\Collection|Client[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Client", inversedBy="groups")
     * @ORM\JoinTable(
     *  name="groups_clients",
     *  joinColumns={
     *      @ORM\JoinColumn(name="client_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *  }
     * )
     */
    private $clients;

    /**
     * @var \Doctrine\Common\Collections\Collection|Employee[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Employee", inversedBy="groups")
     * @ORM\JoinTable(
     *  name="groups_employees",
     *  joinColumns={
     *      @ORM\JoinColumn(name="employee_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="group_id", referencedColumnName="id")
     *  }
     * )
     */
    private $employees;

    /**
    * @var \Doctrine\Common\Collections\Collection|Course[]
    *
    * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Course", inversedBy="groups")
    * @ORM\JoinTable(
    *  name="groups_courses",
        *  joinColumns={
    *      @ORM\JoinColumn(name="course_id", referencedColumnName="id")
    *  },
    *  inverseJoinColumns={
    *      @ORM\JoinColumn(name="group_id", referencedColumnName="id")
    *  }
     * )
     */
    private $courses;



    /**
     * @var \Doctrine\Common\Collections\Collection|Classroom[]
     *
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Classroom", inversedBy="groups")
     * @ORM\JoinTable(
     *  name="groups_classrooms",
     *  joinColumns={
     *      @ORM\JoinColumn(name="course_id", referencedColumnName="id")
     *  },
     *  inverseJoinColumns={
     *      @ORM\JoinColumn(name="classrom_id", referencedColumnName="id")
     *  }
     * )
     */
    private $classrooms;




    public function __construct()
    {
        $this->clients = new ArrayCollection();
        $this->employees = new ArrayCollection();
        $this->courses = new ArrayCollection();
        $this->timeTables = new ArrayCollection();
        $this->classrooms = new ArrayCollection();

    }

    public function __toString()
    {
        return (string) $this->name ;
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
     * Set name
     *
     * @param string $name
     *
     * @return GroupSt
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
     * Set surname
     *
     * @param string $surname
     *
     * @return GroupSt
     */
    public function setSurname($surname)
    {
        $this->surname = $surname;

        return $this;
    }

    /**
     * Get surname
     *
     * @return string
     */
    public function getSurname()
    {
        return $this->surname;
    }

    /**
     * Set phone
     *
     * @param string $phone
     *
     * @return GroupSt
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Get phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Set email
     *
     * @param string $email
     *
     * @return GroupSt
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Get email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set address
     *
     * @param string $address
     *
     * @return GroupSt
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Get address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Set dataCreated
     *
     * @param \DateTime $dataCreated
     *
     * @return GroupSt
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
     * @return GroupSt
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
     * Add attendance
     *
     * @param \AppBundle\Entity\Attendance $attendance
     *
     * @return GroupSt
     */
    public function addAttendance(\AppBundle\Entity\Attendance $attendance)
    {
        $this->attendance[] = $attendance;

        return $this;
    }

    /**
     * Remove attendance
     *
     * @param \AppBundle\Entity\Attendance $attendance
     */
    public function removeAttendance(\AppBundle\Entity\Attendance $attendance)
    {
        $this->attendance->removeElement($attendance);
    }

    /**
     * Get attendance
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAttendance()
    {
        return $this->attendance;
    }













    /**
     * Add course
     *
     * @param \AppBundle\Entity\Course $course
     *
     * @return GroupSt
     */
    public function addCourse(\AppBundle\Entity\Course $course)
    {
        $this->courses[] = $course;

        return $this;
    }

    /**
     * Remove course
     *
     * @param \AppBundle\Entity\Course $course
     */
    public function removeCourse(\AppBundle\Entity\Course $course)
    {
        $this->courses->removeElement($course);
    }

    /**
     * Get courses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCourses()
    {
        return $this->courses;
    }

    /**
     * Set observations
     *
     * @param string $observations
     *
     * @return GroupSt
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

    /**
     * Add timeTable
     *
     * @param \AppBundle\Entity\TimeTable $timeTable
     *
     * @return GroupSt
     */
    public function addTimeTable(\AppBundle\Entity\TimeTable $timeTable)
    {
        $this->timeTables[] = $timeTable;

        return $this;
    }

    /**
     * Remove timeTable
     *
     * @param \AppBundle\Entity\TimeTable $timeTable
     */
    public function removeTimeTable(\AppBundle\Entity\TimeTable $timeTable)
    {
        $this->timeTables->removeElement($timeTable);
    }

    /**
     * Get timeTables
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getTimeTables()
    {
        return $this->timeTables;
    }

    /**
     * Add client
     *
     * @param \AppBundle\Entity\Client $client
     *
     * @return GroupSt
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
     * Add employee
     *
     * @param \AppBundle\Entity\Employee $employee
     *
     * @return GroupSt
     */
    public function addEmployee(\AppBundle\Entity\Employee $employee)
    {
        $this->employees[] = $employee;

        return $this;
    }

    /**
     * Remove employee
     *
     * @param \AppBundle\Entity\Employee $employee
     */
    public function removeEmployee(\AppBundle\Entity\Employee $employee)
    {
        $this->employees->removeElement($employee);
    }

    /**
     * Get employees
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getEmployees()
    {
        return $this->employees;
    }

    /**
     * Add classroom
     *
     * @param \AppBundle\Entity\Classroom $classroom
     *
     * @return GroupSt
     */
    public function addClassroom(\AppBundle\Entity\Classroom $classroom)
    {
        $this->classrooms[] = $classroom;

        return $this;
    }

    /**
     * Remove classroom
     *
     * @param \AppBundle\Entity\Classroom $classroom
     */
    public function removeClassroom(\AppBundle\Entity\Classroom $classroom)
    {
        $this->classrooms->removeElement($classroom);
    }

    /**
     * Get classrooms
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getClassrooms()
    {
        return $this->classrooms;
    }
}
