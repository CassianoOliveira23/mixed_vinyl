<?php

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Twig\Environment;

use function Symfony\Component\String\u;



// This route defines a url and point to this controller
#[Route('/')]
class VinylController extends AbstractController {

    #[Route('/', name: 'app_homepage', methods: ['GET'])]
    public function homepage() {

        $tracks  = [
            ['song' =>'Hit em up', 'artist' => '2Pac'],
            ['song' =>'Master of the Puppets', 'artist' => 'Metallica'], 
            ['song' =>'They Dont Care About Us', 'artist' => 'Michal Jackson'],
            ['song' =>'Temple of Hate', 'artist' => 'Angra'],
            ['song' =>'I Wanna be Sadated', 'artist' => 'Ramones'],
            ['song' =>'Juicy', 'artist' => 'Notorius BIG'],
        ];

        dump($tracks);


        //render: The controlles must always return a Response object
        return $this->render('vinyl/homepage.html.twig', [
            'title' => 'PB & Jams',
            'tracks' => $tracks,
        ]);
    }


    // SLUG is a url safe name, is always a string
    #[Route('/browse/{slug}', name: 'app_browse', methods: ['GET'])]
    public function browse(string $slug = null): Response
    {
        $genre = $slug ? u(str_replace('-', ' ', $slug))->title(true) : null;
        
        return $this->render('vinyl/browse.html.twig', [
            'genre' => $genre,
        ]);
    }
}

