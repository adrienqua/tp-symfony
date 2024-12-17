<?php

namespace App\Controller\List;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\CategoryRepository;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Category;
use App\Repository\MovieRepository;
use App\Repository\PlaylistRepository;
use App\Repository\PlaylistSubscriptionRepository;


class ListController extends AbstractController
{

    #[Route(path: '/lists', name: 'page_lists')]
    public function list(Request $request, EntityManagerInterface $entityManager, PlaylistRepository $playlistRepository, PlaylistSubscriptionRepository $playlistSubscriptionRepository): Response
    {
        $playlistId = $request->query->get('playlist');

        if ($playlistId) {
            $playlist = $playlistRepository->find($playlistId);
        } else {
            $playlist = null;
        }

        $playlits = $playlistRepository->findAll();
        $subscribedPlaylists = $playlistSubscriptionRepository->findAll();

        return $this->render('others/lists.html.twig', [
            'playlists' => $playlits,
            'subscribedPlaylists' => $subscribedPlaylists,
            'activePlaylist' => $playlist,
        ]);
    }

}