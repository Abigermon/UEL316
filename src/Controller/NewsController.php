<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;
use App\Repository\PostRepository;

class NewsController extends AbstractController
{
    #[Route('/news', name: 'app_news')]
    public function index(PostRepository $postRepository): Response
    {
        $post = $postRepository->findAll();
        return $this->render('news/index.html.twig', [
            'posts' => $post,
        ]);
    }

    #[Route('/news/{id}', name: 'app_news_show')]
    public function show(int $id): Response
    {
        return $this->render('news/show.html.twig', ['id' => $id]);
    }
}

