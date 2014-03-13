<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bitcoin\AdminBundle\BitcoinAdminBundle;

class AdminController extends Controller {

    public $session;
    public $container;
    public $pageData;
    
    public function __construct() {
        $this->container = BitcoinAdminBundle::getContainer();
        $this->session = $this->container->get('session');
        $this->isLoggedIn();
    }

    public function indexAction() { //die(''.__LINE__);
        return $this->render('BitcoinAdminBundle:Default:index.html.twig');
    }

    public function isLoggedIn() {
        $isLoggedin = $this->session->get('loggedIn', FALSE);
        
        if (FALSE === $isLoggedin) {
            header('Location: ' . $this->generateUrl('bitcoin_admin_login'));
            exit;
        }
        return false;
    }
    
    public function logoutAction() {
        $this->session->invalidate();
        return $this->redirect($this->generateUrl('bitcoin_admin_login'));
    }
}
