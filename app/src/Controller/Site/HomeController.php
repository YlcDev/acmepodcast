<?php


namespace App\Controller\Site;

use App\Repository\CategoryRepository;
use App\Repository\EpisodeRepository;
use App\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class HomeController extends AbstractController
{
    /**
     * @Route("/", name="home")
     */
    public function index(EpisodeRepository $repository)
    {
        $episodes = $repository->findAll();

        return $this->render('site/home/main.html.twig', ['episodes' => $episodes]);
    }

    public function tagForm(TagRepository $repository)
    {
        return new Response("Tag form here");
    }

    public function categoryForm(CategoryRepository $repository)
    {
        return new Response("Category form here");
    }
}
