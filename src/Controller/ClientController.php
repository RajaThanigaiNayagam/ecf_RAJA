<?php

namespace App\Controller;

use App\Form\ClientType;
use App\Entity\ApiClients;
use App\Repository\ApiClientsRepository;
use App\Repository\ApiInstallPermRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class ClientController extends AbstractController
{
    /**
     * @Route("/", name="app_client")
     */
    public function index(
            ApiClientsRepository $apiClientsRepository,
            PaginatorInterface $paginator,
            Request $request
        ): Response
    {
        
        $clientssearch = $apiClientsRepository->findAll();
        
        $clients = $paginator->paginate(
            $clientssearch,
            $request->query->getInt('page', 1),
            3 /** nomber de clients a afficher */
        );

        return $this->render('client/index.html.twig', [
            'searchactive' => '',
            'clientssearch' => $clientssearch,
            'clients' => $clients,
        ]);
    }
    

    /**
     * @Route("client/{id}", name="app_cliid", defaults={"id"=38} )
     */
    public function client(
        string $clientid,
        ApiClientsRepository $apiClientsRepository,
        ApiInstallPermRepository $apiInstallPermRepository,
        ApiClients $apiclient
        ): Response
    {
        //$resultclient = $this->getDoctrine()->getRepository(ApiClients::class);

        $installdata = $apiInstallPermRepository->findAll();
        $installsearch = $apiInstallPermRepository->findBy(['client_id' => $clientid]);
        dump($installsearch);

        $data = $apiClientsRepository->findAll();
        $clientssearch = $apiClientsRepository->findBy(['active' => $clientid]);

        // Cette route affiche les detail d'un client
        return $this->render('client/client.html.twig', [
            'client'      => $apiclient,
        ]);
    }

    

    /**
     * @Route("clientid/{clientid}", name="app_clientid")
     */
    public function clientsidsearch(
        string $clientid, 
        ApiClientsRepository $apiClientsRepository,
        PaginatorInterface $paginator,
        Request $request
        ): Response
    {
        $data = $apiClientsRepository->findAll();
        $sallessearch = $apiClientsRepository->findBy(['client_id' => $clientid]);

        $clients = $paginator->paginate(
            $clientssearch,
            $request->query->getInt('page', 1),
            3/* nomber de clients a afficher */
        );

        return $this->render('client/index.html.twig', [
            'searchactive' => '',
            'clientssearch' => $data,
            'clients'      => $clients,
            'sallessearch'      => $sallessearch,
        ]);
    }

    
    /**
     * @Route("client/{name}", name="app_cliname")
     */
    public function clientsnamesearch(
        string $name,
        ApiClientsRepository $apiClientsRepository,
        PaginatorInterface $paginator,
        Request $request
        ): Response
    {
        $data = $apiClientsRepository->findAll();
        $clientssearch = $apiClientsRepository->findBy(['client_name' => $name]);

        $clients = $paginator->paginate(
            $clientssearch,
            $request->query->getInt('page', 1),
            3/* nomber de clients a afficher */
        );

        return $this->render('client/index.html.twig', [
            'searchactive' => '',
            'clientssearch' => $data,
            'clients' => $clients,
        ]);
    }



    
    /**
     * @Route("activeclient/{active}", name="app_cliactive")
     */
    public function clientactivesearch(
        string $active,
        ApiClientsRepository $apiClientsRepository,
        PaginatorInterface $paginator,
        Request $request
        ): Response
    {
        if ($active){ $searchactive = 1; } else { $searchactive = 0; };
        //Route pour chercher des clients/Partenaires  -  activé/désactivé
        
        $data = $apiClientsRepository->findAll();
        $clientssearch = $apiClientsRepository->findBy(['active' => $searchactive]);
        
        $clients = $paginator->paginate(
            $clientssearch,
            $request->query->getInt('page', 1),
            3/* nomber de clients a afficher */
        );

        return $this->render('client/index.html.twig', [
            'searchactive' => $active,
            'clientssearch' => $data,
            'clients' => $clients,
        ]);
    }




    
    /**
     * @Route("/add", name="app_add")
     */
    public function addclient(
        ApiClientsRepository $apiClientsRepository, 
        EntityManagerInterface $em, 
        Request $request
    ): Response
    {
        //Route pour ajouter un client/partenaire
        $apiclients = new ApiClients();

        $form = $this->createForm(ClientType::class, $apiclients);
        $form->handleRequest($request);


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
    //  END add route



}


