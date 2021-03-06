<?php

namespace App\Repository;

use App\Entity\Episode;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Symfony\Bridge\Doctrine\RegistryInterface;

class EpisodeRepository extends ServiceEntityRepository
{
    public function __construct(RegistryInterface $registry)
    {
        parent::__construct($registry, Episode::class);
    }

    public function findOrCreate(?string $id = null)
    {
        if (is_null($id)) {
            return new Episode();
        }

        return $this->find($id);
    }

    public function update(Episode $entity)
    {
        $podcast = $this->_em->getReference('App\Entity\Podcast', 1);

        $entity->setPodcast($podcast);

        $entity = $this->_em->merge($entity);

        $this->_em->persist($entity);

        $this->_em->flush();
    }

    public function findByLink(?string $episodeLink = null)
    {
        return $this->_em->createQueryBuilder()
            ->select('episode')
            ->from(Episode::class, 'episode')
            ->where('episode.link = :link')
            ->setParameter('link', $episodeLink)
            ->getQuery()
            ->getArrayResult();
    }

    public function getAll()
    {
        return $this->_em->createQueryBuilder()
            ->select('episode')
            ->from(Episode::class, 'episode')
            ->orderBy('episode.publishedDate', 'DESC')
            ->getQuery()
            ->getArrayResult();
    }
}
