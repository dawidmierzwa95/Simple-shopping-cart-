<?php
namespace App\Controller;

use App\Entity\Photo;
use App\Entity\Product;
use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class FrontendController extends AbstractController
{
    /**
     * Manage Vue's routes
     * @Route("/", name="vue")
     * @Route("/{params}", name="vue_app", methods={"GET"}, requirements={"route"="^.+"}))
     */
    public function vueApp($params = "", $next = "")
    {
        return $this->render('master.html.twig', []);
    }
}