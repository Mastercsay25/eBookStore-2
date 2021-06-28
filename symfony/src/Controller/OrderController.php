<?php

namespace App\Controller;

use App\Entity\OrderDetails;
use App\Form\CartType;
use App\Form\CheckoutType;
use App\Manager\CartManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class OrderController extends AbstractController
{
    /**
     * @Route("/order", name="order")
     */
    public function index(CartManager $cartManager, Request $request): Response
    {
        $cart = $cartManager->getCurrentCart();

        $form = $this->createForm(CartType::class, $cart);
        $form->handleRequest($request);
        $request->request->set('firstName', 'testowy');
        return $this->render('order/index.html.twig', [
            'controller_name' => 'OrderController',
            'cart' => $cart,
            'form' => $form->createView()
        ]);
    }

}
