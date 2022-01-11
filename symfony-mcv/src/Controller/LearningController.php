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
    #[Route('/about', name: 'about')]
    public function aboutMe(): Response
    {
        return $this->render('learning/index.html.twig', [
            'name' => 'BeCode',
        ]);


    }
    #[Route('/homepage', name: 'homepage')]
    public function showName(Session $session): Response
    {
        if($session->get('name')){
            $name = $session->get('name');
            $test = 'deu certo';
        }else{
            $name = "Unknown";
            $test = 'ola';
        }        
        return $this->render('learning/showMyName.html.twig', [
            'name' => $name,
            'test' => $test
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
