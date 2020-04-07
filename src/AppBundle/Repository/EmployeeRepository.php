<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Employee;

/**
 * TeacherRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class EmployeeRepository extends \Doctrine\ORM\EntityRepository
{

    public function totalActiveEmployees(){

        $repository = $this->_em->getRepository(Employee::class);

        $query = $repository->createQueryBuilder('e')
            ->select('count(e)')
            ->where('e.active = true')
            ->getQuery();

        $resultScalar = $query->getScalarResult();

        return  $resultScalar[0][1];
    }
}
