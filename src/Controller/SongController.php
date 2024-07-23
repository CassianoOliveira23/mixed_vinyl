<?php

namespace App\Controller;

use Psr\Log\LoggerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

class SongController extends AbstractController
{
    #[Route('/api/songs/{id<\d+>}', name: 'app_song', methods: ['GET'])]
    public function getSong(int $id, LoggerInterface $logger): Response
    {
        // TODO query the datadabe

        $song = [
            'id' => $id,
            'name' => 'Waterfalls',
            'url' => '',
        ];

        $logger->info('Restoring API response for song {song}', [
            'song' => $id,
        ]);

        return $this->json($song);
    }
}
