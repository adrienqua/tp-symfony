<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use Symfony\Component\HttpFoundation\Request;
use App\Service\FileUploader;
use Doctrine\ORM\EntityManagerInterface;
use App\Entity\Upload;


class UploadController extends AbstractController
{
    #[Route('/upload', name: 'app_upload')]
    public function index(): Response
    {
        return $this->render('others/upload.html.twig', [
            'controller_name' => 'UploadController',
        ]);
    }

    #[Route(path: '/api/upload', name: 'api_upload')]
public function uploadApi(
    Request $request,
    FileUploader $fileUploader,
    EntityManagerInterface $entityManager
): Response
{
    /** @var UploadedFile[] $files */
    $files = $request->files->all()['files'];

    foreach ($files as $file) {
        $fileName = $fileUploader->upload($file);
        $upload = new Upload();
        $upload->setUploadedBy($this->getUser());
        $upload->setUrl($fileName);
        $entityManager->persist($upload);
    }

    $entityManager->flush();

    return $this->json([
        'message' => 'Upload successful!',
    ]);
    
    return $this->json([
        'message' => 'Upload failed!',
    ], Response::HTTP_BAD_REQUEST);
}
}
