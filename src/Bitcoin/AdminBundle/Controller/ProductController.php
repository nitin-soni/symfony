<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Bitcoin\AdminBundle\Entity\Product;
use Bitcoin\AdminBundle\Form\ProductType;
use Bitcoin\AdminBundle\Controller\AdminController;

/**
 * Product controller.
 *
 */
class ProductController extends AdminController {

    /**
     * Lists all Product entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BitcoinAdminBundle:Product')->findAll();

        return $this->render('BitcoinAdminBundle:Product:index.html.twig', array(
                'entities' => $entities,
        ));
    }

    /**
     * Creates a new Product entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new Product();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity->setModifiedDate();
            $entity->setCreatedDate();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product'));
        }

        return $this->render('BitcoinAdminBundle:Product:new.html.twig', array(
                'entity' => $entity,
                'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(Product $entity) {
        $entity->setFeatured(false);
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Save'));

        return $form;
    }

    /**
     * Displays a form to create a new Product entity.
     *
     */
    public function newAction() {
        $entity = new Product();
        $form = $this->createCreateForm($entity);
        return $this->render('BitcoinAdminBundle:Product:new.html.twig', array(
            'entity' => $entity,
            'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a Product entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BitcoinAdminBundle:Product:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing Product entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createEditForm($entity);

        return $this->render('BitcoinAdminBundle:Product:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a Product entity.
     *
     * @param Product $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(Product $entity) {
        $form = $this->createForm(new ProductType(), $entity, array(
            'action' => $this->generateUrl('product_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing Product entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('product_edit', array('id' => $id)));
        }

        return $this->render('BitcoinAdminBundle:Product:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a Product entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BitcoinAdminBundle:Product')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find Product entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('product'));
    }

    /**
     * Creates a form to delete a Product entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('product_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Json data
     */
    public function getProductAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository('BitcoinAdminBundle:Product');

        //Prepare Data List
        $per_page = $request->get("perPage", 10);
        $current_page = $request->get("currentPage", 1);
        $sort = $request->get("sort", array(array("productTitle", "asc")));
        $filter = $request->get("filter", array("productTitle" => ""));
        $data = array(
            'currentPage' => 1,
            'perPage' => $per_page,
            'sort' => $sort,
            'filter' => $filter,
            'currentPage' => $current_page,
            'data' => array(),
            'posted' => ''
        );
        $data['data'] = $repository->getAllProduct($filter, $sort); //, $current_page, $per_page);
        $data['totalRows'] = $repository->totalCount();

        //echo '<pre>'; print_r($data); die;
        //Send Output
        return new JsonResponse($data);
    }

    /**
     * Lists all ProductCategory entities.
     *
     */
    public function listAction() {
        return $this->render('BitcoinAdminBundle:Product:list.html.twig');
    }

}
