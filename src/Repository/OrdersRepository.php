<?php
/**
 * Created by PhpStorm.
 * User: georgio
 * Date: 15.04.18
 * Time: 23:17
 */

namespace App\Repository;


use App\Entity\Orders;
use App\Util\Filter;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Common\Persistence\ManagerRegistry;
use Doctrine\ORM\Query\ResultSetMapping;
use function Symfony\Component\DependencyInjection\Loader\Configurator\expr;


class OrdersRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Orders::class);
    }

    /**
     * Отфильтрованные позиции
     * @param Filter $filter
     * @return \Doctrine\ORM\QueryBuilder
     */
    public function getOrderByFilter(Filter $filter){
        $qb  = $this->createQueryBuilder('orders');

        $qb2 = $this->createQueryBuilder('orders1');


        $qb
            ->leftJoin('orders.customer', 'customer')
            ->leftJoin('orders.ordersItem', 'ordersItem')
            ->leftJoin('ordersItem.product','product')
            ->getQuery();


        if($filter->getPriceMin() !== null && $filter->getPriceMax() !== null){
            $qb
                ->groupBy('ordersItem.id')
                ->having($qb->expr()->between('SUM(ordersItem.quantity * ordersItem.price)',$filter->getPriceMin(),$filter->getPriceMax()));
        }
        if($filter->getPriceMin() === null && $filter->getPriceMax() !== null){
            $qb
                ->groupBy('ordersItem.id')
                ->having($qb->expr()->lte('SUM(ordersItem.quantity * ordersItem.price)', $filter->getPriceMax()));
        }
        if($filter->getPriceMin() !== null && $filter->getPriceMax() === null){
            $qb
                ->groupBy('ordersItem.id')
                ->having($qb->expr()->gte('SUM(ordersItem.quantity * ordersItem.price)', $filter->getPriceMin()));
        }


        //  if not null vendors
        if($filter->getVendors() !== null){
            $qb->andWhere('product.vendor = :Vendor');
            $qb->setParameter('Vendor',$filter->getVendors());
            $qb2->setParameter('Vendor',$filter->getVendors());
        }

        // if not null country
        if($filter->getCountry() !== null){
            $qb->andWhere('customer.country = :Country');
            $qb->setParameter('Country', $filter->getCountry());
            $qb2->setParameter('Country', $filter->getCountry());
        }
        // date start and end
        $qb->andWhere(
            $qb->expr()->between('orders.date',
                $qb->expr()->literal($filter->getDateStart()),
                $qb->expr()->literal($filter->getDateEnd())
        ));


        $qbClon = clone $qb;
        $qbClon->select('orders.id');

        $query = $qb2
            ->select($qb2->expr()->count('orders1.id'))
            ->where($qb2->expr()->in('orders1.id',$qbClon->getDQL()))->getQuery();
        $result  = $query->getResult();

        $query = $qb->distinct()->getQuery()->setHint('knp_paginator.count', $result[0][1]);

        return $query;
    }

    /**
     * @return \Doctrine\ORM\Query
     */
    public function getQuery(){
        return $this->createQueryBuilder('orders')->select('orders')->getQuery();
    }

}