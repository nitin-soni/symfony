<?php

namespace Bitcoin\SiteBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use Bitcoin\AdminBundle\Entity\ProductReview;
use Bitcoin\SiteBundle\Form\ReviewType;
use Bitcoin\SiteBundle\FormFilter\ReviewFilter;

/**
 * Description of SecureController
 *
 * @author nitin
 */
class SecureController extends Controller {

    public function submitReviewAction(Request $request, $id) {
        $em = $this->getDoctrine()->getEntityManager();
        $product = $em->getRepository('BitcoinAdminBundle:Product')->find($id);

        //Create form
        $entity = new ProductReview();
        $form = $this->createReviewForm($id);
        $this->data['form'] = $form->createView();
        $form->handleRequest($request);
        if ($request->getMethod() == "POST") {
            $formData = $form->getData();
            //Validate form
            if ($form->isValid()) {
                //Prepare Review
                $review = new ProductReview();
                $review->setFkProduct($product);
                $review->setCreatedDate();
                $review->setModifiedDate();
                $review->setPublished(false);
                $review->setRating($formData->rating);
                $review->setFullname($formData->fullname);
                $review->setReview($formData->review);
                $review->setTitle($formData->title);
                
                //Persist Data
                $em->persist($review);
                $em->flush();
                //$this->session->getFlashBag()->add('notice', 'Product review added Successfully. ');
                return $this->redirect($this->generateUrl('bitcoin_product',  array(
                    'id'=>$product->getId(),
                    'prdoductTitle' => urlencode($product->getProductTitle()),
                    )));
            } 
        }
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
            'action' => $this->generateUrl('bitcoin_product_review', array('id' => $id)),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => '<span><span>Submit Review</span></span>'));

        return $form;
    }

}
