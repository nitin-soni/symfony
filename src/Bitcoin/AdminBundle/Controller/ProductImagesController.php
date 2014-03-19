<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Bitcoin\AdminBundle\Entity\ProductImages;

use Bitcoin\AdminBundle\Controller\AdminController;

class ProductImagesController extends AdminController {
    
    public function listAction (Request $request, $productId) {
        $em = $this->getDoctrine()->getEntityManager();
        
        $product = $em->getRepository('BitcoinAdminBundle:Product')->find($productId);
        $criteria = array(
            'fkProduct' => $productId
        );
        $entites = $em->getRepository('BitcoinAdminBundle:ProductImages')->findBy($criteria);
        return $this->render('BitcoinAdminBundle:ProductImages:list.html.twig', array(
                'images' => $entites,
                'product' => $product,
        ));
    }


    /**
     * 
     * @param \Symfony\Component\HttpFoundation\Request $request
     * @param type $id
     * @return type
     * @throws \Exception
     */
    public function addAction(Request $request, $productId) {
        $entity = new ProductImages();
        
        //Get entity Manager
        $em = $this->getDoctrine()->getEntityManager();
        
        //Get Product
        $product = $em->getRepository('BitcoinAdminBundle:Product')->find($productId);
                
        //Get form
        $form = $this->buildUploadForm($entity);
        $form->bind($request);
        if ($request->getMethod() == "POST") {
            if ($form->isValid()) {
                //$entity->upload();
                $entity->setFkProduct($product);
                $entity->setCreatedDate();
                $entity->setModifiedDate();
                $em->persist($entity);
                $em->flush();
                return $this->redirect($this->generateUrl('product_image_list', array('productId'=>$productId)));
            } else {
                //  throw new \Exception("Error Occured try again");
            }
        }
        return $this->render('BitcoinAdminBundle:ProductImages:addimage.html.twig', array(
                'form' => $form->createView(),
                'product' => $product,
        ));
    }
    
    /**
     * 
     * @param type $entity
     * @return type
     */
    private function buildUploadForm(ProductImages $entity) {
        $form = $this->createFormBuilder($entity)
                ->add('title','text', array('required'=>'false'))
                ->add('file')
                ->add('submit', 'submit', array('label' => 'Upload'))
                ->getForm();
        return $form;
    }

    public function deleteAction(Request $request, $id) {
        
        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BitcoinAdminBundle:ProductImages')->find($id);
        
        //Get Product
        $product = $entity->getFkProduct();
        
        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $em->remove($entity);
        $em->flush();
        
        return $this->redirect($this->generateUrl('product_image_list', array('productId'=>$product->getId())));
    }
}
