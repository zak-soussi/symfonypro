<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class PersonneController extends AbstractController
{
    #[Route('/personne', name: 'personne')]
    public function index(ManagerRegistry $doctrine): Response
    {

        $manager=$doctrine->getManager();
        $personne=new Personne();
        $personne->setName("zak");
        $personne->setFirstname("soussi");
        $personne->setAge(20);

        $manager->persist($personne);
        $manager->flush();
        return $this->render('personne/index.html.twig', [
            'Pers' =>$personne,
        ]);
    }
}
