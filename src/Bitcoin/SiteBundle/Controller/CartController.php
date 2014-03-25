<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Bitcoin\SiteBundle\Controller\FrontController;

/**
 * Description of CartController
 *
 * @author nitin
 */
class CartController extends FrontController {
    
    /**
     * Handle Add to cart Ajax Request
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @return \Symfony\Component\HttpFoundation\JsonResponse
     */
    public function addtoCartAction(Request $request) {
        $result = array('status' => false);
        if ($request->getMethod() == 'POST') {
            //Get Post Data
            $productId = $request->request->get('productId', 0);
            $quantity = $request->request->get('qty', 0);
            
            //Get cart from session
            $cart = $this->session->get('cart', array());
            
            //Update Cart
            $cart[$productId] = $quantity;
            $this->session->set('cart', $cart);
            
            $result['status'] = true;
        }
        return new JsonResponse(json_encode($result));
    }
    
    
    public function getCartAction()
    {
        
    }
}
