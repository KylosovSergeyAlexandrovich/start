<?php
/**
 * Created by PhpStorm.
 * User: formo
 * Date: 18.02.2020
 * Time: 16:27
 */

namespace App\Controller;

use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Session\SessionInterface;


class HomePageController extends AbstractController
{

    private $session;

    public function __construct(SessionInterface $session)
    {
        $this->session = $session;
    }




    /**
     * @Route("/")
     */
    public function index()
    {
        $number = random_int(0, 100);


        // stores an attribute in the session for later reuse
        $this->session->set('auth', 'on');
        // gets an attribute by name
        $auth = $this->session->get('auth');
        // the second argument is the value returned when the attribute doesn't exist
        $filters = $this->session->get('filters', []);


        return $this->render('HomePage.html.twig', [
            'number' => $number,
//            'auth' => $auth,
        ]);
    }





    /*
     * TODO: сделать защищенную страницу на котору ю без аторизации не попасть будет редирект
     * TODO: сделать авторизацию через ajax чисто на клин по кнопке и редирект на защищенную страницу
     * TODO: разобраться с базой данных
     *
     * */


    /**

     */
    /**
     * @Route("/authorization")
     * @param Request $request
     * @return JsonResponse|\Symfony\Component\HttpFoundation\Response
     */
    public function authorization(Request $request)
    {


        dump($request);
        $user = 1 ;

        if (is_null($user)) {
            $response = [
                'message' => 'Mail is not registered',
                'hideFields' => 'on',
                'cleanPassword' => 'on'
            ];
            return new JsonResponse($response, 422);
        }


        return new JsonResponse();
    }








}