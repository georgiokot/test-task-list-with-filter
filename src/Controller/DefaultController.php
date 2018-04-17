<?php

namespace App\Controller;

use App\Entity\Orders;
use App\Form\FilterOrderType;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\ParamConverter;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Flex\Response;

class DefaultController extends Controller
{
    /**
     * @Route(
     *     path="/",
     *     name="default",
     *     defaults={"_format"="html"}
     * )
     */
    public function index(Request  $request, $_format)
    {
        $query = $this->getDoctrine()->getRepository('App:Orders')->getQuery();
        $form = $this->createForm('App\Form\FilterOrderType', null, array());

        $paginator  = $this->get('knp_paginator');
        $pagination = $paginator->paginate(
            $query, /* query NOT result */
            $request->query->getInt('page', 1)/*page number*/,
            2/*limit per page*/
        );

        if($request->headers->get('Content-Type') === 'application/json'){
            return $this->json(array(
                'result' => $this->renderView('order/orders.html.twig', array('pagination' => $pagination ))
            ));
        }

        return $this->render('order/index.html.twig', array(
            'pagination' => $pagination,
            'form' => $form->createView()
        ));
    }

    /**
     * @Route("/filter", name="filter")
     */
    public function filter(Request $request)
    {
        $form = $this->createForm('App\Form\FilterOrderType', null, array());

        $form->handleRequest($request);
        if($form->isValid()){

            $orderRepository = $this->getDoctrine()->getRepository('App:Orders');
            $data  = $form->getData();
            $paginator  = $this->get('knp_paginator');

            $pagination = $paginator->paginate(
                $orderRepository->getOrderByFilter($data), /* query NOT result */
                $request->query->getInt('page', 1)/*page number*/,
                2/*limit per page*/,
                array('distinct' => false)
            );

           return $this->json(array(
               'result' => $this->renderView('order/orders.html.twig', array('pagination' => $pagination ))
           ));
       }

       return $this->json($form->isValid());
    }


    /**
     * @Route(name="popup_ordres", path="/popup/{id}", methods={"GET"})
     * @ParamConverter(name="order", class="App\Entity\Orders")
     */
    public function getPopupOrders(Orders $order){
        return $this->json(array('modal' => $this->renderView('order/popupOrders.html.twig', array('orderItem' => $order->getOrdersItem()))));
    }
}
