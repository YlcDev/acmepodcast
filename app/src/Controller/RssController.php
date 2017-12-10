<?php

namespace App\Controller;

use App\RssCreator\RssCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class RssController extends AbstractController
{
    /**
     * @Route("/rss.xml", name="rss")
     */
    public function index(RssCreator $rssCreator)
    {
        return new Response($rssCreator->produce());
    }
}
