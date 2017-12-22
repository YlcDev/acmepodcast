<?php


namespace App\Controller\Site;

use App\Repository\CategoryRepository;
use App\Repository\EpisodeRepository;
use App\Repository\PodcastRepository;
use App\Repository\SettingRepository;
use App\Repository\TagRepository;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
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

    public function header(PodcastRepository $repository)
    {
        $podcast = $repository->get();

        return $this->render('site/parts/header.html.twig', ['podcast' => $podcast]);

    }

    public function episodes(Request $request, EpisodeRepository $repository)
    {
        $episodeLink = $request->get('episode');

        if (is_null($episodeLink)) {
            $episodes = $repository->findAll();
        } else {
            $episodes = $repository->findByLink($episodeLink);
        }

        return $this->render('site/parts/episodes.html.twig', ['episodes' => $episodes]);
    }

    public function footer(PodcastRepository $repository)
    {
        $podcast = $repository->get();

        return $this->render('site/parts/footer.html.twig', ['podcast' => $podcast]);
    }

    public function subscribe(SettingRepository $repository)
    {
        $settings = $repository->get();

        return $this->render('site/parts/subscribe.html.twig', ['settings' => $settings]);
    }
}
