<?php

namespace App\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;

class PingController extends AbstractController
{
    /**
     * @Route("/ping", name="ping")
     */
    public function index()
    {
        return new JsonResponse(['message' => 'pong']);
    }
}
