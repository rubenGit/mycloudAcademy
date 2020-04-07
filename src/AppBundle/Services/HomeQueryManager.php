<?php
/**
 * Created by PhpStorm.
 * User: ruben
 * Date: 13/05/18
 * Time: 18:16
 */

namespace AppBundle\Services;


use AppBundle\Entity\Client;
use AppBundle\Entity\Course;
use AppBundle\Entity\Employee;
use AppBundle\Entity\Expense;
use AppBundle\Entity\GroupSt;
use AppBundle\Entity\Invoice;
use Doctrine\ORM\EntityManager;

class HomeQueryManager
{

    private $em;
    private $clientRepository;
    private $invoiceRepository;

    /**
     * HomeQueryManager constructor.
     * @param $em
     */
    public function __construct(EntityManager $em)
    {
        $this->em = $em;
        $this->clientRepository = $this->em->getRepository(Client::class);
        $this->employeeRepository = $this->em->getRepository(Employee::class);
        $this->groupRepository = $this->em->getRepository(GroupSt::class);
        $this->expenseRepository = $this->em->getRepository(Expense::class);
        $this->coursesRepository = $this->em->getRepository(Course::class);
        $this->invoiceRepository = $this->em->getRepository(Invoice::class);
    }

    public function getTotalActiveClients(){
        return $this->clientRepository->totalClients();
    }

    public function getTotalEmployees(){
        return $this->employeeRepository->totalActiveEmployees();
    }

    public function getTotalGroups(){
        return $this->groupRepository->totalGroups();
    }

    public function getTotalCourses(){
        return $this->coursesRepository->totalCourses();
    }



    public function getPedingInvoicesWithDate($startDate, $endDate){
        return $this->invoiceRepository->pedingInvoicesWithDates($startDate, $endDate);
    }

    public function getPaidInvoicesWithDates($startDate, $endDate){
        return $this->invoiceRepository->paidInvoicesWithDates($startDate, $endDate);
    }


    public function getIncomesWithDate($startDate, $endDate){
        return $this->invoiceRepository->incomeRecivedWithDates($startDate, $endDate);
    }

    public function getExpensesWithDate($startDate, $endDate){
        return $this->expenseRepository->expenseWithDates($startDate, $endDate);
    }

}