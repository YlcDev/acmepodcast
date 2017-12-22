<?php

namespace App\Service;

use App\Entity\Setting;
use App\Repository\SettingRepository;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class SettingService
{
    private $repository;

    public function __construct(SettingRepository $repository)
    {
        $this->repository = $repository;
    }
}
