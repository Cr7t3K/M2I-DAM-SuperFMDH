<?php

namespace App\Controller\Admin;

use App\Repository\ListingRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/listing', name: 'app_admin_listing_')]
class AdminListingController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(ListingRepository $listingRepository): Response
    {
        return $this->render('admin/listing/index.html.twig', [
            'listings' => $listingRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        // Code to create new Listing by Admin
    }
}
