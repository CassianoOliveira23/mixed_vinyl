<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use function Symfony\Component\String\u;



// This route defines a url and point to this controller
#[Route('/')]
class VinylController extends AbstractController {

    #[Route('/', name: 'vinyl_homepage', methods: ['GET'])]
    public function homepage() {
        return $this->json(['message' => 'Break up a vinil?']);
    }


    // SLUG is a url safe name, is always a string
    #[Route('/browse/{slug}', name: 'browse_genre', methods: ['GET'])]
    public function browse(string $slug = null): Response
    {
        $title = u(str_replace('-', ' ', $slug))->title(true);
        return new Response('Genre: ' . $title);
    }
}

