<?php

namespace App\Controller\Admin;

use App\Entity\Author;
use App\Form\AuthorType;
use App\Repository\AuthorRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

     #[Route('/admin', name: 'app_admin')]
class AuthorController extends AbstractController
{
    #[Route('/author', name: 'app_admin_author')]
    public function index(AuthorRepository $authorRepository): Response
    {
        
            $authors = $this->authorRepository->findAll();
        return $this->render('admin/authors/index.html.twig', [
            'authors' => $authors,
        ]);
        
    }
	
	
    #[Route('/new', name: 'app_admin_author_new', methods: ['GET', 'POST'])]
    public function new(Request $request): Response
    {
        $author = new Author();
        $form = $this->createForm(AuthorType::class, $author);

        $form->handleRequest($request);
        if ($form->isSubmitted() && $form->isValid()) {
            // faire quelque chose
        }

        return $this->render('admin/author/new.html.twig', [
            'form' => $form,
        ]);
    }
}
