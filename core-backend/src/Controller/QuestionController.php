<?php

namespace App\Controller;

use App\Repository\QuestionRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

class QuestionController extends AbstractController
{
    /**
     * Récupère une question depuis la base de données.
     *
     * @param QuestionRepository $questionRepository Le repository pour accéder aux données des questions.
     * @throws None
     * @return JsonResponse La réponse JSON contenant les données de la question récupérée.
     */
    #[Route('/questions/get-questions', methods: ['GET'])]
    public function getQuestions(QuestionRepository $questionRepository): JsonResponse
    {
        $questions = $questionRepository->findAll();

        return $this->json(
            ['questions' => $questions],
            Response::HTTP_OK
        );
    }


    /** */
    #[Route('/questions/get-questions/{id}', name: 'question_detail', methods: ['GET'])]
    public function getQuestionDetail(QuestionRepository $questionRepository, int $id): JsonResponse
    {
        $question = $questionRepository->find($id);

        if (!$question) {
            return $this->json(
                ['message' => 'Question not found'],
                Response::HTTP_NOT_FOUND
            );
        }

        $questionData = [
            'id' => $question->getId(),
            'description' => $question->getDescription(),
        ];

        return $this->json(
            [
                'questions' => $questionData,
                'pagination' => []
            ],
            Response::HTTP_OK
        );
    }

    // #[Route('/insert-response', name: 'insert_response', methods: ['POST'])]
    // public function insertResponse(Request $request, EntityManagerInterface $manager, QuestionRepository $questionRepository): JsonResponse
    // {
    //     $data = json_decode($request->getContent(), true);
    //     $question = $data["idQuestion"];
    //     $respo = $data["idQuestion"];
    //     $question = $data["idQuestion"];

    //     return $this->json(
    //         [""],
    //         Response::HTTP_OK
    //     );
    // }
}
