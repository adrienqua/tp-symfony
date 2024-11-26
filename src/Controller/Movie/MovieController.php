<?php

namespace App\Controller\Movie;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Entity\Movie;

class MovieController extends AbstractController
{
    #[Route(path: '/movie/{id}', name: 'page_movie_details')]
    public function movieDetails(Movie $movie): Response
    {
        return $this->render('movie/detail.html.twig', ['movie' => $movie]);
    }

    #[Route(path: '/serie', name: 'page_serie_details')]
    public function serieDetails(): Response
    {
        return $this->render('movie/detail_serie.html.twig');
    }

}