<?php

namespace App\Controller;

use App\Entity\Personne;
use App\Form\PersonneFormType;
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
        $personne=new Personne();
     $form=$this->createForm(PersonneFormType::class,$personne);


       return $this->render("personne/index.html.twig",["form"=>$form->createView()]);
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
