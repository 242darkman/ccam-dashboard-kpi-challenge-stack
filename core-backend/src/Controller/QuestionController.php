<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;

class QuestionController extends AbstractController
{
    #[Route('/api/question', methods: ['GET'])]
    public function getQuestion(QuestionRepository $questionRepository): JsonResponse
    {

        $data = $questionRepository->findAll();

        return $this->json(['data' => $data]);
    }
}
