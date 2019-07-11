<?php

namespace ShopBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Routing\Annotation\Route;
<<<<<<< HEAD
=======

>>>>>>> arreglito

class DefaultController extends Controller
{
    /**
     * @Route("/", name="shop")
     */
    public function indexAction()
    {
        return $this->render('@Shop/Default/index.html.twig');
    }

    /**
     * @Route("/cart", name="cart")
     */
    public function initializeCartAction()
    {
        return $this->render('product/cart.html.twig');
    }


}
