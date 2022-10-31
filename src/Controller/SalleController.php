<?php

namespace App\Controller;

use App\Entity\ApiInstallPerm;
use Doctrine\ORM\EntityManagerInterface;
use Knp\Component\Pager\PaginatorInterface;
use App\Repository\ApiInstallPermRepository;
use Symfony\Component\HttpFoundation\Request;
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
     * @Route("/salleadd", name="app_salleadd")
     */
    public function index(
        ApiInstallPermRepository $apiInstallPermRepository,
        EntityManagerInterface $em, 
        Request $request
    ): Response
    {
        //Route pour ajouter un Salle/Install
        $apiinstallperm = new ApiInstallPerm();

        $form = $this->createForm(SalleType::class, $apiinstallperm);
        $form->handleRequest($request);


        if ( $form->isSubmitted() && $form->isValid() )  {
            $apiinstallperm = $form->getData();


            $em->persist($apiinstallperm);
            $em->flush();
            
            return $this->redirectToRoute('app_salle');
        }

        return $this->render('salle/add.html.twig', [
            'form' => $form->createView(),
            'salles' => $apiInstallPermRepository->findAll(),
        ]);
    }
}
