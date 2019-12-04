<?php

namespace App\Controller;

use App\Entity\Produit;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class MainController extends AbstractController
{
    // private $objectManager;
    // public function __construct(ObjectManager $objectManager){
    //     $this->objectManager = $objectManager;
    // }

    /**
     * @Route("/main", name="main")
     */
    public function index()
    {
        return $this->render('main/index.html.twig', [
            'controller_name' => 'MainController',
        ]);
    }
    /**
     * @Route("/test", name="test")
     */
    public function test(ObjectManager $objectManager): Response
    {
        $produit = new Produit();
        $produit->setLibelle("Pc");
        $produit->setPrix(100.2);
        $objectManager->persist($produit);
        $objectManager->flush();
        return new Response("ok");
        // return $this->render('main/index.html.twig', [
        //     'controller_name' => 'MainController',
        // ]);
    }
}
