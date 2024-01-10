<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuestionController extends AbstractController
{
    /**
     * Récupère une question depuis la base de données.
     *
     * @param QuestionRepository $questionRepository Le repository pour accéder aux données des questions.
     * @throws None
     * @return JsonResponse La réponse JSON contenant les données de la question récupérée.
     */
    #[Route('/question', methods: ['GET'])]
    public function getQuestion(QuestionRepository $questionRepository): JsonResponse
    {

        $data = $questionRepository->findAll();

        return $this->json(['data' => $data]);
    }
}
