<?php

namespace App\Controller;

use App\Repository\PostRepository;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class FrontController extends AbstractController{
    #[Route('/', name: 'app_front')]
    public function index(): Response
    {
        return $this->render('front/index.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    #[Route('/actualites', name: 'app_front_actualites')]
    public function actualites(PostRepository $postRepository , PaginatorInterface $paginator, Request $request): Response
    {
        $postQueries = $postRepository->findOrderPosts();

        $post = $paginator->paginate(
            $postQueries,
            $request->query->getInt('page', 1),
            3
        );

        return $this->render('news/index.html.twig', [
            'posts' => $post,
        ]);
    }

    #[Route('/actualites/{id}--{slug}', name: 'app_front_actu_detail')]
    public function actuDetail(): Response
    {
        return $this->render('front/actu_detail.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    #[Route('/contact', name: 'app_front_contact')]
    public function contact(): Response
    {
        return $this->render('front/contact.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }

    #[Route('/about', name: 'app_front_about')]
    public function about(): Response
    {
        return $this->render('front/about.html.twig', [
            'controller_name' => 'FrontController',
        ]);
    }
    
}
