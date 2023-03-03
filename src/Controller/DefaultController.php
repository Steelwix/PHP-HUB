<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(): Response
    {
        // $services = array();
        // $services[] = array("id" => 1, "title" => "FirstCode", "code" => "<?php example", "creator" => "Eric Mega", "release" => "02/03/2023");
        // $services[] = array("id" => 2, "title" => "MediaManager", "code" => "public function newIllustration()", "creator" => "Steelwix", "release" => "02/03/2023");
        // $services[] = array("id" => 3, "title" => "MessageGenerator", "code" => "getHappyMessage()", "creator" => "odmgidia", "release" => "02/03/2023");
        // $services[] = array("id" => 4, "title" => "DateCompare", "code" => "compareWithToday()", "creator" => "Steelwix", "release" => "02/03/2023");
        $name = "My friend";
        return $this->render('default/main.html.twig', ['name' => $name]);
    }
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
