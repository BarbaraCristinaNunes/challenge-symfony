<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class LearningController extends AbstractController
{
    #[Route('/learning', name: 'learning')]
    public function index(): Response
    {
        return $this->render('learning/index.html.twig', [
            'controller_name' => 'LearningController',
        ]);


    }
    #[Route('/about-me', name: 'homepage')]
    public function aboutMe(): Response
    {
        return $this->render('learning/index.html.twig', [
            'name' => 'BeCode',
        ]);


    }
    #[Route('/homepage', name: 'homepage')]
    public function showName(): Response
    {
        // if(isset($_POST['btn']) && isset($_POST['name'])){
        //     $name = $_POST['name'];
        // }else{
            $name = "Unknown";
        // }
        return $this->render('learning/showMyName.html.twig', [
            'name' => $name,
        ]);


    }
}
