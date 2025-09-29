<?php

namespace App\Controller\Admin;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

final class AdminListingController extends AbstractController
{

    #[Route(
        path: '/admin/listings',
        name: 'admin_listings',
    )]
    public function index(): Response
    {
        return $this->render('admin/listings/index.html.twig', [
            'controller_name' => 'AdminListingController',
        ]);
    }

    #[Route(
        path: '/admin/listings/{id}/toggle',
        name: 'admin_listings_toggle_status'
    )]
    public function toggle(): Response
    {
        return $this->render('admin/listings/toggle.html.twig', [
            'controller_name' => 'AdminListingController',
        ]);
    }
}
