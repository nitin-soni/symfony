<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;

use Bitcoin\AdminBundle\Entity\ProductReview;
use Bitcoin\SiteBundle\Form\ReviewType;
use Bitcoin\SiteBundle\FormFilter\ReviewFilter;
use Bitcoin\SiteBundle\Controller\FrontController;

class IndexController extends FrontController {

    //private $data = array();

    public function indexAction() {
        $em = $this->getDoctrine()->getEntityManager();
        $this->data['latestProduct'] = $em->getRepository('BitcoinAdminBundle:Product')->getAllProduct(array(), array(array('id', 'desc')), 0, 8, false);
        //print_r(count($this->data['latestProduct'])); die;
        $this->data['feauturedProduct'] = $em->getRepository('BitcoinAdminBundle:Product')->getAllProduct(array('featured' => TRUE), array(array('id', 'desc')), 0, 9, false);
        $this->data['categories'] = $em->getRepository('BitcoinAdminBundle:ProductCategory')->findBy(array('fkParent' => NULL));
        return $this->render('BitcoinSiteBundle:Default:index.html.twig', $this->data);
    }

    public function productDetailAction($id, $prdoductTitle) {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('BitcoinAdminBundle:Product')->find($id);
        
        //Create form
        $entity = new ProductReview();
        $form = $this->createReviewForm($id);
        $this->data['form'] = $form->createView();
                
        $this->data['categories'] = $em->getRepository('BitcoinAdminBundle:ProductCategory')->findBy(array('fkParent' => NULL));
        $this->data['product'] = $em->getRepository('BitcoinAdminBundle:Product')->find($id);
        $this->data['latestProduct'] = $em->getRepository('BitcoinAdminBundle:Product')->getAllProduct(array(), array(array('id', 'desc')), 0, 3, false);
        return $this->render('BitcoinSiteBundle:Default:productDetail.html.twig', $this->data);
    }

    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createReviewForm($id) {
        $form = $this->createForm(new ReviewType(), new ReviewFilter(), array(
            'action' => $this->generateUrl('bitcoin_product_review', array('id'=>$id)),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => '<span><span>Submit Review</span></span>'));

        return $form;
    }

}
