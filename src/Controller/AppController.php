<?php

namespace App\Controller;

use App\Entity\Meta\ShowNameMeta;
use App\Entity\Node;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Serializer\SerializerInterface;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class AppController extends AbstractController
{
    public function __construct(
        private SerializerInterface $serializer,
        private ValidatorInterface $validator
    )
    {
    }

    #[Route('/app', name: 'app_app')]
    public function index(): Response
    {
        return $this->render('app/index.html.twig', [
            'controller_name' => 'AppController',
        ]);
    }

    #[Route('/app/{id}', name: 'app_show_node', methods: [Request::METHOD_GET])]
    public function showNode(Node $node): Response
    {
        return $this->json($node, Response::HTTP_OK, [], ['groups' => ['show_node']]);
    }

    #[Route('/app/showName', name: 'app_show_name', methods:[Request::METHOD_POST])]
    public function showName(Request $request): Response
    {
        try {
            $obj = $this->serializer->denormalize($request->request->all(), ShowNameMeta::class);
        } catch (\Exception $e) {
            return $this->json($e, Response::HTTP_BAD_REQUEST);
        }
        $errors = $this->validator->validate($obj);

        if (count($errors) > 0) {
            return $this->json($errors, Response::HTTP_BAD_REQUEST);
        }
        return $this->json($obj, Response::HTTP_OK, [], ["groups" => ['name']]);
    }
}
