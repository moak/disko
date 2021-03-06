<?php

namespace Disko\DiskoBundle\Repository;

use Doctrine\ORM\EntityRepository;

/**
 * MovieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class MovieRepository extends EntityRepository
{
    public function getNumberMovies($user)
    {
        $qb = $this->createQueryBuilder('u')
            ->where('u.user = :user')
            ->select('u')
            ->setParameter('user', $user);
        return count($qb->getQuery()->getResult());

    }
}
