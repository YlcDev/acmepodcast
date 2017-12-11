<?php


namespace App\Controller\Site;

use App\Repository\EpisodeRepository;
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
}
