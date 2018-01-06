<?php

namespace App\Controller\Api;

use App\RssCreator\RssCreator;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class RssController extends AbstractController
{
    /**
     * @Route("/subscribe.{fileExtension}", name="subscribe")
     */
    public function index(RssCreator $rssCreator, string $fileExtension)
    {
        $fileExtension = strtolower($fileExtension);

        if ($fileExtension === 'xml') {
            $fileExtension = 'rss';
        }

        switch ($fileExtension) {

            case 'rss':
            case 'xml':
                $contentType = 'application/rss+xml';
                break;
            case 'json':
                $contentType = 'application/json';
                break;
            case 'atom':
                $contentType = 'application/atom+xml';
                break;
            default:
                throw new NotFoundHttpException();
        }

        return new Response($rssCreator->produce($fileExtension), 200, ['content-type' => $contentType]);
    }
}
