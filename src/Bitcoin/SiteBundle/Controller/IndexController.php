<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

class IndexController extends Controller
{
    public function indexAction()
    {
        return $this->render('BitcoinSiteBundle:Default:index.html.twig');
    }
}
