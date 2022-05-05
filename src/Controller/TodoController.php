<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Request;
#[Route('/todo')]
class TodoController extends AbstractController
{
    #[Route('', name: 'app_todo')]
    public function index(Request $request ): Response
    {
        $session=$request->getSession();
        if(!($session->has("todos")))
        {
            $todos=[
                'achat'=>'acheter clé usb',
                'cours'=>'Finaliser mon cours',
                'correction'=>'corriger mes examens'
            ];
            $session->set("todos",$todos);
        }
        return $this->render('todo/index.html.twig');
    }
    #[Route('/{name}/{content?test}',)
    ]
    public function todoadd(Request $request,$name,$content)
    {
       $session=$request->getSession();
       if($session->has("todos"))
       {
           $todos=$session->get("todos");
            if(isset($todos[$name]))
            {
                $this->addFlash("error","il existe déjà");

            }
            else
            {
                $todos[$name]=$content;
                $session->set("todos",$todos);
                $this->addFlash("success","ajouté avec succés");

            }
       }
       else
       {
           $this->addFlash("error","il faut instancier");
       }
       return $this->redirectToRoute("app_todo");
    }

}
