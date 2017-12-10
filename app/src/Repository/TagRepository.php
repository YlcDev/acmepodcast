<?php

namespace App\Repository;

use App\Entity\Category;
use App\Entity\Tag;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class TagRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Tag::class);
    }

    public function findOrCreate(?string $id = null)
    {
        if (is_null($id)) {
            return new Tag();
        }

        return $this->find($id);
    }

    public function update(Tag $entity)
    {
        $entity = $this->_em->merge($entity);

        $this->_em->persist($entity);

        $this->_em->flush();
    }

}
