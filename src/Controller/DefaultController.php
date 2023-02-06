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
    #[Route('/api/hello/{name}', name: 'api_hello')]
    public function apiHelloword(string $name): Response
    {
        return new JsonResponse('hello ' . $name);
    }
}
