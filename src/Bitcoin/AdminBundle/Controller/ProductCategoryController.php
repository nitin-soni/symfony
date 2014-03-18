<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Bitcoin\AdminBundle\Controller\AdminController;
use Bitcoin\AdminBundle\Entity\ProductCategory;
use Bitcoin\AdminBundle\Form\ProductCategoryType;

/**
 * ProductCategory controller.
 *
 */
class ProductCategoryController extends AdminController {

    public function __construct() {
        parent::__construct();
    }

    /**
     * Lists all ProductCategory entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BitcoinAdminBundle:ProductCategory')->findAll();

        return $this->render('BitcoinAdminBundle:ProductCategory:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    /**
     * Creates a new ProductCategory entity.
     *
     */
    public function createAction(Request $request) {
        $entity = new ProductCategory();

        //Create Form
        $form = $this->createCreateForm($entity);
        $form->handleRequest($request);

        if ($form->isValid()) {
            $formData = $form->getData();
            $entity->setModifiedDate();
            $entity->setCreatedDate();
            //Save Data
            $em = $this->getDoctrine()->getManager();
            $em->persist($entity);
            $em->flush();
            $this->session->getFlashBag()->add('notice', 'Category added Successfully.');
            return $this->redirect($this->generateUrl('productcategory_list'));//, array('id' => $entity->getId())));
        }

        return $this->render('BitcoinAdminBundle:ProductCategory:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Creates a form to create a ProductCategory entity.
     *
     * @param ProductCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createCreateForm(ProductCategory $entity) {
        $form = $this->createForm(new ProductCategoryType(), $entity, array(
            'action' => $this->generateUrl('productcategory_create'),
            'method' => 'POST',
        ));

        //$form->add('submit', 'submit', array('label' => 'Create'));

        return $form;
    }

    /**
     * Displays a form to create a new ProductCategory entity.
     *
     */
    public function newAction() {
        $entity = new ProductCategory();
        $form = $this->createCreateForm($entity);

        return $this->render('BitcoinAdminBundle:ProductCategory:new.html.twig', array(
                    'entity' => $entity,
                    'form' => $form->createView(),
        ));
    }

    /**
     * Finds and displays a ProductCategory entity.
     *
     */
    public function showAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $deleteForm = $this->createDeleteForm($id);

        return $this->render('BitcoinAdminBundle:ProductCategory:show.html.twig', array(
                    'entity' => $entity,
                    'delete_form' => $deleteForm->createView(),));
    }

    /**
     * Displays a form to edit an existing ProductCategory entity.
     *
     */
    public function editAction($id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->get('fkParent');
        //echo '<pre>';print_r(get_class_methods(get_class($editForm->get('fkParent'))));die;
        //$deleteForm = $this->createDeleteForm($id);
        
        return $this->render('BitcoinAdminBundle:ProductCategory:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
                        //'delete_form' => $deleteForm->createView(),
        ));
    }

    /**
     * Creates a form to edit a ProductCategory entity.
     *
     * @param ProductCategory $entity The entity
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createEditForm(ProductCategory $entity) {
        $form = $this->createForm(new ProductCategoryType(), $entity, array(
            'action' => $this->generateUrl('productcategory_update', array('id' => $entity->getId())),
            'method' => 'PUT',
        ));

        $form->add('submit', 'submit', array('label' => 'Update'));

        return $form;
    }

    /**
     * Edits an existing ProductCategory entity.
     *
     */
    public function updateAction(Request $request, $id) {
        $em = $this->getDoctrine()->getManager();

        $entity = $em->getRepository('BitcoinAdminBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $editForm = $this->createEditForm($entity);
        $editForm->handleRequest($request);

        if ($editForm->isValid()) {
            $entity->setModifiedDate();
            $em->flush();
            $this->session->getFlashBag()->add('notice', 'Category Updated Successfully.');
            //return $this->redirect($this->generateUrl('productcategory_edit', array('id' => $id)));
            return $this->redirect($this->generateUrl('productcategory_list'));//, array('id' => $entity->getId())));
        }

        return $this->render('BitcoinAdminBundle:ProductCategory:edit.html.twig', array(
                    'entity' => $entity,
                    'form' => $editForm->createView(),
        ));
    }

    /**
     * Deletes a ProductCategory entity.
     *
     */
    public function deleteAction(Request $request, $id) {
        $form = $this->createDeleteForm($id);
        $form->handleRequest($request);


        $em = $this->getDoctrine()->getManager();
        $entity = $em->getRepository('BitcoinAdminBundle:ProductCategory')->find($id);

        if (!$entity) {
            throw $this->createNotFoundException('Unable to find ProductCategory entity.');
        }

        $em->remove($entity);
        $em->flush();

        return $this->redirect($this->generateUrl('productcategory'));
    }

    /**
     * Creates a form to delete a ProductCategory entity by id.
     *
     * @param mixed $id The entity id
     *
     * @return \Symfony\Component\Form\Form The form
     */
    private function createDeleteForm($id) {
        return $this->createFormBuilder()
                        ->setAction($this->generateUrl('productcategory_delete', array('id' => $id)))
                        ->setMethod('DELETE')
                        ->add('submit', 'submit', array('label' => 'Delete'))
                        ->getForm()
        ;
    }

    /**
     * Json data
     */
    public function getProductCategoryAction(Request $request) {
        $repository = $this->getDoctrine()->getRepository('BitcoinAdminBundle:ProductCategory');

        //Prepare Data List
        $per_page = $request->get("perPage", 10);
        $current_page = $request->get("currentPage", 1);
        //$sort = $request->get("sort", array(array("categoryName", "asc")));
        $sort = $request->get("sort", array(array("id", "asc")));
        $filter = $request->get("filter", array("categoryName" => NULL));
        $data = array(
            'currentPage' => 1,
            'perPage' => $per_page,
            'sort' => $sort,
            'filter' => $filter,
            'currentPage' => $current_page,
            'data' => array(),
            'posted' => ''
        );
        //$filter['fkParent'] = 0;
        $data['data'] = $repository->getAllCategories($filter, $sort, $current_page, $per_page); //, $current_page, $per_page);
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
        return $this->render('BitcoinAdminBundle:ProductCategory:list.html.twig');
    }

}
