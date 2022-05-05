<?php

namespace App\Controller;

use App\Entity\Personne;
use Doctrine\Persistence\ManagerRegistry;
use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
#[Route("/personne")]
class PersonneController extends AbstractController
{
    #[Route('/all', name: 'personne.all')]
    public function index1(ManagerRegistry $doctrine): Response
    {

        $repo=$doctrine->getRepository(Personne::class);
        $ps=$repo->findBy();

       return $this->render("personne/index.html.twig",["ps1"=>$ps]);
    }

    #[Route('', name: 'personne')]
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
