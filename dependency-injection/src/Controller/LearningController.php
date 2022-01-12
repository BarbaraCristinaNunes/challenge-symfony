<?php

namespace App\Controller;

use App\Service\Transform;
use App\Service\Master;
use App\Service\Logger;
use App\Service\ChangeSpacesToDashes;
use App\Service\CaptalizesWords;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
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
    #[Route('/homepage', name: 'homepage')]
    public function showMessage(): Response
    {
        return $this->render('learning/Homepage.html.twig', [
            'controller_name' => 'LearningController',
        ]);
    }
    #[Route('/showMessage', name: 'showMessage')]
    public function changeMessage(Request $request): Response
    {
        // var_dump($request->request->get('message'));
        // var_dump($request->request->get('changeMessage'));
        $message = $request->request->get('message');
        $method = $request->request->get('changeMessage');

        if($method == 'ChangeSpacesToDashes'){
            $master = new Master(new Logger(), new ChangeSpacesToDashes());
            $master->transformMessage($message);
        }else{
            $master = new Master(new Logger(), new CaptalizesWords());
            $master->transformMessage($message);
        }

        
        
        return $this->redirectToRoute('homepage');
    }
}
