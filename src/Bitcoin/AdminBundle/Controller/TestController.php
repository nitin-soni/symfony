<?php

namespace Bitcoin\AdminBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use APY\DataGridBundle\Grid\Source\Entity;
use APY\DataGridBundle\Grid\Column\TextColumn;
use APY\DataGridBundle\Grid\Column\ActionsColumn;
use APY\DataGridBundle\Grid\Action\MassAction;
use APY\DataGridBundle\Grid\Action\DeleteMassAction;
use APY\DataGridBundle\Grid\Action\RowAction;
use APY\DataGridBundle\Grid\Column\BlankColumn;
use APY\DataGridBundle\Grid\Column\DateColumn;

class TestController extends Controller {

    /**
     * Lists all ProductCategory entities.
     *
     */
    public function indexAction() {
        $em = $this->getDoctrine()->getManager();
        $entities = $em->getRepository('BitcoinAdminBundle:ProductCategory')->findAll();

        return $this->render('BitcoinAdminBundle:Test:index.html.twig', array(
                    'entities' => $entities,
        ));
    }

    public static function myStaticMethod(array $ids)
    {
        // Do whatever you want with these ids
    }

    public function myMethod(array $ids)
    {
        // Do whatever you want with these ids
    }
    
    
    public function testAction() {
        $source = new Entity('BitcoinAdminBundle:ProductCategory');
        
        /* @var $grid APY\DataGridBundle\Grid\Grid */

        // Get a grid instance
        $grid = $this->get('grid');

        // Set the source
        $grid->setSource($source);

        // Set the selector of the number of items per page
        $grid->setLimits(array(5, 10, 15));

        // Set the default page
        $grid->setPage(1);

        // Add a delete mass action
        //$grid->addMassAction(new DeleteMassAction());

        // Add row actions in the default row actions column
        $myRowAction = new RowAction('Edit', 'productcategory_edit');
        $grid->addRowAction($myRowAction);

        $myRowAction = new RowAction('Delete', 'productcategory_delete', true, '_self');
        $grid->addRowAction($myRowAction);

        $myRowAction = new RowAction('Show', 'productcategory_show');
        $grid->addRowAction($myRowAction);
        
        //Set Fields
        $grid->getColumn('id')->setFilterable(false);
        $grid->getColumn('categoryName')->setFilterable(true);
        $grid->getColumn('description')->setFilterable(FALSE);
        $grid->getColumn('createdDate')->setVisible(FALSE);
        $grid->getColumn('modifiedDate')->setVisible(FALSE);
        
        return $grid->getGridResponse('BitcoinAdminBundle:Test:test2.html.twig');
    }

    public function test1Action() {
        /** @var $grid \APY\DataGridBundle\Grid\Grid */
        $grid = $this->get('grid');
        //echo '<pre>';        print_r(get_class_methods(get_class($grid)));die;
        $source = new \APY\DataGridBundle\Grid\Source\Entity('BitcoinAdminBundle:ProductCategory');
        $grid->setSource($source);

        //Set limit option
        $grid->setLimits(array(5, 10, 15));

        $filters = array(
                //'categoryName' => '', // Use the default operator of the column
                //'categoryName' => array('like' => 'your_init_value1'), // Use the default operator of the column
        );
        $grid->setPermanentFilters($filters);
        /* @var $nameColumn \APY\DataGridBundle\Grid\Column\Column */
        $grid->getColumn('id')->setFilterable(false);
        $grid->getColumn('categoryName')->setFilterable(true);
        $grid->getColumn('description')->setFilterable(FALSE);
        $grid->getColumn('createdDate')->setVisible(FALSE);
        $grid->getColumn('modifiedDate')->setVisible(FALSE);

        $grid->setDefaultFilters(array(
            'categoryName' => array('operator' => 'like', 'from' => ''), // Define an operator
        ));

        $rowAction = new RowAction('Delete', 'productcategory_delete', true, '_self', array('class' => 'grid_delete_action'));
        $grid->addRowAction($rowAction);

        // Specify route parameters for the edit action
        $rowAction2 = new RowAction('Edit', 'productcategory_edit');
        $rowAction2->setRouteParameters(array('id'));
        $grid->addRowAction($rowAction2);
//        echo '<pre>';
//        $nameColumn = $grid->getColumn('description')->setFilterable(FALSE);
//        print_r(get_class_methods(get_class($nameColumn))); 
        //die;
        //$nameColumn->setFilterType('text')->setSelectFrom('query');
        //return $grid->getGridResponse();  
        return $grid->getGridResponse('BitcoinAdminBundle:Test:grid.html.twig');
    }
    
    
}
