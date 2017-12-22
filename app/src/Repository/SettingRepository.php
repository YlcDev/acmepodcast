<?php

namespace App\Repository;

use App\Entity\Setting;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SettingRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Setting::class);
    }

    public function get()
    {
        return $this->find(1);
    }

    public function update($entity)
    {
        $entity = $this->_em->merge($entity);

        $this->_em->persist($entity);

        $this->_em->flush();
    }
}
