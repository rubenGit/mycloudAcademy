<?php

namespace AppBundle\Entity;

use Doctrine\ORM\EntityRepository;

abstract class AbstractRepository extends EntityRepository
{
    protected function persist($entity, $commit = RepositoryInterface::COMMIT_CHANGES)
    {
        $this->_em->persist($entity);

        if ($commit) {
            $this->commit();
        }
    }

    public function commit()
    {
        $this->_em->flush();
    }

    protected function removeCacheResult($resultCacheId)
    {
        $resultCache = $this->_em->getConfiguration()->getResultCacheImpl();
        $resultCache->delete($resultCacheId);
    }
}
