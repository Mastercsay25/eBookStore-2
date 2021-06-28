<?php

namespace App\Controller;

use App\Entity\Order;
use App\Entity\OrderDetails;
use App\Manager\CartManager;
use DateTimeInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\RadioType;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpFoundation\Session\SessionInterface;
use Symfony\Component\Routing\Annotation\Route;

use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;



class CheckoutController extends AbstractController
{

    /**
     * @Route("/checkout", name="checkout")
     */
    public function checkout(CartManager $cartManager, Request $request, SessionInterface $session): Response
    {
        $products = $cartManager->getCurrentCart()->getItems();
        $total = $cartManager->getCurrentCart()->getTotal();
        $order_id = $cartManager->getCurrentCart()->getId();
        $orders = new Order();
        $orders->setId($order_id);

        $orders->setCreatedAt(new \DateTime());
        $orders->setUpdatedAt(new \DateTime());
        $orders->setStatus('cart');
        $order = new OrderDetails;

        $form = $this->createFormBuilder($order)
            ->add('firstname', TextType::class)
            ->add('lastname', TextType::class)
            ->add('email', TextType::class)
            ->add('address', TextType::class)
            ->add('address', TextType::class)
            ->add('adress2', TextType::class)
            ->add('country', TextType::class)
            ->add('postalcode', TextType::class)
            ->add('payment_method', RadioType::class)
            ->add('shipping_method', RadioType::class)
            ->add('phone', TextType::class)
            ->add('save', SubmitType::class, ['label' => 'Confirm order'])
            ->getForm();

        $form->handleRequest($request);

        if ($form->isSubmitted() && $form->isValid()) {
            $order = $form->getData();
            $order->setStatus('new');

            $order->setOrderId($orders);
            $order->setPaid($total);
            $entityManager = $this->getDoctrine()->getManager();
            $entityManager->persist($order);
            $entityManager->flush();




            return $this->render('checkout/confirmation.html.twig');
        }

        return $this->render('checkout/index.html.twig', [
            'total' => $total,
            'form' => $form->createView(),
            'order_id' => $order_id,
            'products' => $products
        ]);
    }


}