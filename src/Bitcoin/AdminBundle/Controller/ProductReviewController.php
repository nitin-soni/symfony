<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

use Bitcoin\AdminBundle\Entity\ProductReview;
use Bitcoin\AdminBundle\Form\ProductReviewType;
use Bitcoin\AdminBundle\Controller\AdminController;
/**
 * ProductReview controller.
 *
 */
class ProductReviewController extends AdminController
{

    /**
     * Lists all ProductReview entities.
     *
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();

        $entities = $em->getRepository('BitcoinAdminBundle:ProductReview')->findAll();

        return $this->render('BitcoinAdminBundle:ProductReview:index.html.twig', array(
            'entities' => $entities,
        ));
    }
    /**
     * Creates a new ProductReview entity.
     *
     */
    public function createAction(Request $request)
    {
        $entity = new ProductReview();
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();

            return $this->redirect($this->generateUrl('product-review_show', array('id' => $entity->getId())));
        }

        return $this->render('BitcoinAdminBundle:ProductReview:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
    * Creates a form to create a ProductReview entity.
    *
    * @param ProductReview $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createCreateForm(ProductReview $entity)
    {
        $form = $this->createForm(new ProductReviewType(), $entity, array(
            'action' => $this->generateUrl('product-review_create'),
            'method' => 'POST',
        ));

        $form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProductReview entity.
     *
     */
    public function newAction()
    {
        $entity = new ProductReview();
        $form   = $this->createCreateForm($entity);

        return $this->render('BitcoinAdminBundle:ProductReview:new.html.twig', array(
            'entity' => $entity,
            'form'   => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductReview entity.
     *
     */
    public function showAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductReview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductReview entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BitcoinAdminBundle:ProductReview:show.html.twig', array(
            'entity'      => $entity,
            'delete_form' => $deleteForm->createView(),        ));
    }

    /**
     * Displays a form to edit an existing ProductReview entity.
     *
     */
    public function editAction($id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductReview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductReview entity.');
        }

        $editForm = $this->createEditForm($entity);
        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BitcoinAdminBundle:ProductReview:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
    * Creates a form to edit a ProductReview entity.
    *
    * @param ProductReview $entity The entity
    *
    * @return \Symfony\Component\Form\Form The form
    */
    private function createEditForm(ProductReview $entity)
    {
        $form = $this->createForm(new ProductReviewType(), $entity, array(
            'action' => $this->generateUrl('product-review_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }
    /**
     * Edits an existing ProductReview entity.
     *
     */
    public function updateAction(Request $request, $id)
    {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductReview')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductReview entity.');
        }

        $deleteForm = $this->createDeleteForm($id);
        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $em->flush();

            return $this->redirect($this->generateUrl('product-review_edit', array('id' => $id)));
        }

        return $this->render('BitcoinAdminBundle:ProductReview:edit.html.twig', array(
            'entity'      => $entity,
            'edit_form'   => $editForm->createView(),
            'delete_form' => $deleteForm->createView(),
        ));
    }
    /**
     * Deletes a ProductReview entity.
     *
     */
    public function deleteAction(Request $request, $id)
    {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $em = $this->getDoctrine()->getManager();
            $entity = $em->getRepository('BitcoinAdminBundle:ProductReview')->find($id);

            if (!$entity) {
                throw $this->createNotFoundException('Unable to find ProductReview entity.');
            }

            $em->remove($entity);
            $em->flush();
        }

        return $this->redirect($this->generateUrl('product-review'));
    }

    /**
     * Creates a form to delete a ProductReview entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id)
    {
        return $this->createFormBuilder()
            ->setAction($this->generateUrl('product-review_delete', array('id' => $id)))
            ->setMethod('DELETE')
            ->add('submit', 'submit', array('label' => 'Delete'))
            ->getForm()
        ;
    }
    
    /**
     * Json data
     */
    public function getReviewAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository('BitcoinAdminBundle:ProductReview');

        //Prepare Data List
        $per_page = $request->get("perPage", 10);
        $current_page = $request->get("currentPage", 1);
        $sort = $request->get("sort", array(array("createdDate", "asc")));
        $filter = $request->get("filter", array("title" => ""));
        $data = array(
            'currentPage' => 1,
            'perPage' => $per_page,
            'sort' => $sort,
            'filter' => $filter,
            'currentPage' => $current_page,
            'data' => array(),
            'posted' => ''
        );
        $data['data'] = $repository->getAll($filter, $sort, $current_page, $per_page); //, $current_page, $per_page);
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
        return $this->render('BitcoinAdminBundle:ProductReview:list.html.twig');
    }
}
