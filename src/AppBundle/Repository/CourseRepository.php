<?php

namespace AppBundle\Repository;

use AppBundle\Entity\Course;

/**
 * CourseRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CourseRepository extends \Doctrine\ORM\EntityRepository
{

    public function totalCourses(){

        $repository = $this->_em->getRepository(Course::class);

        $query = $repository->createQueryBuilder('c')
            ->select('count(c)')
            ->getQuery();

        $resultScalar = $query->getScalarResult();

        return  $resultScalar[0][1];

    }
}
