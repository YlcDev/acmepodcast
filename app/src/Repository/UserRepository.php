<?php

namespace App\Repository;

use App\Entity\EntityInterface;
use App\Entity\User;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class UserRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, User::class);
    }

    public function get(?string $username = null)
    {
        return $this->_em->createQueryBuilder()
            ->select('user')
            ->from(User::class, 'user')
            ->where('user.username = :username')
            ->setParameter('username', $username)
            ->getQuery()
            ->getSingleResult();
    }

    public function delete(User $entity)
    {
        $this->_em->remove($entity);

        $this->_em->flush();
    }

    public function create(User $entity)
    {
        $this->_em->persist($entity);

        $this->_em->flush();
    }

    public function update(User $entity)
    {
        $entity = $this->_em->merge($entity); //it's important to use result of function, not the same element

        $this->_em->persist($entity);

        $this->_em->flush();
    }
}
