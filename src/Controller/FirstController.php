<?php

namespace App\Controller;

use phpDocumentor\Reflection\Types\This;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FirstController extends AbstractController
{
    #[Route('/first/new', name: 'first.new')]
    public function index2(): Response
    {
        $tables=[
            ['firstname'=>'zak','age'=>15],
            ['firstname'=>'ziko','age'=>16],
            ['firstname'=>'ptoo','age'=>17],
            ['firstname'=>'ooooooo','age'=>13]
        ];
        return $this->render("first/firstnew.html.twig",[
            'tables'=>$tables,
        ]);
    }
    #[Route('/first/{name}', name: 'app_first')]
    public function infdex($name): Response
    {
        return $this->render('first/index.html.twig', [
            'controller_name' => 'FirstController',

        ]);
    }
    #[Route('/mul/{entier1}/{entier2}', name: 'mul',requirements: ["entier1"=>"\d+",
        "entier2"=>"\d+"])]
    public function index1($entier1,$entier2): Response
    {
        $res=$entier1*$entier2;
        return new Response("<h1>$res</h1>");
    }

}
