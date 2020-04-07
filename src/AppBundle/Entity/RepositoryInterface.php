<?php

namespace AppBundle\Entity;

interface RepositoryInterface
{
    const COMMIT_CHANGES = true;

    const DO_NOT_COMMIT_CHANGES = false;

    public function commit();
}
