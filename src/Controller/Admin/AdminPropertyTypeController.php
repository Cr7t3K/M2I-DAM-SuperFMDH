<?php

namespace App\Controller\Admin;

use App\Entity\PropertyType;
use App\Repository\PropertyTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/property-type', name: 'app_admin_property_type_')]
class AdminPropertyTypeController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(PropertyTypeRepository $propertyTypeRepository): Response
    {
        return $this->render('admin/propertyType/index.html.twig', [
            'propertyTypes' => $propertyTypeRepository->findAll(),
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        // Code to create new PropertyType
    }

    #[Route('/remove/{id}', name: 'delete')]
    public function delete(
        PropertyType $propertyType,
        EntityManagerInterface $entityManager
    ): Response {
        $entityManager->remove($propertyType);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_property_type_list', [], Response::HTTP_SEE_OTHER);
    }
}
