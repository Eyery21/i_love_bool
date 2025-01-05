<?php

namespace App\Controller;

use App\Entity\Book;
use App\Entity\Character;
use App\Entity\Series;
use App\Entity\User;
use Symfony\Bridge\Doctrine\Attribute\MapEntity;

use App\Repository\UserRepository;
use App\Form\BookType;
use App\Repository\BookRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/book')]
final class BookController extends AbstractController
{

    public function getSlug(): string
    {
        return strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', ' ', $this->title), ' '));
    }
    
    #[Route( name: 'app_book_index', methods: ['GET'])]
    public function index(BookRepository $bookRepository, UserRepository $userRepository, EntityManagerInterface $entityManager): Response
    {
        
        $books = $bookRepository->findAll();
        $characters = $entityManager->getRepository(Character::class)->findAll();
        $series = $entityManager->getRepository(Series::class)->findAll();
        $user = $this->getUser();
                return $this->render('book/index.html.twig', [
            'books' => $books,
            'user' => $user,
            'characters' => $characters,
            'series' => $series,

        ]);
    }

    #[Route('/new', name: 'app_book_new', methods: ['GET', 'POST'])]
    public function new(Request $request, EntityManagerInterface $entityManager): Response
    {
        $book = new Book();
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->persist($book);
            $entityManager->flush();

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('book/new.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }


    #[Route('/{id}/{slug}', name: 'app_book_show', methods: ['GET'])]
    public function show(Book $book, string $slug, EntityManagerInterface $entityManager): Response
    


    {
        $characters = $entityManager->getRepository(Character::class)->findAll();
        $series = $book->getSeries();
        $otherBooks = [];
        if ($series) {
            $otherBooks = $entityManager->getRepository(Book::class)->findBy(['series' => $series]);
        }
                return $this->render('book/show.html.twig', [
            'book' => $book,
            'characters' => $characters,
            'series' => $series,
            'otherBooks' => $otherBooks,

        ]);
    }

    #[Route('/{id}/edit', name: 'app_book_edit', methods: ['GET', 'POST'])]
    public function edit(Request $request, Book $book, EntityManagerInterface $entityManager): Response
    {
        $form = $this->createForm(BookType::class, $book);
        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $entityManager->flush();

            return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
        }

        return $this->render('book/edit.html.twig', [
            'book' => $book,
            'form' => $form,
        ]);
    }

    #[Route('/{id}', name: 'app_book_delete', methods: ['POST'])]
    public function delete(Request $request, Book $book, EntityManagerInterface $entityManager): Response
    {
        if ($this->isCsrfTokenValid('delete'.$book->getId(), $request->getPayload()->getString('_token'))) {
            $entityManager->remove($book);
            $entityManager->flush();
        }

        return $this->redirectToRoute('app_book_index', [], Response::HTTP_SEE_OTHER);
    }



}
