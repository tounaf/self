<?php

namespace Telma\Selfcare\PrepaidBundle\Repository;

/**
 * SubscriptionCompanyRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class SubscriptionCompanyRepository extends \Doctrine\ORM\EntityRepository
{
    public function filterSubList($compId, $numSub)
    {

        $queryBuilder = $this->createQueryBuilder('SC');
        $queryBuilder->add('select', 'SC');
        $queryBuilder->add('from', 'TelmaSelfcarePrepaidBundle:SubscriptionCompany SC');
        $queryBuilder->where(' 1=1 ');

        if($compId != '') {
            $queryBuilder->andWhere(' SC.company =:compId ');
            $queryBuilder->setParameter('compId', $compId);
        }

        if ($numSub!= '') {
            $queryBuilder->andWhere(' ( SC.subscription LIKE :numSub ) ');
            $queryBuilder->setParameter('numSub', '%'.$numSub.'%');
        }

        $query = $queryBuilder->getQuery();
//        var_dump($query->getSQL());
        $result = $query->getResult();
//        var_dump(count($result));die;
        return $result;
    }
}
