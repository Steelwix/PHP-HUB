<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/default', name: 'app_default')]
    public function index(): Response
    {
        $movie = array("id" => 1, "meta" => true, "player" => "tg");
        return new JsonResponse($movie);
    }
    #[Route('/api/ask', name: 'api_ask')]
    public function apiAskHello(): Response
    {
        return $this->render('default/index.html.twig');
    }
    #[Route('/api/grafikart', name: 'api_grafikart')]
    public function grafikartTutorial(): Response
    {
        return $this->render('default/grafikart.html.twig');
    }
    #[Route('/api/dyma', name: 'api_dyma')]
    public function dymaTutorial(): Response
    {
        return $this->render('default/dyma.html.twig');
    }
    #[Route('/api/hello/{name}', name: 'api_name')]
    public function apiHello(string $name): Response
    {
        return new JsonResponse($name);
    }
}
