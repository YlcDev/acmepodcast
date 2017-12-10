<?php

namespace App\Repository;

use App\Entity\Category;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class CategoryRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Category::class);
    }

    public function findOrCreate(?string $id = null)
    {
        if (is_null($id)) {
            return new Category();
        }

        return $this->find($id);
    }

    public function update(Category $entity)
    {
        $entity = $this->_em->merge($entity);

        $this->_em->persist($entity);

        $this->_em->flush();
    }

}
