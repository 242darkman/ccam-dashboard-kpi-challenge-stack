<?php

namespace App\Controller;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MeController extends AbstractController
{

    #[Route('/api/me', name: 'get_me', methods: ['GET'])]
    public function __invoke(UserRepository $userRepository): Response
    {
        $userFromPayload = $this->getUser();
        $retrievedUser = $userRepository->find($userFromPayload);
        $user = [
            'users' => [
                'id' => $retrievedUser->getId(),
                'username' => $retrievedUser->getUsername(),
                'email' => $retrievedUser->getEmail(),
                'roles' => $retrievedUser->getRoles(),
            ]
        ];

        if (!$user) {
            return $this->json(['message' => 'User not found'], Response::HTTP_NOT_FOUND);
        }

        return $this->json($user);
    }
}
