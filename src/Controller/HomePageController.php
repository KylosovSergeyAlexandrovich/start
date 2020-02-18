<?php
/**
 * Created by PhpStorm.
 * User: formo
 * Date: 18.02.2020
 * Time: 16:27
 */

namespace App\Controller;


use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;


class HomePageController extends AbstractController
{

    /**
    * @Route("/")
    */
    public function index()
    {
        $number = random_int(0, 100);

        return $this->render('HomePage.html.twig', [
            'number' => $number,
        ]);
    }
}