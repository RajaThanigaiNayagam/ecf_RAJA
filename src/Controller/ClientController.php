<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\ApiClients;
use App\Repository\ApiClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    /**
     * @Route("/client", name="app_client")
     */
    public function index(ApiClientsRepository $apiClientsRepository, EntityManagerInterface $em, Request $request): Response
    {
        $apiclients = new ApiClients();
        

        $form = $this->createForm(ClientType::class, $apiclients);
        $form->handleRequest($request);

        
        //dd($apiclients);

        if ( $form->isSubmitted() && $form->isValid() )  {
            $apiclients = $form->getData();


            $em->persist($apiclients);
            $em->flush();
            
            return $this->redirectToRoute('app_client');
        }

        return $this->render('client/index.html.twig', [
            'form' => $form->createView(),
            'clients' => $apiClientsRepository->findAll(),
        ]);
    }


    
    /**
     * @Route("/add", name="app_add")
     */
    public function addclient(ApiClientsRepository $apiClientsRepository, EntityManagerInterface $em, Request $request): Response
    {
        $apiclients = new ApiClients();

        $form = $this->createForm(ClientType::class, $apiclients);
        $form->handleRequest($request);

        
        //dd($apiclients);

        if ( $form->isSubmitted() && $form->isValid() )  {
            $apiclients = $form->getData();


            $em->persist($apiclients);
            $em->flush();
            
            return $this->redirectToRoute('app_client');
        }

        return $this->render('client/add.html.twig', [
            'form' => $form->createView(),
            'clients' => $apiClientsRepository->findAll(),
        ]);
    }
    

}


