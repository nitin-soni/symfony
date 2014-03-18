<?php

namespace Bitcoin\SiteBundle\Controller;

use Doctrine\ORM\EntityManager;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends Controller
{
    private $data = array();
    
    public function indexAction()
    {
        $em = $this->getDoctrine()->getEntityManager();
        $this->data['latestProduct'] = $em->getRepository('BitcoinAdminBundle:Product')->getAllProduct(array(), array(array('id', 'desc')), 0, 8, false);
        $this->data['feauturedProduct'] = $em->getRepository('BitcoinAdminBundle:Product')->getAllProduct(array('featured'=>TRUE), array(array('id', 'desc')), 0, 9, false);
        $this->data['categories'] = $em->getRepository('BitcoinAdminBundle:ProductCategory')->findBy(array('fkParent'=>NULL));
        return $this->render('BitcoinSiteBundle:Default:index.html.twig', $this->data);
    }
    
    public function productDetailAction($id, $prdoductTitle)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $this->data['product'] = $em->getRepository('BitcoinAdminBundle:Product')->find($id);
        return $this->render('BitcoinSiteBundle:Default:productDetail.html.twig', $this->data);
    }
    
}
