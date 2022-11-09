<?php

namespace App\Controller;

use App\Entity\ApiClients;
use App\Form\ClientsGrantsType;
use App\Entity\ApiClientsGrants;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ApiClientsGrantsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientsGrantsController extends AbstractController
{
    /**
     * @Route("addclients", name="app_addclients")
     */
    public function addclients(
        ApiClientsGrantsRepository $apiClientsGrantsRepository, 
        EntityManagerInterface $em, 
        Request $request
    ): Response
    {
        
        $apiclients = new ApiClients();
        $em->persist($apiclients);

        $apiclientsgrants = new ApiClientsGrants();

        $form = $this->createForm(ClientsGrantsType::class, $apiclientsgrants);
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid() )  {
            $apiclientsgrants = $form->getData();


            $em->persist($apiclientsgrants);
            $em->flush();
        }

        return $this->render('clients_grants/index.html.twig', [
            'form' => $form->createView(),
        ]);
    }
}
