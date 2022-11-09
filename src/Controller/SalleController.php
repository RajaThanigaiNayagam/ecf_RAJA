<?php

namespace App\Controller;

use App\Form\SalleType;
use App\Entity\ApiClients;
use App\Entity\ApiInstallPerm;
use App\Form\ClientsGrantsType;
use App\Entity\ApiClientsGrants;
use App\Repository\ApiClientsRepository;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ApiInstallPermRepository;
use Symfony\Component\HttpFoundation\Request;
use App\Repository\ApiClientsGrantsRepository;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;

class SalleController extends AbstractController
{
    /**
     * @Route("/salle", name="app_salle")
     */
    public function indexsalle(
        ApiInstallPermRepository $apiInstallPermRepository,
        PaginatorInterface $paginator,
        Request $request
    ): Response
    {
        $sallessearch = $apiInstallPermRepository->findAll();
        
        $salles = $paginator->paginate(
            $sallessearch,
            $request->query->getInt('page', 1),
            3 /** nomber de Salle a afficher */
        );

        return $this->render('salle/index.html.twig', [
            'searchactive' => '',
            'sallessearch' => $sallessearch,
            'salles' => $salles,
        ]);
    }




    
    /**
     * @Route("/salleadd/{id}", name="app_salleadd", defaults={"id"=38} )
     */
    public function salleadd(
        string $id,
        ApiClientsGrantsRepository $apiClientsGrantsRepository,
        ApiClientsRepository $apiClientsRepository,
        EntityManagerInterface $em, 
        Request $request
    ): Response
    {
        //Route pour ajouter un Salle/Install
        $apiinstallperm = new ApiInstallPerm();
        $form = $this->createForm(SalleType::class, $apiinstallperm, array('clientid' => $id));
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid() )  {
            $apiclientsgrants = new ApiClientsGrants();
            $apiinstallperm = $form->getData();
            

            $apiclients = new ApiClients();

            //$apiclientsgrants.setClientId($apiclients);
            //$clientsgrantssearch = $apiClientsGrantsRepository->findBy(['client_id' => $id]);
            //$clientssearch = $apiClientsRepository->findBy(['id' => $id]);
            $apiclientsgrants->setClientId($this->manager->getReference(ApiClients::class, $id));
            $apiclientsgrants->setInstallId(1);
            $apiclientsgrants->setActive($request->request->get('salle')['active']);
            $apiclientsgrants->setPerms($request->request->get('salle')['perms']);
            $apiclientsgrants->setBranchId($request->request->get('salle')['branch_id']);
            
            //$apiclientsgrants->addClientid($apiinstallperm);

            $em->persist($apiinstallperm);
            $em->persist($apiclientsgrants);

            //$em->persist($apiclientsgrants);
            $em->flush();
            
            return $this->redirectToRoute('app_salle');
        }
        //dump($form);
        return $this->render('salle/addsalle.html.twig', [
            'form' => $form->createView(),
            'salles' => '',
            //'salles' => $apiInstallPermRepository->findAll(),
        ]);
    }
}
