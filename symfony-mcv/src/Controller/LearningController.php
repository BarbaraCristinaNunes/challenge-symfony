<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;

class LearningController extends AbstractController
{

    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);


    }
    #[Route('/about-becode', name: 'about-becode')]
    public function aboutMe(Session $session): Response
    {
        if($session->get('name')){
            $name = $session->get('name');
        }else{
            $response = $this->forward('App\Controller\LearningController::showName');
            return $response;
        }
        $america = date("d-m-Y");
        $europe = date("m-d-Y");
        $chinaJapan = date("Y-m-d");

        return $this->render('learning/index.html.twig', [
            'name' => $name,
            'americaDate' => $america,
            'europeDate' => $europe,
            'chinaJapandate' => $chinaJapan
        ]);


    }
    #[Route('/homepage', name: 'homepage')]
    public function showName(Session $session): Response
    {
        if($session->get('name')){
            $name = $session->get('name');
        }else{
            $name = "Unknown";
        }        
        return $this->render('learning/showMyName.html.twig', [
            'name' => $name,
        ]);

    }
    #[Route('/changeMyName', name: 'changeMyName', methods: ['POST'])]
    public function changeMyName(Request $request, Session $session): RedirectResponse
    {
        $name = $request->request->get('name');
        $session->set('name', $name);
        return $this->redirectToRoute('homepage');
    }
}
