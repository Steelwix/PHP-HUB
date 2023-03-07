<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

use App\Entity\User;
use App\Repository\UserRepository;
use Symfony\Component\Serializer\Encoder\JsonEncoder;
use Symfony\Component\Serializer\Exception\CircularReferenceException;
use Symfony\Component\Serializer\Normalizer\ObjectNormalizer;
use Symfony\Component\Serializer\Serializer;

class DefaultController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function home(UserRepository $userRepository): Response
    {
        $services = array();
        $services[] = array("id" => 1, "title" => "FirstCode", "code" => "<?php example", "creator" => "Eric Mega", "release" => "02/03/2023");
        $services[] = array("id" => 2, "title" => "MediaManager", "code" => "public function newIllustration()", "creator" => "Steelwix", "release" => "02/03/2023");
        $services[] = array("id" => 3, "title" => "MessageGenerator", "code" => "getHappyMessage()", "creator" => "odmgidia", "release" => "02/03/2023");
        $services[] = array("id" => 4, "title" => "DateCompare", "code" => "compareWithToday()", "creator" => "Steelwix", "release" => "02/03/2023");
        $rawuser = $this->getUser();
        try {
            $serializer = new Serializer([new ObjectNormalizer()], [new JsonEncoder()]);
            $user = $serializer->serialize($rawuser, 'json');
        } catch (CircularReferenceException $e) {
            $user = $serializer->serialize($rawuser, 'json', [
                ObjectNormalizer::CIRCULAR_REFERENCE_HANDLER => function ($object) {
                    return $object->getId();
                }
            ]);
        }
        return $this->render('default/main.html.twig', ['user' => $user, 'services' => $services]);
    }
}
