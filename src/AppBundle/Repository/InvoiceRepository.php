<?php

namespace AppBundle\Repository;
use AppBundle\Entity\Expense;
use AppBundle\Entity\Income;
use AppBundle\Entity\Invoice;
use Twig\Node\IncludeNode;

/**
 * InvoiceRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class InvoiceRepository extends \Doctrine\ORM\EntityRepository
{

    public function pedingInvoicesWithDates($startDate, $endDate){

        $repository = $this->_em->getRepository(Invoice::class);

        $query = $repository->createQueryBuilder('i')
            ->select('count(i)')
            ->where('i.status = :status')
            ->andwhere('i.dataCreated >= :startDate')
            ->andwhere('i.dataCreated <= :endDate')
            ->setParameter('status', Invoice::PENDING_OF_PAID)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery();

        $resultScalar = $query->getScalarResult();

        $re = $query->getSQL();

        return  $resultScalar[0][1];
    }



    public function paidInvoicesWithDates($startDate, $endDate){

        $repository = $this->_em->getRepository(Invoice::class);

        $query = $repository->createQueryBuilder('i')
            ->select('count(i)')
            ->where('i.status = :status')
            ->andwhere('i.dataCreated >= :startDate')
            ->andwhere('i.dataCreated <= :endDate')
            ->setParameter('status', Invoice::PAID)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery();

        $resultScalar = $query->getScalarResult();

        return  $resultScalar[0][1];
    }




    /**
     * @return mixed
     * INVOICES PAID + INCOMES
     */
    public function incomeRecivedWithDates($startDate, $endDate){

        $repository = $this->_em->getRepository(Invoice::class);

        $query = $repository->createQueryBuilder('i')
            ->select('sum(i.total)')
            ->where('i.status = :status')
            ->andwhere('i.dataCreated >= :startDate')
            ->andwhere('i.dataCreated <= :endDate')
            ->setParameter('status', Invoice::PAID)
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery();

        $resultScalarInvoices = $query->getScalarResult();


        $repository = $this->_em->getRepository(Income::class);

        $query = $repository->createQueryBuilder('i')
            ->select('sum(i.import)')
            ->andwhere('i.dataCreated >= :startDate')
            ->andwhere('i.dataCreated <= :endDate')
            ->setParameter('startDate', $startDate)
            ->setParameter('endDate', $endDate)
            ->getQuery();

        $resultScalarIncome = $query->getScalarResult();

        $total = $resultScalarIncome[0][1] + $resultScalarInvoices[0][1];

        return  $total;
    }



}
