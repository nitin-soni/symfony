<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Bitcoin\SiteBundle\BitcoinSiteBundle;

/**
 * Description of FrontController
 *
 * @author nitin
 */
class FrontController extends Controller {

    private $data;
    public $session;
    public $container;

    public function __construct() {
        $this->data = array();
        $this->container = BitcoinSiteBundle::getContainer();
        $this->session = $this->container->get('session');
    }

}
