<?php

namespace App\Controller;

use App\Entity\Listing;
use App\Repository\PropertyTypeRepository;
use App\Repository\TransactionTypeRepository;
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
        EntityManagerInterface $entityManager,
        TransactionTypeRepository $transactionTypeRepository,
        PropertyTypeRepository $propertyTypeRepository,
    ): Response
    {
        $propertyType = $propertyTypeRepository->findOneBy(['name' => 'Apartment']);
        $transactionType = $transactionTypeRepository->findOneBy([]);

        $listing = new Listing();
        $listing
            ->setTitle('Titre de mn annocne')
            ->setCity('Lyon')
            ->setPrice(3000000)
            ->setDescription('Description de mon annonce')
            ->setCreatedAt(new \DateTimeImmutable())
            ->setUpdatedAt(new \DateTimeImmutable())
            ->setPropertyType($propertyType)
            ->setTransactionType($transactionType)
        ;

        $entityManager->persist($listing);
        $entityManager->flush();

        return $this->redirectToRoute('app_home');
    }
}
