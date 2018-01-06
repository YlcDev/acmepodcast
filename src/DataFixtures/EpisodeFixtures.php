<?php

namespace App\DataFixtures;

use App\Entity\Episode;
use App\Repository\PodcastRepository;
use DateTime;
use Doctrine\Bundle\FixturesBundle\Fixture;
use Doctrine\Common\Persistence\ObjectManager;
use Faker\Factory;

/**
 * Created by PhpStorm.
 * User: ross
 * Date: 21/12/17
 * Time: 20:26
 */

class EpisodeFixtures extends Fixture
{
    private $repository;

    public function __construct(PodcastRepository $repository)
    {
        $this->repository = $repository;
    }

    /**
     * Load data fixtures with the passed EntityManager
     *
     * @param ObjectManager $manager
     */
    public function load(ObjectManager $manager)
    {
        $podcast = $this->repository->get();
        $faker = Factory::create();

        for ($counter = 0; $counter < 30; $counter++) {
            $episode = new Episode();

            $episode->setPodcast($podcast)
                ->setLink()
                ->setDescription($faker->text(150))
                ->setTitle($faker->text(10))
                ->setMediaFileUrl($faker->url)
                ->setImage($faker->imageUrl(200, 200))
                ->setPublishedDate(new DateTime);

            $manager->persist($episode);
        }

        $manager->flush();
    }
}