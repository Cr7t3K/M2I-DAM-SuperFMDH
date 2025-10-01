<?php

namespace App\Controller;

use App\Entity\Listing;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class ListingController extends AbstractController
{
    #[Route('/listing', name: 'app_listing')]
    public function index(): Response
    {
        return $this->render('listing/index.html.twig', [
            'controller_name' => 'ListingController',
        ]);
    }

    #[Route('/listing/new', name: 'app_listing_new')]
    public function new(
        EntityManagerInterface $entityManager
    ): Response
    {
        $listing = new Listing();
        $listing
            ->setTitle('Titre de mn annocne')
            ->setCity('Lyon')
            ->setPrice(3000000)
            ->setDescription('Description de mon annonce')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable())
        ;

        $entityManager->persist($listing);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
