<?php

namespace App\Controller\Admin;

use App\Entity\TransactionType;
use App\Repository\TransactionTypeRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Attribute\Route;

#[Route('/admin/transaction-type', name: 'app_admin_transaction_type_')]
class AdminTransactionTypeController extends AbstractController
{
    #[Route('/', name: 'list')]
    public function index(TransactionTypeRepository $transactionTypeRepository): Response
    {
        $transactionTypes = $transactionTypeRepository->findAll();

        return $this->render('admin/transactionType/index.html.twig', [
            'transactionTypes' => $transactionTypes,
        ]);
    }

    #[Route('/new', name: 'new')]
    public function new(EntityManagerInterface $entityManager): Response
    {
        // Code to create new TransactionType
    }

    #[Route('/remove/{id}', name: 'remove')]
    public function remove(
        TransactionType $transactionType,
        EntityManagerInterface $entityManager
    ): Response {
        $entityManager->remove($transactionType);
        $entityManager->flush();

        return $this->redirectToRoute('app_admin_transaction_type_list');
    }
}
